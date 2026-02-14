<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Arr;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        // Get the main user created by UserSeeder
        $user = User::first();

        // Determine the JSON path for the main profile based on environment
        //    - Production uses a separate folder to allow different default profiles (gitignored)
        $jsonPath = app()->environment('production') 
            ? database_path('seeders/production/data/main_profile.json')
            : database_path('seeders/data/main_profile.json');

        // Check if JSON file exists before attempting to read
        if (File::exists($jsonPath)) {
            // decode JSON into array
            $data = json_decode(File::get($jsonPath), true); 

            // Ensure 'display_name' exists, other fields are optional
            if (!empty($data) && isset($data['display_name'])) {
                // only expected fields
                $profileData = Arr::only($data, ['display_name', 'bio', 'image']);

                // Update or create main profile
                Profile::updateOrCreate(
                    ['user_id' => $user->id], 
                    $profileData 
                );
            }
        }

        // Only in local environment, create extra demo profiles
        if (app()->environment('local')) {
            Profile::factory()->count(5)->create();
        }
    }
}
