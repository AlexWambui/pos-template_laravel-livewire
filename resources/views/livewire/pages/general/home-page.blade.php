<div class="HomePage">
    <section class="Hero">
        <video src="{{ asset('assets/videos/hero-section.mp4') }}" autoplay loop muted playsinline></video>

        <div class="mask"></div>

        <div class="content">
            <h1 class="title">{{ config('app.name') }}</h1>
            <p class="punchline">Sales Simplified</p>

            <div class="hero_actions">
                <a href="{{ Route::has('home-page') ? route('home-page') : '#' }}">Get Started</a>
            </div>
        </div>
    </section>
</div>
