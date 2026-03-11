@if($profile?->links?->isNotEmpty())
    <section id="profile-links" class="profile-links-section">
        <h2>You can find me here</h2>

        <ul>
            @foreach($profile->links as $link)
                <li>
                    <a  href="{{ $link->url }}" 
                        target="_blank"     
                        rel="noopener noreferrer" 
                        aria-label="{{ $link->platform }} link" 
                        class="profile-link">

                        @switch(strtolower($link->platform))
                            {{-- GitHub --}}
                            @case('github')
                                {{-- plain octocat SVG provided by GitHub --}}
                                <img src="{{ asset('images/svg/GitHub_Invertocat_Black.svg') }}" alt="GitHub logo" width="24" height="24">
                            @break

                            {{-- LinkedIn --}}
                            @case('linkedin')
                                {{-- provided logo --}}
                                <img src="{{ asset('images/png/InBug-Black.png') }}" alt="LinkedIn logo" width="24" height="24">
                            @break

                            @default
                                {{-- from Ikonate --}}
                                <img src="{{ asset('images/svg/link.svg') }}" alt="{{ ucfirst($link->platform) }} link" width="24" height="24">
                        @endswitch
                    </a>
                </li>
            @endforeach
        </ul>
    </section>
@endif
