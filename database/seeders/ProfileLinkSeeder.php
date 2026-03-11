<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\ProfileLink;

class ProfileLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Path to JSON file containing real profile links
        $jsonFile = base_path('database/seeders/data/profile-links.json');

        // Load links from JSON if file exists
        $links = file_exists($jsonFile)
            ? json_decode(file_get_contents($jsonFile), true) ?? []
            : [];

        // Get existing profiles or create some for local testing        
        $profiles = Profile::all();
        if ($profiles->isEmpty() && app()->environment('local')) {
            $profiles = Profile::factory()->count(5)->create();
        }

        // Seed the first profile with real links from JSON
        $firstProfile = $profiles->first();

        if ($firstProfile) {
            // Seed links from JSON
            foreach ($links as $link) {
                $firstProfile->links()->updateOrCreate(
                    [
                        'profile_id' => $firstProfile->id,
                        'platform'   => $link['platform'],
                    ],
                    [
                        'url' => $link['url'],
                    ]
                );
            }

            // Add extra fake links only in local for testing
            if (app()->environment('local')) {
                ProfileLink::factory()->count(2)->create([
                    'profile_id' => $firstProfile->id,
                ]);
            }
        }

        // Seed remaining profiles with random links (local only)
        if (app()->environment('local')) {
            foreach ($profiles->skip(1) as $profile) {
                $linksCount = rand(1, 3);

                ProfileLink::factory()
                    ->count($linksCount)
                    ->create([
                        'profile_id' => $profile->id,
                    ]);
            }
        }
    }
}
