<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;   
use App\Models\Profile; 

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $profile = Profile::first();
        if (!$profile) {
            $profile = Profile::create([
                'user_id' => 1, // Make sure a user with ID 1 exists, or adjust accordingly
                'display_name' => 'Default Profile',
                'bio' => 'Automatically generated profile for seeding projects.',
            ]);
        }

        $slug = Str::slug('Online Advertisement Service for Used Smartphones');

        DB::table('projects')->updateOrInsert(
            ['slug' => $slug ],
            [
                'slug' => $slug ,
                'profile_id' => $profile->id,
                'title' => 'Online Advertisement Service for Used Smartphones',
                'type' => 'Thesis Project',
                'description' => 'Full-stack marketplace web application for listing and managing used smartphones, developed as a thesis project.',
                'highlights' => json_encode([
                    "Developed with PHP, MariaDB, HTML5, CSS, and JavaScript.",
                    "User authentication, email verification, and post management with images and metadata.",
                    "Category filtering, sorting, and relational data linking posts to categories, brands, phones, and users.",
                    "Ensured accessibility, responsive design, and security best practices including HTTPS, CSRF protection, input sanitisation, and CAPTCHA.",
                    "Clean, reusable backend code with full documentation on GitHub."
                ]),
                'project_url' => null,
                'github_url' => 'https://github.com/a-mamal/thesis-ad-service',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        
        );

        $slug = Str::slug('Personal Portfolio Website');

        DB::table('projects')->updateOrInsert(
            ['slug' => $slug],
            [
                'slug' => $slug,
                'profile_id' => $profile->id,
                'title' => 'Personal Portfolio Website',
                'type' => 'Self-Initiated Project',
                'description' => 'A clean, responsive personal portfolio website built with HTML, CSS, and JavaScript, serving as the foundation for the current Laravel personal website.',
                'highlights' => json_encode([
                    "Developed a clean, responsive portfolio using HTML5, CSS, and JavaScript with a sidebar layout.",
                    "Built dedicated sections for education, certifications, and projects.",
                    "Focused on semantic HTML, accessibility, and maintainability.",
                    "Implemented a mobile-friendly hamburger menu.",
                    "Served as a foundation for the development of the current Laravel personal website."
                ]),
                'project_url' => 'https://a-mamal.github.io/portfolio/',
                'github_url' => 'https://github.com/a-mamal/portfolio',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        $slug = Str::slug('Creative Experiments');

        DB::table('projects')->updateOrInsert(
            ['slug' => $slug],
            [
                'slug' => $slug,
                'profile_id' => $profile->id,
                'title' => 'Creative Experiments (Coming Soon)',
                'type' => 'Self-Initiated Project',
                'description' => 'A showcase of SVGs, pixel art, and other creative experiments. Interactive demos coming soon!',
                'highlights' => json_encode([
                    "Exploring creative coding and interactive web experiments.",
                    "Includes SVGs, pixel art, and other visual projects.",
                    "Designed as a sandbox for experimentation and learning.",
                    "Content and demos will be added over time."
                ]),
                'project_url' => null,
                'github_url' => null,
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );


        $slug = Str::slug('Car Service Website');

        DB::table('projects')->updateOrInsert(
            ['slug' => $slug],
            [
                'slug' => $slug,
                'profile_id' => $profile->id,
                'title' => 'Car Service Website (In Progress)',
                'type' => 'Independent Project',
                'description' => 'A fully responsive static website for a local car-service business, presenting services, contact information, and business details. Dynamic features may be added in the future.',
                'highlights' => json_encode([
                    "Built a fully responsive static website for a local car-service business.",
                    "Structured with semantic HTML5 and modular CSS for readability, accessibility, and maintainability.",
                    "Designed simple navigation flow optimized for mobile and desktop devices.",
                    "Focused on professional appearance reflecting the business identity.",
                    "Prepared for future dynamic features such as appointment booking."
                ]),
                'project_url' => null,
                'github_url' => null,
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        $slug = Str::slug('Laravel Personal Website');

        DB::table('projects')->updateOrInsert(
            ['slug' => $slug],
            [
                'slug' => $slug,
                'profile_id' => $profile->id,
                'title' => 'Laravel Personal Website (Ongoing)',
                'type' => 'Self-Initiated Project',
                'description' => 'This very website, built with Laravel, serves as my personal website and a platform to continuously explore and grow my skills.',
                'highlights' => json_encode([
                    "Built with Laravel, leveraging MVC architecture and Blade templates.",
                    "Dynamic project listings with responsive and accessible design.",
                    "Continuously adding new functionality and iterating on UI/UX.",
                    "Serves as a live demonstration of my ongoing growth as a web developer.",
                    "Open source, created with consideration for fellow learners."
                ]),
                'project_url' => 'https://a-mamal.dev/',
                'github_url' => 'https://github.com/a-mamal/personal-website',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );    
    }
}
