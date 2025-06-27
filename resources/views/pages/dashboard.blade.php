<x-layouts.app>
    <div class="p-6 space-y-6" x-data="dashboard" x-init="init">


        <template x-if="$store.globalState.isLoading">
            <div class="fixed inset-0 bg-neutral opacity-100 z-50 flex items-center justify-center h-screen">
                <span class="loading loading-dots loading-xl text-warning w-[50px]"></span>
            </div>
        </template>


        <!-- Heading Selamat Datang -->
        <div>
            <h1 class="text-2xl font-bold">Selamat datang, <span x-text="user.name"></span> 👋</h1>
            <p class="text-gray-500">Berikut ringkasan aktivitasmu</p>
        </div>

        <!-- Statistik Ringkas -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Kehadiran Hari Ini -->

            <x-card title="kehadiran hari ini">


                <template x-if="!statusAttendance">
                    <div>
                        <div class="text-sm text-gray-500">
                            Status: <span class="badge badge-error">Belum Absen</span>
                        </div>
                        <div class="text-sm">Jam Masuk: <strong>-</strong></div>
                        <div class="text-sm">Jam Pulang: <strong>-</strong></div>
                    </div>
                </template>

                <template x-if="statusAttendance">
                    <div>
                        <div class="text-sm text-gray-500">
                            Status: <span class="badge badge-success" x-text="statusAttendance.status"></span>
                        </div>

                        <template x-if="statusAttendance.status === 'Late'">
                            <div class="text-sm text-gray-500">
                                Status: <span class="badge badge-warning" x-text="statusAttendance.status"></span>
                            </div>
                        </template>


                        <div class="text-sm">Jam Masuk: <strong x-text="statusAttendance.check_in"></strong></div>
                        <div class="text-sm">Jam Pulang: <strong x-text="statusAttendance.check_out"></strong></div>
                    </div>
                </template>

            </x-card>

            <!-- Sisa Cuti -->
            <div class="card bg-base-100 shadow-md">
                <div class="card-body">
                    <h2 class="card-title">Sisa Cuti</h2>
                    <div x-text="leaveQuota.total_quota" class="text-3xl font-bold text-indigo-600">8 <span
                            class="text-sm font-medium">hari</span>
                    </div>
                </div>
            </div>

            <!-- Pengajuan Tertunda -->
            <div class="card bg-base-100 shadow-md">

                <div class="card-body">
                    <h2 class="card-title">Pengajuan cuti dan izin</h2>

                    <template x-if="leave.length > 1 || permission.length > 1">
                        <ul class="list-disc pl-5 text-sm text-gray-600 space-y-1">
                            <li>Cuti (2 hari) - <span class="badge badge-warning badge-sm">Menunggu</span></li>
                            <li>Izin sakit - <span class="badge badge-warning badge-sm">Menunggu</span></li>
                        </ul>
                    </template>

                    <template x-if="leave.length === 0 || permission.length === 0">
                        <p>belum melakukan pengajuan izin atau cuti</p>
                    </template>

                </div>
            </div>
        </div>

        <!-- Ringkasan Aktivitas Bulanan -->
        <div class="card bg-base-100 shadow-md">
            <div class="card-body">
                <h2 class="card-title">Ringkasan Bulan Ini</h2>
                <ul class="list-disc pl-5 text-gray-600 text-sm space-y-1">
                    <li>Total Hadir: <strong x-text="attendanceSummary.hadir"></strong><span> hari</span></li>
                    <li>Terlambat: <strong x-text="attendanceSummary.terlambat"></strong></li>
                    <li>Cuti: <strong x-text="attendanceSummary.cuti"></strong></li>
                    <li>Izin: <strong x-text="attendanceSummary.izin"></strong></li>
                    <li>Alpa: <strong x-text="attendanceSummary.alpa"></strong></li>
                </ul>
            </div>
        </div>
    </div>

</x-layouts.app>
