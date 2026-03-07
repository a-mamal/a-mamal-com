<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use \App\Models\Profile;
use App\Models\SpokenLanguage;

class SpokenLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch all profiles that will receive spoken languages
        $profiles = Profile::all();

        // If there are no profiles, stop seeding
        if ($profiles->isEmpty()) {
            $this->command->info('No profiles found. Skipping SpokenLanguage seeding.');
            return;
        }

        // JSON path (same for local and production)
        $jsonPath = database_path('seeders/data/spoken_languages.json');

        // Ensure the JSON file exists
        if (!File::exists($jsonPath)) {
            $this->command->warn("Spoken languages JSON not found: $jsonPath");
            return;
        }

        // Decode JSON into an array of language names
        $languages = json_decode(File::get($jsonPath), true);

        // Validate JSON
        if (!is_array($languages)) {
            $this->command->error("Invalid JSON format in $jsonPath");
            return;
        }

        // Default languages for the first profile
        $defaultLanguages = [
            ['name' => 'English',   'proficiency' => 'C2',      'is_native' => false],
            ['name' => 'Greek',     'proficiency' => 'Native',  'is_native' => true ],
            ['name' => 'Spanish',   'proficiency' => 'Beginner','is_native' => false],
        ];

        foreach ($defaultLanguages as $data) {
            SpokenLanguage::updateOrCreate(
                [
                    'profile_id' => 1,
                    'name' => $data['name'],
                ],
                [
                    'proficiency' => $data['proficiency'],
                    'is_native' => $data['is_native'],
                ]
            );
        }

        // Random/demo languages for other profiles (local only)
        if (app()->environment('local')) {
            foreach ($profiles as $profile) {
                
                // Skip first profile to avoid duplicates
                if ($profile->id === 1) continue;

                // Select random languages from the dataset
                $selectedLanguages = collect($languages)->random(rand(1, 3));
                
                foreach ($selectedLanguages as $language) {
                    // Use factory for random fields, override language + profile
                    SpokenLanguage::factory()->create([
                        'profile_id' => $profile->id,
                        'name' => $language
                    ]);
                }
            }
        }
        $this->command->info('Spoken languages seeded successfully.');
    }
}
