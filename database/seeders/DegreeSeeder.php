<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Degree;
use App\Models\Profile;
use App\Models\Organization;
use Illuminate\Support\Facades\File;

class DegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch all profiles and organizations
        $profiles = Profile::all();
        $organizations = Organization::all();

        if ($profiles->isEmpty() || $organizations->isEmpty()) {
            $this->command->info('No profiles or organizations found. Seed them first!');
            return;
        }

        // Cache models for fast lookup by name (avoids repeated DB queries)
        $profileMap = $profiles->keyBy('display_name');
        $organizationMap = $organizations->keyBy('name');

        // Determine JSON path based on environment (Production uses gitignored JSON)
        $jsonPath = app()->environment('production')
            ? database_path('seeders/production/data/degrees.json')
            : database_path('seeders/data/degrees.json');

        // Seed from JSON if file exists
        if (File::exists($jsonPath)) {

            $degrees = json_decode(File::get($jsonPath), true);

            if (!is_array($degrees)) {
                $this->command->error("Invalid JSON format in $jsonPath");
            } else {
                foreach ($degrees as $data) {

                    // Validate required fields
                    if (
                        empty($data['profile']) ||
                        empty($data['organization']) ||
                        empty($data['title']) ||
                        empty($data['level'])
                    ) {
                        $this->command->warn("Skipping degree: missing required fields.");
                        continue;
                    }

                    // Find related models using cached maps
                    $profile = $profileMap[$data['profile']] ?? null;
                    $organization = $organizationMap[$data['organization']] ?? null;

                    if (!$profile) {
                        $this->command->warn("Profile not found: {$data['profile']}");
                        continue;
                    }

                    if (!$organization) {
                        $this->command->warn("Organization not found: {$data['organization']}");
                        continue;
                    }

                    // Update or create degree
                    Degree::updateOrCreate(
                        [
                            'profile_id' => $profile->id,
                            'organization_id' => $organization->id,
                            'title' => $data['title'],
                        ],
                        [
                            'level' => $data['level'],
                            'field' => $data['field'] ?? null,
                            'start_date' => $data['start_date'] ?? null,
                            'end_date' => $data['end_date'] ?? null,
                            'grade' => $data['grade'] ?? null,
                            'image' => $data['image'] ?? null,
                        ]
                    );
                }
            }
        }

        // Additional demo degrees only in local environment
        if (app()->environment('local')) {
            foreach ($profiles as $profile) {
                Degree::factory(3)->create([
                    'profile_id' => $profile->id,
                    'organization_id' => $organizations->random()->id,
                ]);
            }
        }

        $this->command->info('Degrees seeded successfully.');
    }
}
