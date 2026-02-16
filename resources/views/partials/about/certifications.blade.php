<section id="certifications" class="about-section">
    <h2>Certifications</h2>

    @forelse($profile->certificates as $cert)

        <article class="cert-item">
            @if($cert->image)
                <img class="cert-image" 
                    src="{{ asset('images/certificates/' . $cert->image) }}" 
                    alt="{{ $cert->name }} by {{ $cert->organization->name }}">
            @endif

            <h3>{{ $cert->name }}</h3>

            <p class="cert-organization">
                {{ $cert->organization->name }}
            </p>

            @if($cert->spokenLanguage)
                <p>Language: {{ $cert->spokenLanguage->name }}</p>
            @endif

            <p>Awarded: {{ $cert->formatted_date }}</p>

            @if($cert->credential_link)
                <p class="cert-link">
                    <a href="{{ $cert->credential_link }}" 
                        target="_blank"
                        rel="noopener noreferrer">View Certificate</a>
                </p>
            @endif
        </article>
    @empty
        <p>No certifications available yet.</p>
    @endforelse

</section>