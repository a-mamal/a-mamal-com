<x-site-layout 
    :title="'About | Mamalikidou Anastasia'"
    :header="view('partials.page-header', ['title' => 'About'])"
>

    @include('partials.about.bio')
    @include('partials.about.links')
    @include('partials.about.education')
    @include('partials.about.experience')
    @include('partials.about.certifications')
    @include('partials.about.sp-languages')
</x-site-layout>