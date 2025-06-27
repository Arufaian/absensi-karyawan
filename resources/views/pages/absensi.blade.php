<x-layouts.app>
    <div class="px-4" x-data="viewAbsensi">

        <x-card>
            <x-slot name="title">Riwayat absensi</x-slot>

            <div class="my-2  p-4">
            </div>

            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>rfid id</th>
                            <th>Tanggal absensi</th>
                            <th>Status</th>
                            <th>Jam Masuk</th>
                            <th>Jam Pulang</th>
                        </tr>
                    </thead>
                    <tbody>

                        <template x-for="(item, index) in absensiData">
                            <tr>
                                <td x-text="index + 1"></td>
                                <td x-text="item.rfid_id"></td>
                                <td x-text="item.date"></td>
                                <td>
                                    <span class="badge"
                                        :class="{
                                            'badge-warning': item.status === 'terlambat',
                                            'badge-success': item.status === 'hadir',
                                            'badge-error': item.status === 'alpa',
                                            'badge-primary': item.status === 'cuti',
                                            'badge-secondary': item.status === 'izin',
                                        }"
                                        x-text="item.status"></span>
                                </td>
                                <td x-text="item.check_in || 'tidak di tempat'"></td>
                                <td x-text="item.check_out || 'tidak di tempat'">-</td>
                            </tr>
                        </template>

                    </tbody>
                </table>

                <div class=" flex justify-center">
                    <div class="join">
                        <button class="join-item btn" @click="prevPage" :disabled="currentPage === 1">«</button>
                        <button x-text="`${currentPage} / ${lastPage}`" class="join-item btn"></button>
                        <button class="join-item btn" class="btn" @click="nextPage"
                            :disabled="currentPage === lastPage">»</button>
                    </div>
                </div>
            </div>

        </x-card>

    </div>




</x-layouts.app>
