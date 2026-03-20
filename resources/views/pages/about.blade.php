<x-site-layout 
    :title="'About | Mamalikidou Anastasia'"
    :description="'Learn more about Anastasia Mamalikidou and this website: my journey as a developer, my experience, and the purpose of this project.'"
    :headerTitle="'About'"
    :subtitle="'A brief overview of myself, my experience, and this website.'"
    >
    <section id="about-me" class="about-wrapper">
        <h2> About me </h2>
        @include('partials.about.bio')
        @include('partials.about.education')
        @include('partials.about.experience')
        @include('partials.about.certifications')
        @include('partials.about.sp-languages')
    </section>

    <section id="about-site" class="about-wrapper">
        <h2>About the Site</h2>
        @include('partials.about.site-intro')
        @include('partials.about.site-learning')
        @include('partials.about.site-collaboration')
    </section>
</x-site-layout>