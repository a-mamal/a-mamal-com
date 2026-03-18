@if($degrees->isNotEmpty())
    <section id="education" class="about-section">
        <h3>Education</h3>

        @foreach($degrees as $degree)
            <article class="card education-card">
                {{-- Degree title and optional field --}}
                <h4 class="card-title">
                    {{ $degree->title }}
                    @if($degree->field)
                        - {{ $degree->field }}
                    @endif
                </h4>

                {{-- Organization --}}
                <p class="card-meta">
                    @if($degree->organization->website)
                        <a href="{{ $degree->organization->website }}" target="_blank" rel="noopener noreferrer">
                            {{ $degree->organization->name ?? 'Unknown organization' }}
                        </a>
                    @else
                        {{ $degree->organization->name ?? 'Unknown organization' }}
                    @endif
                </p>

                <p class="card-text">
                    {{-- Formatted start and end dates --}}
                    {{ $degree->formatted_start }} - {{ $degree->formatted_end }}
                </p>

                {{-- Optional grade --}}
                @if($degree->grade)
                    <p class="card-text">
                        Grade: {{ $degree->grade }}
                    </p>
                @endif
                
            </article>
        @endforeach

    </section>
@endif