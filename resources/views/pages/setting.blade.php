<x-layouts.app>
    <div class="px-4">

        <div class="mb-4">
            <h2 class="text-2xl font-semibold text-neutral dark:text-warning">Pengaturan Akun</h2>
            <small class="text-xs lg:text-sm opacity-85">Edit informasi pribadi Anda</small>
        </div>

        <div class="bg-base-100 p-6 rounded-xl shadow-lg flex flex-col md:flex-row gap-8">
            <!-- Form -->
            <form class="flex-1 space-y-4">

                <h2 class="text-lg font-semibold border-b pb-2">Informasi Pribadi</h2>

                <!-- Nama -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Nama</span>
                    </label>
                    <label class="input-group">
                        <span><i class="fa fa-user"></i></span>
                        <input type="text" name="name" value="asu" class="input input-bordered w-full" />
                    </label>
                </div>

                <!-- Email -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <label class="input-group">
                        <span><i class="fa fa-envelope"></i></span>
                        <input type="email" name="email" value="" class="input input-bordered w-full" />
                    </label>
                </div>

                <!-- Telepon -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">No. Telepon</span>
                    </label>
                    <label class="input-group">
                        <span><i class="fa fa-phone"></i></span>
                        <input type="text" name="phone" value="" class="input input-bordered w-full" />
                    </label>
                </div>

                <!-- Password -->
                <h2 class="text-lg font-semibold mt-6 border-b pb-2">Keamanan</h2>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Password Baru</span>
                    </label>
                    <label class="input-group">
                        <span><i class="fa fa-lock"></i></span>
                        <input type="password" name="password" class="input input-bordered w-full" />
                    </label>
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Konfirmasi Password</span>
                    </label>
                    <label class="input-group">
                        <span><i class="fa fa-lock"></i></span>
                        <input type="password" name="password_confirmation" class="input input-bordered w-full" />
                    </label>
                </div>

                <div class="text-end pt-4">
                    <button class="btn btn-primary px-6 transition duration-300 hover:scale-105">
                        Simpan Perubahan
                    </button>
                </div>
            </form>

        </div>



</x-layouts.app>
