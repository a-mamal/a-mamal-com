@if($profile?->links?->isNotEmpty())
<section id="profile-links" class="about-section">
    <h2>Links</h2>
    <ul>
        @foreach($profile->links as $link)
            <li>
                <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer">
                    {{ ucfirst($link->platform) }} ({{ $link->url }})
                </a>
            </li>
        @endforeach
    </ul>
</section>
@endif
