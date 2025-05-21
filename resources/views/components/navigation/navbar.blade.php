<div class="navbar bg-base-100 shadow mb-4 p-3 rounded-xl">
    <div class="flex-none ">
        <div class="flex lg:hidden">
            <label for="my-drawer" class="btn btn-square btn-ghost">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </label>
        </div>
        <div class="hidden lg:flex">
            <button @click="sidebarOpen = !sidebarOpen" class="btn btn-square btn-ghost">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <div class="">
        <a class="btn btn-ghost text-xl">Logo</a>
    </div>

    <x-swap></x-swap>


    <div class="flex px-4 font-semibold ">

        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                <button class="btn btn-square btn-ghost">
                    <x-icons.EllipsisHorizontalIcon></x-icons.EllipsisHorizontalIcon>
                </button>
            </div>
            <ul tabindex="0" class="mt-3 z-1  shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
                <li><a href="{{ route('setting') }}"><button>Settings</button></a></li>
                <li><button onclick="logout.showModal()">Logout</button></li>
            </ul>
        </div>
    </div>
</div>

<x-drawer></x-drawer>
