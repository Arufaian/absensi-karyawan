<div class="drawer">
    <input id="my-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
        <!-- Page content here -->
    </div>
    <div class="drawer-side">
        <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
        <div class="w-64 bg-base-200 dark:bg-base-100 p-4 flex flex-col h-full justify-between">
            <div class="">
                <div class="flex items-center justify-center mb-4">
                    <div class="avatar avatar-placeholder flex flex-col items-center justify-center dark:text-warning">
                        <div class="bg-neutral-content dark:bg-neutral w-12 rounded-full">
                            <span class="text-xl" x-text="initials"></span>
                        </div>
                        <span class="text-sm mt-2 font-semibold" x-text="user.name"></span>
                        <span class="text-xs mt-2 opacity-80" x-text="user.role"></span>
                    </div>
                </div>


                <ul class="menu flex-1 px-2 w-full rounded-md dark:text-warning">
                    <li class="rounded-lg mb-2 menu-title text-warning"><span class="text-sm ">Menu</span></li>
                    <li
                        class="rounded-lg mb-2 {{ request()->routeIs('dashboard') ? 'bg-neutral-content dark:bg-neutral' : '' }}">
                        <a href="{{ route('dashboard') }}"><x-icons.home /> Home</a>
                    </li>


                    <li
                        class="rounded-lg mb-2 {{ request()->routeIs('absensi') ? 'bg-neutral-content dark:bg-neutral' : '' }}">
                        <a href="{{ route('absensi') }}"><x-icons.bar /> Absensi</a>
                    </li>

                    <li
                        class="rounded-lg mb-2 {{ request()->routeIs('pengajuan-cuti') ? 'bg-neutral-content dark:bg-neutral' : '' }}">
                        <a href="{{ route('pengajuan-cuti') }}"><x-icons.calendar /> Pengajuan
                            cuti</a>
                    </li>

                    <li
                        class="rounded-lg mb-2 {{ request()->routeIs('pengajuan-izin') ? 'bg-neutral-content dark:bg-neutral' : '' }}">
                        <a href="{{ route('pengajuan-izin') }}"><x-icons.clipboard /> Pengajuan
                            izin</a>
                    </li>

                </ul>
            </div>


            <div class="">
                <ul class="menu flex-1 px-2 w-full rounded-md dark:text-warning">
                    <li class="rounded-lg mt-8 text-warning menu-title"><span class="text-sm">Lainnya</span></li>
                    <li class="rounded-lg mb-2"><a href="{{ route('setting') }}"><x-icons.setting /> Pengaturan</a></li>
                    <li class="rounded-lg mb-2"><a onclick="logout.showModal()"><x-icons.power /> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
