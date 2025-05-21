<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Login</title>
</head>


<body class="">



    <div class="flex items-center justify-center min-h-screen bg-base-200">

        <div class="absolute top-4 right-12">
            <x-swap></x-swap>
        </div>

        <div x-data="loginForm()" class="w-full max-w-sm shadow-xl bg-base-100 p-6 rounded-box">
            <h1 class="text-2xl font-bold text-center mb-6">Login </h1>

            <form @submit.prevent="submit">
                <div class="form-control mb-4">
                    <label class="label text-sm">
                        <span class="label-text">Email</span>
                    </label>
                    <label class="input validator">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none"
                                stroke="currentColor">
                                <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                            </g>
                        </svg>
                        <input x-model="email" type="email" placeholder="example@gmail.com" required />
                    </label>
                    <div class="validator-hint hidden">Masukan email yang valid</div>
                </div>

                <div class="form-control mb-4">
                    <label class="label text-sm">
                        <span class="label-text">Password</span>
                    </label>


                    <label class="input validator">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none"
                                stroke="currentColor">
                                <path
                                    d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z">
                                </path>
                                <circle cx="16.5" cy="7.5" r=".5" fill="currentColor"></circle>
                            </g>
                        </svg>
                        <input x-model="password" type="password" required placeholder="Password" minlength="8"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Must be more than 8 characters, including number, lowercase letter, uppercase letter" />
                    </label>
                    <p class="validator-hint hidden">
                        Password harus terdiri dari 8 karakter, termasuk
                        <br />Minimal satu nomor <br />Minimal satu huruf besar <br />Minimal satu huruf kecil
                    </p>



                    <label class="label mt-4">
                        <a href="#" class="label-text-alt link link-hover text-sm">Forgot password?</a>
                    </label>
                </div>

                <div class="form-control mt-6">
                    <button type="submit" class="btn btn-primary dark:btn-warning">Login</button>
                </div>
            </form>
        </div>

    </div>


</body>

</html>
