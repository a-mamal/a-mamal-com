<section id="languages" class="about-section">
    <h2>Languages</h2>
    <ul>
        @forelse($languages as $language)
            <li>
                {{ $language->name }} - {{ $language->proficiency }}
            </li>
        @empty
            <li>No languages listed.</li>
        @endforelse
    </ul>
</section>