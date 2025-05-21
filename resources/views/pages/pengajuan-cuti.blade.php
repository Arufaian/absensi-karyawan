<x-layouts.app>

    <div class="px-4">

        <h2 class="text-2xl font-semibold text-neutral dark:text-warning">Pengajuan cuti</h2>
        <small class="text-xs lg:text-sm opacity-85">Silahkan ajukan cuti anda</small>

        <!-- Form pengajuan cuti -->

        <div class="lg:flex gap-4">
            <x-card class="mt-6 w-full  ">
                <x-slot name="title">Batas Cuti</x-slot>
                <div class="space-y-2 text-sm mt-2">
                    <p><strong>Sisa cuti:</strong> 5 hari</p>
                    <p><strong>Total jatah cuti:</strong> 12 hari</p>
                    <p><strong>Cuti diambil:</strong> 7 hari</p>
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

                <div class="" x-data="leaveForm">

                    <div x-show="successMessage" class="alert alert-success my-2" x-transition>
                        <span x-text="successMessage"></span>
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
        <x-card class="mt-8">
            <x-slot name="title">History pengajuan cuti</x-slot>

            <div class="overflow-x-auto mt-4">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>Tanggal mulai</th>
                            <th>Tanggal berakhir</th>
                            <th>Alasan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>ditolah</td>
                            <td>ditolah</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </x-card>

    </div>


</x-layouts.app>
