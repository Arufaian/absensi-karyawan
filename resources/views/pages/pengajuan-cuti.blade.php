<x-layouts.app>

    <div class="px-4" x-data="leaveForm">

        <h2 class="text-2xl font-semibold text-neutral dark:text-warning">Pengajuan cuti</h2>
        <small class="text-xs lg:text-sm opacity-85">Silahkan ajukan cuti anda</small>

        <!-- Form pengajuan cuti -->

        <div class="lg:flex gap-4">
            <x-card class="mt-6 w-full  ">
                <x-slot name="title">Batas Cuti</x-slot>
                <div class="space-y-2 text-sm mt-2">
                    <p><strong>Sisa cuti:</strong> <span x-text="leaveQuota.total_quota"></span></p>
                    <p><strong>Total jatah cuti:</strong> <span
                            x-text="leaveQuota.total_quota - leaveQuota.used_quota"></span></p>
                    <p><strong>Cuti diambil:</strong> <span x-text="leaveQuota.used_quota"></span></p>
                    <p><strong>Periode:</strong> Jan – Des 2025</p>
                    <div role="alert" class="alert alert-info">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="h-6 w-6 shrink-0 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Harap gunakan cuti sebaik mungkin.</span>
                    </div>
                </div>
            </x-card>

            <x-card class="mt-6 w-full">
                <x-slot name="title">Form Pengajuan Cuti</x-slot>

                <div class="">

                    <div x-show="successMessage" class="alert alert-success my-2" x-transition>
                        <span x-text="successMessage"></span>
                    </div>

                    <div x-show="errorMessage" class="alert alert-error my-2" x-transition>
                        <span x-text="errorMessage"></span>
                    </div>


                    <form class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4" @submit.prevent="submitLeave">

                        <div>
                            <label class="label"><span class="label-text">Tanggal Mulai</span></label>
                            <input x-model="leave.start_date" type="date" name="tanggal_mulai"
                                class="input input-bordered w-full" required>
                        </div>
                        <div>
                            <label class="label"><span class="label-text">Tanggal Berakhir</span></label>
                            <input x-model="leave.end_date" type="date" name="tanggal_berakhir"
                                class="input input-bordered w-full" required>
                        </div>
                        <div class="md:col-span-2">
                            <label class="label"><span class="label-text">Alasan</span></label>
                            <textarea x-model="leave.reason" name="alasan" class="textarea textarea-bordered w-full" required></textarea>
                        </div>
                        <div class="md:col-span-2 flex justify-end">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>


                    </form>
                </div>
            </x-card>
        </div>


        <!-- History pengajuan cuti -->
        <div class="" x-init="getLeaveData">

            <template x-if="$store.globalState.isLoading">
                <div class="fixed inset-0 bg-neutral opacity-100 z-50 flex items-center justify-center h-screen">
                    <span class="loading loading-dots loading-xl text-warning w-[50px]"></span>
                </div>
            </template>
            <x-card class="mt-8">
                <x-slot name="title">History pengajuan cuti</x-slot>

                <div class="overflow-x-auto mt-4">
                    <table class="table w-full">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Tanggal mulai</th>
                                <th>Tanggal berakhir</th>
                                <th>Alasan</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <template x-for="(leave, index) in leaveData" :key="leave.id">
                            <tbody>
                                <tr>
                                    <td x-text="index + 1"></td>
                                    <td x-text="leave.start_date"></td>
                                    <td x-text="leave.end_date"></td>
                                    <td x-text="leave.reason"></td>
                                    <td>
                                        <span class="badge"
                                            :class="{
                                                'badge-warning': leave.status === 'tertunda',
                                                'badge-success': leave.status === 'disetujui',
                                                'badge-error': leave.status === 'ditolak'
                                            }"
                                            x-text="leave.status"></span>
                                    </td>
                                </tr>

                            </tbody>
                        </template>

                    </table>
                </div>
            </x-card>
        </div>


    </div>


</x-layouts.app>
