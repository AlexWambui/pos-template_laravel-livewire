<footer class="footer-1">
    <div class="container">
        <div class="content">
            <div class="branding">
                <h3>{{ config('app.name') }}</h3>
                <p>{{ config('app.slogan') }}</p>
                <div class="info">
                    <p class="location">
                        {!! config('app.address') !!}
                    </p>
                </div>
            </div>

            <div class="quick_links">
                <h3>Quick Links</h3>
                <div class="links">
                    <a href="{{ Route::has('home-page') ? route('home-page') : '#' }}" wire:navigate>Home</a>
                    <a href="{{ Route::has('about-page') ? route('about-page') : '#' }}" wire:navigate>About</a>
                    <a href="{{ Route::has('services-page') ? route('services-page') : '#' }}" wire:navigate>Services</a>
                    <a href="{{ Route::has('contact-page') ? route('contact-page') : '#' }}" wire:navigate>Contact</a>
                </div>
            </div>

            <div class="services">
                <h3>Services</h3>
                <div class="links">
                    @php
                        $categories = collect([
                            (object) ['title' => 'Title 1', 'slug' => 'title-1'],
                        ]);
                    @endphp
                    @foreach ($categories as $category)
                        <a href="{{ Route::has('categorized-category-page') ? route('categorized-category-page', $category->slug) : '#' }}">{{ Str::title($category->title) }}</a>
                    @endforeach
                </div>
            </div>

            <div class="connect">
                <h3>Connect With Us</h3>
                <p>Follow us for updates and insights</p>
                <div class="socials">
                    <a href="{{ config('app.instagram') }}" target="_blank" rel="noopener noreferrer">
                        <x-svgs.instagram />
                    </a>
                    <a href="{{ config('app.facebook') }}" target="_blank" rel="noopener noreferrer">
                        <x-svgs.facebook />
                    </a>
                    <a href="{{ config('app.linkedin') }}" target="_blank" rel="noopener noreferrer">
                        <x-svgs.linkedin />
                    </a>
                    <a href="{{ config('app.whatsapp') }}" target="_blank" rel="noopener noreferrer">
                        <x-svgs.whatsapp />
                    </a>
                </div>

                <div class="contacts">
                    <p>
                        <span>{{ config('app.phone_number') }}</span>
                        <span>{{ config('app.secondary_phone_number') }}</span>
                    </p>
                    <p>
                        {{ config('app.email') }}
                    </p>
                </div>
            </div>
        </div>

        <div class="copyrights">
            <p class="text">&copy; {{ now()->year }} {{ config('app.name') }}. All rights reserved.</p>
            <div class="documents">
                <a href="{{ Route::has('privacy-policy') ? route('privacy-policy') : '#' }}">Privacy Policy</a>
                <a href="{{ Route::has('terms-and-conditions') ? route('terms-and-conditions') : '#' }}">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
