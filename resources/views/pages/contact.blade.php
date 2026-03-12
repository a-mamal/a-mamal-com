<x-site-layout
    :title="'Contact | Anastasia Mamalikidou'"
    :description="'Get in touch with Anastasia Mamalikidou, full-stack web developer. Reach out for collaborations, projects, or general inquiries.'"
    :headerTitle="'Contact me'"
    :subtitle="'Reach out for collaborations, projects, or general inquiries.'"
>

    @include('partials.profile-links')

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
            <div class="contact-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('contact.send') }}">
            @csrf

            <label for="name">Name:</label>
            <input 
                type="text" 
                id="name"
                name="name" 
                placeholder="Your Name" 
                value="{{ old('name') }}" 
                required>

            @error('name')
                <span id="name-error" class="contact-error">{{ $message }}</span>
            @enderror


            <label for="email">Email:</label>
            <input 
                type="email" 
                id="email"
                name="email" 
                placeholder="example@mail.com" 
                value="{{ old('email') }}" 
                required>

            @error('email')
                <span class="contact-error">{{ $message }}</span>
            @enderror

            <label for="message"> Your message: </label>
            <textarea 
                id="message"
                name="message" 
                placeholder="Write your message here" 
                required>{{ old('message') }}</textarea>

            @error('message')
                <span class="contact-error">{{ $message }}</span>
            @enderror

            <button type="submit" class="button-fire">Send Message</button>
        </form>

    </section>

</x-site-layout>