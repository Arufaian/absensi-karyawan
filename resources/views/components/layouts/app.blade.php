<!DOCTYPE html>
<html lang="id" data-theme="night">

<head>
    <!-- HEAD -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Aplikasi Karyawan' }}</title>



    <!-- Vite - Memuat Tailwind + DaisyUI dari config -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="">

    <div class="" x-data="dashboard" x-init="init">

        <div x-data="{ sidebarOpen: true }" class="flex h-screen">
            <!-- Sidebar -->


            <x-navigation.sidebar></x-navigation.sidebar>
            <!-- Main Content -->
            <div class="flex-1 bg-base-300 overflow-auto">
                {{-- navbar --}}
                <div class="px-8 py-4 ">
                    <x-navigation.navbar></x-navigation.navbar>
                </div>


                <div class="p-4 ">
                    <!-- Konten halaman -->
                    {{ $slot }}
                </div>
            </div>
        </div>

    </div>

</body>

</html>
