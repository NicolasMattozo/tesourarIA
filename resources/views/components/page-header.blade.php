@props(['title', 'subtitle' => null])

<header class="gradient-header text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <h1 class="text-3xl font-bold tracking-tight">{{ $title }}</h1>

        @if($subtitle)
            <p class="text-amber-100/80 mt-1">{{ $subtitle }}</p>
        @endif
    </div>
</header>
