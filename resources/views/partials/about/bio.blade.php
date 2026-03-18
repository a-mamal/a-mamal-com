@if($profile?->bio)
    <section id="bio" class="about-section">
        <h3>Bio</h3>
        <p>{{ $profile->bio }}</p>
    </section>
@endif