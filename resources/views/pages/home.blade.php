<x-site-layout 
    :title="'Anastasia Mamalikidou | Full-Stack Web Developer'"
    :description="'Hello! I\'m Anastasia, a full-stack web developer passionate about creating responsive, accessible, and user-focused web applications with Laravel, PHP, JavaScript, and MariaDB.'"
    :headerTitle="'Hello! I\'m Anastasia'"
    :subtitle="'Full-stack web developer passionate about creating responsive, accessible, and user-focused web applications with Laravel, PHP, JavaScript, and MariaDB.'"
    
>
    <section class="home-intro">
        <p>
            From personal projects to experiments, I enjoy exploring new technologies, solving problems, and turning ideas into practical applications.
            Take a look around and discover what I have been building.
        </p>
        <a  href="{{ route('projects') }}" 
            class="button-fire">View My Projects →</a>
    </section>
    @include('partials.home.projects')
</x-site-layout>
