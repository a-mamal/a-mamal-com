<section id="languages" class="about-section">
    <h3>Languages</h3>
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