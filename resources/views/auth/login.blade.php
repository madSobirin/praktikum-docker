<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="flex min-h-screen items-center justify-center bg-posyandu bg-cover bg-center px-4 md:px-0">
        <div class="flex w-full max-w-6xl rounded-lg shadow-lg overflow-hidden">

            <!-- Sisi Kiri (Form Login) -->
            <div class="w-full md:w-1/2 flex flex-col items-center justify-center bg-form p-8">
                <div class="w-full max-w-md">
                    <h2 class="text-center text-2xl font-bold text-gray-900">Masuk</h2>
                    <p class="mt-2 text-center text-sm text-gray-600">
                        Gunakan akun Anda untuk mengakses sistem Posyandu
                    </p>

                    <!-- ALERT: Pesan sukses -->
                    @if (session('success'))
                        <div id="alert-success"
                            class="flex items-center p-4 mb-4 mt-4 text-green-800 rounded-lg bg-green-50" role="alert">
                            <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <div class="ms-3 text-sm font-medium">
                                {{ session('success') }}
                            </div>
                            <button type="button"
                                class="success ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8"
                                data-dismiss-target="#alert-success" aria-label="Close">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                    @endif

                    <!-- ALERT: Pesan error -->
                    @if (session('error'))
                        <div id="alert-error" class="flex items-center p-4 mb-4 mt-4 text-red-800 rounded-lg bg-red-50"
                            role="alert">
                            <svg class="shrink-0 w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm.5 5a1.5 1.5 0 1 1-1.5 1.5A1.5 1.5 0 0 1 10.5 5Zm-1 9a1 1 0 1 1 2 0v1h-2Z" />
                            </svg>
                            <div class="ms-3 text-sm font-medium">
                                {{ session('error') }}
                            </div>
                            <button type="button"
                                class=" ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8"
                                data-dismiss-target="#alert-error" aria-label="Close">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST" class="mt-8 space-y-5">
                        @csrf

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <div class="relative mt-2">
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                    autocomplete="email" placeholder="Email@gmail.com"
                                    class="w-full rounded-md border-gray-300 px-3 py-2 pl-10 text-gray-900 shadow-sm 
                                    focus:border-blue-500 focus:ring-blue-500 sm:text-sm" />
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                            </div>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <div class="flex items-center justify-between">
                                <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                                <a href="{{ route('password.request') }}"
                                    class="text-sm font-semibold text-lamp-button hover:text-lamp-button-hover">
                                    Lupa kata sandi?
                                </a>
                            </div>
                            <div class="relative mt-2">
                                <input id="password" type="password" name="password" required
                                    autocomplete="current-password" placeholder="Masukkan kata sandi"
                                    class="w-full rounded-md border-gray-300 pl-10 pr-3 py-2 text-gray-900 shadow-sm 
                                    focus:border-blue-500 focus:ring-blue-500 sm:text-sm" />
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                            </div>
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tombol Login -->
                        <div>
                            <button type="submit"
                                class="w-full rounded-md bg-lamp-button px-4 py-3 text-sm font-semibold text-white shadow-sm 
                                hover:bg-lamp-button-hover focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Masuk
                            </button>
                        </div>
                    </form>

                    <!-- Link ke Register -->
                    <p class="mt-6 text-center text-sm text-gray-600">
                        Belum punya akun?
                        <a href="{{ route('register') }}"
                            class="font-semibold text-lamp-button hover:text-lamp-button-hover">
                            Daftar sekarang
                        </a>
                    </p>
                </div>
            </div>

            <!-- Sisi Kanan (Gambar) -->
            <div class="hidden md:flex md:w-1/2 bg-cover bg-center" style="background-image: url('/img/posyandu.png');">
            </div>
        </div>
    </div>
</x-app>
