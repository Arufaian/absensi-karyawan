<x-layouts.app>
    <div class="px-4">

        <x-card>
            <x-slot name="title">Riwayat absensi</x-slot>

            <div class="my-2  p-4">
                <form action="" class="flex flex-wrap items-end-safe gap-4">
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Masukan periode awal</legend>
                        <input type="date" class="input" />
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Masukan periode akhir</legend>
                        <input type="date" class="input" />
                    </fieldset>
                    <button class="btn btn-warning ">Kirim</button>

                </form>
            </div>

            <div class="overflow-x-auto">
                <table class="table" id="tabelAbsensi">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Jam Masuk</th>
                            <th>Jam Pulang</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        <tr>
                            <td>2025-05-17</td>
                            <td><span class="badge badge-success">Hadir</span></td>
                            <td>08:04</td>
                            <td>17:05</td>
                            <td>-</td>
                        </tr>
                        <!-- row 2 -->
                        <tr>
                            <td>2025-05-16</td>
                            <td><span class="badge badge-warning text-black">Terlambat</span></td>
                            <td>08:24</td>
                            <td>17:10</td>
                            <td>Kemacetan</td>
                        </tr>
                        <!-- row 3 -->
                        <tr>
                            <td>2025-05-15</td>
                            <td><span class="badge badge-error">Izin</span></td>
                            <td>-</td>
                            <td>-</td>
                            <td>Izin sakit</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </x-card>

    </div>




</x-layouts.app>
