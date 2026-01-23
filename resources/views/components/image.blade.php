{{--
Usage:
Default Image
<x-image class="w-16 h-16" />


Custom Image
<x-image image="assets/images/custom-image.png" class="w-20 h-20" />
--}}

@props(['image' => 'assets/images/image.jpg'])

<div class="image">
    @if (file_exists(public_path($image)))
        <img src="{{ asset($image) }}"
             alt="{{ config('app.name') }} Image"
             {{ $attributes->merge([]) }}>
    @else
        <div class="flex items-center justify-center w-full h-full rounded-full bg-gray-300 text-xl font-bold text-gray-700"
            {{ $attributes->merge([]) }}>
            {{ strtoupper(mb_substr(config('app.name'), 0, 1)) }}
        </div>
    @endif
</div>
