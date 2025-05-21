<!-- resources/views/components/modal.blade.php -->
<dialog id="{{ $id ?? 'modal-default' }}" class="modal" {{ $attributes }}>
    <div class="modal-box bg-base-200 dark:bg-neutral">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        @isset($title)
            <h3 class="text-lg font-bold">{{ $title }}</h3>
        @endisset

        <div class="py-4">
            {{ $slot }}
        </div>

        @isset($footer)
            <div class="modal-action">
                {{ $footer }}
            </div>
        @endisset
    </div>
</dialog>
