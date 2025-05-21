<div {{ $attributes->merge(['class' => 'card bg-base-100 shadow-md']) }}>
    <div class="card-body">
        @isset($title)
            <h2 class="card-title text-base lg:text-xl text-neutral dark:text-warning">{{ $title }}</h2>
        @endisset

        {{ $slot }}
    </div>
</div>
