<x-layouts.app>
    <div class="px-4">

        <h2 class="text-2xl font-semibold text-neutral dark:text-warning">Pengajuan Izin</h2>
        <small class="text-xs lg:text-sm opacity-85">Silahkan ajukan izin anda di form yang tersedia</small>


        <!-- Form pengajuan izin -->
        <x-card class="mt-6 w-full">
            <x-slot name="title">Form Pengajuan Izin</x-slot>

            <form class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div>
                    <label class="label"><span class="label-text">Tanggal Izin</span></label>
                    <input type="date" name="tanggal_izin" class="input input-bordered w-full" required>
                </div>
                <div>
                    <label class="label"><span class="label-text">Jenis Izin</span></label>
                    <select name="jenis_izin" class="select select-bordered w-full" required>
                        <option value="">Pilih Jenis</option>
                        <option value="sakit">Sakit</option>
                        <option value="keperluan pribadi">Keperluan Pribadi</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label class="label"><span class="label-text">Keterangan</span></label>
                    <textarea name="keterangan" class="textarea textarea-bordered w-full validator" minlength="5" maxlength="20"
                        pattern="[A-Za-z][A-Za-z0-9\-]*"required></textarea>
                    <p class="validator-hint">
                        Keterangan minimal 5 sampai 20 karakter
                        <br />Hanya berisi huruf, angka, atau tanda hubung.
                    </p>
                </div>
                <div class="md:col-span-2 flex justify-end">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </x-card>

        <x-card class="mt-8">
            <x-slot name="title">History pengajuan Izin</x-slot>

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
