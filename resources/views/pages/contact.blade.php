<x-site-layout
    :title="'Contact | Anastasia Mamalikidou'"
    :description="'Get in touch with Anastasia Mamalikidou, full-stack web developer. Reach out for collaborations, projects, or general inquiries.'"
    :headerTitle="'Contact me'"
    :subtitle="'Reach out for collaborations, projects, or general inquiries.'"
>

<section class="contact-section">

    <h2>Get in touch!</h2>

    <ul class="contact-reasons space-y-1 mb-8">
        <li>Do you have a project or opportunity?</li>
        <li>Just want to say "hi"?</li>
        <li>Got website suggestions or feedback?</li>
    </ul>

    <p>
        I'd love to hear from you! I read every message.
    </p>

    <p>
        You can send me a message on
        <a href="mailto:{{ $user->email }}">{{ $user->email }}</a> or use the form below.
    </p>

    @if(session('success'))
        <div class="contact-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('contact.send') }}">
        @csrf

        {{-- Name --}}
        <label for="name">Name:</label>
        <input
            type="text"
            id="name"
            name="name"
            placeholder="Your Name"
            value="{{ old('name') }}"
            required
        >

        @error('name')
            <span id="name-error" class="contact-error">
                {{ $message }}
            </span>
        @enderror


        {{-- Email --}}
        <label for="email">Email:</label>
        <input
            type="email"
            id="email"
            name="email"
            placeholder="example@mail.com"
            value="{{ old('email') }}"
            required
        >

        @error('email')
            <span class="contact-error">
                {{ $message }}
            </span>
        @enderror


        {{-- Message --}}
        <label for="message">Your message:</label>
        <textarea
            id="message"
            name="message"
            placeholder="Write your message here"
            required
        >{{ old('message') }}</textarea>

        @error('message')
            <span class="contact-error">
                {{ $message }}
            </span>
        @enderror

        <button type="submit" class="button-fire">
            Send Message
        </button>

    </form>

</section>

{{-- Profile Links Section --}}
@if(isset($profileLinks) && $profileLinks->count())
    <div class="profile-links-section">

        <h3>Find me online</h3>

        <div class="profile-links">
            @foreach($profileLinks as $link)
                <a
                    href="{{ $link->url }}"
                    class="profile-link"
                    target="_blank"
                    rel="noopener"
                    aria-label="{{ $link->platform }} profile"
                >
                    <span class="profile-link-icon">
                        @if($link->platform === 'github')
                            <svg viewBox="0 0 24 24" width="18" height="18">
                                <path fill="currentColor" d="M12 .5C5.65.5.5 5.65.5 12c0 5.08 3.29 9.38 7.84 10.9.57.1.78-.25.78-.55v-2.1c-3.19.69-3.87-1.37-3.87-1.37-.52-1.34-1.27-1.69-1.27-1.69-1.04-.72.08-.71.08-.71 1.15.08 1.76 1.18 1.76 1.18 1.02 1.75 2.67 1.25 3.32.96.1-.74.4-1.25.73-1.54-2.55-.29-5.23-1.28-5.23-5.69 0-1.26.45-2.3 1.18-3.11-.12-.29-.51-1.46.11-3.04 0 0 .97-.31 3.18 1.19a11.1 11.1 0 0 1 5.79 0c2.21-1.5 3.18-1.19 3.18-1.19.62 1.58.23 2.75.11 3.04.73.81 1.18 1.85 1.18 3.11 0 4.42-2.69 5.39-5.25 5.67.41.35.77 1.03.77 2.08v3.08c0 .3.21.65.79.54A11.5 11.5 0 0 0 23.5 12C23.5 5.65 18.35.5 12 .5z"/>
                            </svg>
                        @endif
                    </span>

                    <span class="profile-link-text">
                        {{ ucfirst($link->platform) }}
                    </span>
                </a>
            @endforeach
        </div>

    </div>
@endif

</x-site-layout>