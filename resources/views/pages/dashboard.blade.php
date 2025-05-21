<x-layouts.app>
    <div class="p-6 space-y-6" x-data="dashboard" x-init="init">
        <!-- Heading Selamat Datang -->
        <div>
            <h1 class="text-2xl font-bold">Selamat datang, <span x-text="user.name"></span> 👋</h1>
            <p class="text-gray-500">Berikut ringkasan aktivitasmu</p>
        </div>

        <!-- Statistik Ringkas -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Kehadiran Hari Ini -->

            <x-card title="kehadiran hari ini">
                <div class="text-sm text-gray-500">Status: <span class="badge badge-success">Hadir</span></div>
                <div class="text-sm">Jam Masuk: <strong>08:05 WIB</strong></div>
                <div class="text-sm">Jam Pulang: <strong>-</strong></div>
            </x-card>

            <!-- Sisa Cuti -->
            <div class="card bg-base-100 shadow-md">
                <div class="card-body">
                    <h2 class="card-title">Sisa Cuti</h2>
                    <div class="text-3xl font-bold text-indigo-600">8 <span class="text-sm font-medium">hari</span>
                    </div>
                </div>
            </div>

            <!-- Pengajuan Tertunda -->
            <div class="card bg-base-100 shadow-md">
                <div class="card-body">
                    <h2 class="card-title">Pengajuan Tertunda</h2>
                    <ul class="list-disc pl-5 text-sm text-gray-600 space-y-1">
                        <li>Cuti (2 hari) - <span class="badge badge-warning badge-sm">Menunggu</span></li>
                        <li>Izin sakit - <span class="badge badge-warning badge-sm">Menunggu</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Ringkasan Aktivitas Bulanan -->
        <div class="card bg-base-100 shadow-md">
            <div class="card-body">
                <h2 class="card-title">Ringkasan Bulan Ini</h2>
                <ul class="list-disc pl-5 text-gray-600 text-sm space-y-1">
                    <li>Total Hadir: <strong>15 hari</strong></li>
                    <li>Terlambat: <strong>3 kali</strong></li>
                    <li>Cuti: <strong>1 kali</strong></li>
                    <li>Izin: <strong>1 kali</strong></li>
                </ul>
            </div>
        </div>
    </div>

</x-layouts.app>
