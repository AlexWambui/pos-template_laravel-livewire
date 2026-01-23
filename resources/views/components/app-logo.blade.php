<div class="image">
    @if (file_exists(public_path('assets/images/app-logo.jpg')))
        <img src="{{ asset('assets/images/app-logo.jpg') }}"
             alt="{{ config('app.name') }} Logo"
             {{ $attributes->merge([]) }}>
    @else
        <div class="flex items-center justify-center w-full h-full rounded-full bg-gray-300 text-xl font-bold text-gray-700"
             {{ $attributes->merge([]) }}>
            {{ strtoupper(mb_substr(config('app.name'), 0, 1)) }}
        </div>
    @endif
</div>
