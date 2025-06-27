<x-layouts.app>
    <div class="px-4" x-data="permissionForm">

        <template x-if="$store.globalState.isLoading">
            <div class="fixed inset-0 bg-neutral opacity-100 z-50 flex items-center justify-center h-screen">
                <span class="loading loading-dots loading-xl text-warning w-[50px]"></span>
            </div>
        </template>

        <h2 class="text-2xl font-semibold text-neutral dark:text-warning">Pengajuan Izin</h2>
        <small class="text-xs lg:text-sm opacity-85">Silahkan ajukan izin anda di form yang tersedia</small>

        {{-- alert success --}}
        <template x-if="successMessage !== ''">
            <div x-show="successMessage" class="toast toast-top toast-center z-[999]">
                <div class="alert alert-success">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span x-text="successMessage"></span>
                </div>
            </div>
        </template>


        {{-- modal izin --}}
        <!-- You can open the modal using ID.showModal() method -->
        <dialog id="modalIzin" class="modal">
            <div class="modal-box">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2"
                    onclick="modalIzin.close()">✕</button>

                <form class="mt-4" @submit.prevent="submitPermission">
                    <h3 class="text-center font-semibold text-warning text-2xl">From pengajuan Izin</h3>
                    <div class=" rounded p-4 flex flex-col gap-4 items-center w-full">

                        <input x-model="inputPermission.date" type="date"
                            class="input input-bordered w-full max-w-xs lg:max-w-lg" />

                        <textarea x-model="inputPermission.reason" class="textarea textarea-bordered w-full max-w-xs lg:max-w-lg"
                            placeholder="Alasan cuti"></textarea>

                        <button type="submit" onclick="modalIzin.close()"
                            class="btn btn-primary mt-2 w-full max-w-xs lg:max-w-lg">Kirim</button>

                    </div>
                </form>
            </div>
        </dialog>



        <x-card class="mt-8">
            <x-slot name="title">History pengajuan Izin</x-slot>

            <div class="overflow-x-auto mt-4" x-init="getPermission">


                <div class="mb-4 flex justify-end">
                    <button class="btn btn-primary" onclick="modalIzin.showModal()">Ajukan izin</button>
                </div>

                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal pengajuan</th>
                            <th>Alasan</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <template x-for="(permission, index) in permissionData" :key="permission.id">
                        <tbody>

                            <tr>
                                <td x-text="index + 1"></td>
                                <td x-text="permission.date"></td>
                                <td x-text="permission.reason"></td>
                                <td>
                                    <span class="badge"
                                        :class="{
                                            'badge-warning': permission.status === 'tertunda',
                                            'badge-success': permission.status === 'disetujui',
                                            'badge-error': permission.status === 'ditolak'
                                        }"
                                        x-text="permission.status"></span>
                                </td>
                            </tr>

                        </tbody>
                    </template>
                </table>
            </div>
        </x-card>
    </div>

</x-layouts.app>
