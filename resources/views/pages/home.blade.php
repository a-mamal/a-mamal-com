<x-site-layout 
    :title="'Anastasia Mamalikidou | Full-Stack Web Developer'"
    :description="'Hello! I\'m Anastasia, a full-stack web developer passionate about creating responsive, accessible, and user-focused web applications with Laravel, PHP, JavaScript, and MariaDB.'"
    :headerTitle="'Hello! I\'m Anastasia'"
    :subtitle="'Full-stack web developer passionate about creating responsive, accessible, and user-focused web applications with Laravel, PHP, JavaScript, and MariaDB.'"
    
>

    @include('partials.home.projects', [
        'projects' => $featuredProjects
    ])
    
</x-site-layout>
