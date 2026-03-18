<x-site-layout 
    :title="'About | Mamalikidou Anastasia'"
    :description="'Learn more about Anastasia Mamalikidou, a passionate full-stack web developer building responsive, accessible websites and applications.'"
    :headerTitle="'About me'"
    :subtitle="'A brief overview of my experience, education, skills, etc.'"
    >
    <section id="about-me" class="about-wrapper">
        @include('partials.about.bio')
        @include('partials.about.education')
        @include('partials.about.experience')
        @include('partials.about.certifications')
        @include('partials.about.sp-languages')
    </section>

    <section id="about-site" class="about-wrapper">
        <h2>About the Site</h2>
        {{-- Subsections will go here later --}}
    </section>
</x-site-layout>