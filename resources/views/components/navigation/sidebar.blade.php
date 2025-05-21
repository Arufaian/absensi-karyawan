@php
    function getInitials(string $name): string
    {
        $words = explode(' ', $name);
        $initials = '';
        foreach ($words as $word) {
            $initials .= strtoupper(substr($word, 0, 1));
        }
        return $initials;
    }
@endphp

<div :class="sidebarOpen ? 'w-64' : 'w-0'"
    class="transition-all duration-300 bg-base-200 dark:bg-base-100 flex-col hidden lg:flex">
    <div class="flex items-center justify-around p-4">

        <div x-show="sidebarOpen"
            class="avatar avatar-placeholder flex flex-col items-center justify-center dark:text-warning">
            <div class="bg-neutral-content dark:bg-neutral  w-12 rounded-full">
                <span class="text-xl " x-text="initials"></span>
            </div>
            <span class="text-sm mt-2 font-semibold" x-text="user.name"></span>
            <span class="text-xs mt-2 opacity-80" x-text="user.role"></span>
        </div>
    </div>
    <ul x-show="sidebarOpen" class="menu flex-1 px-2 w-full rounded-md dark:text-warning">
        <li class="rounded-lg mb-2"><span class="text-sm opacity-95">Menu</span></li>
        <li class="rounded-lg mb-2 {{ request()->routeIs('dashboard') ? 'bg-neutral-content dark:bg-neutral' : '' }}">
            <a href="{{ route('dashboard') }}"><x-icons.home /> Home</a>
        </li>
        <li class="rounded-lg mb-2"><a href="{{ route('absensi') }}"><x-icons.bar /> Absensi</a></li>
        <li class="rounded-lg mb-2"><a href="{{ route('pengajuan-cuti') }}"><x-icons.calendar /> Pengajuan cuti</a></li>
        <li class="rounded-lg mb-2"><a href="{{ route('pengajuan-izin') }}"><x-icons.clipboard /> Pengajuan izin</a>
        </li>


        <li class="rounded-lg mt-8"><span class="text-sm opacity-95">Lainnya</span></li>
        <li class="rounded-lg mb-2"><a href="{{ route('setting') }}"><x-icons.setting /> Pengaturan</a></li>
        <li class="rounded-lg mb-2"><a onclick="logout.showModal()"><x-icons.power /> Logout</a></li>
    </ul>
</div>

<x-modal id="logout">
    <x-slot name=title>Apakah anda ingin keluar?</x-slot>

    <p>Apakah kamu yakin ingin keluar? Tindakan ini tidak dapat dibatalkan.</p>


    <x-slot name=footer>
        <form method="dialog">
            <button class="btn btn-neutral dark:bg-warning dark:text-neutral">batal</button>
        </form>
        <button class="btn btn-error" @click="logout">keluar</button>
    </x-slot>
</x-modal>
