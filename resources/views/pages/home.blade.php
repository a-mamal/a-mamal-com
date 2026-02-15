<x-site-layout 
    :title="'Home | Mamalikidou Anastasia'"
    :header="view('partials.page-header', [
        'title' => 'Home',
        'subtitle' => 'Welcome to my website!'
        ])"
>
    @include('partials.home.hero')
    @include('partials.home.projects')
</x-site-layout>
