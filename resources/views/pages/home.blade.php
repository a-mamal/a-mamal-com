<x-site-layout 
    :title="'Anastasia Mamalikidou | Full-Stack Web Developer'"
    :description="'Hello! I\'m Anastasia, a recent BEng graduate in Computer Science and Engineering. I build responsive, accessible full-stack web applications with a focus on learning and scalability.'"
    :headerTitle="'Hello! I\'m Anastasia'"
    :subtitle="'A recent BEng graduate in Computer Science and Engineering. I enjoy building full-stack web applications with a focus on accessibility, scalability, and learning new technologies along the way.'"
>
    <section class="home-intro">
        <p>Here you'll find some of my projects, experiments, and ongoing explorations in web development. Feel free to take a look around!</p>
        <a  href="{{ route('projects') }}" 
            class="button-fire">See My Projects →</a>
    </section>
    @include('partials.home.projects')
</x-site-layout>
