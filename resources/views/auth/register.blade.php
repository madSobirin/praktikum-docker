<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="flex min-h-screen items-center justify-center bg-posyandu bg-cover bg-center px-4 md:px-0">
        <div class="flex w-full max-w-6xl rounded-lg shadow-lg overflow-hidden">

            <div class="w-full md:w-1/2 flex flex-col items-center justify-center bg-form p-8">
                <div class="w-full max-w-md">
                    <h2 class="text-center text-2xl font-bold text-gray-900">Daftar Akun</h2>
                    <p class="mt-2 text-center text-sm text-gray-600">
                        Buat akun baru untuk menggunakan sistem Posyandu
                    </p>

                    @if (session('success'))
                        <div
                            class="mt-4 p-3 text-sm text-green-700 bg-green-100 border border-green-300 rounded-md text-center">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('register') }}" method="POST" class="mt-8 space-y-5">
                        @csrf

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                            <div class="relative mt-2">
                                <input id="name" type="text" name="name" value="{{ old('name') }}" required
                                    placeholder="Nama lengkap"
                                    class="w-full rounded-md px-3 py-2 pl-10 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('name') border-red-500 @enderror" />
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                            </div>
                            @error('name')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <div class="relative mt-2">
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                    placeholder="contoh@gmail.com"
                                    class="w-full rounded-md 0 pl-10 pr-3 py-2 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('email') border-red-500 @enderror" />
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                            </div>
                            @error('email')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex flex-col md:flex-row md:space-x-4">
                            <div class="flex-1">
                                <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                                <div class="relative mt-2">
                                    <input id="password" type="password" name="password" required
                                        placeholder="Min. 8 karakter"
                                        class="w-full rounded-md  pl-10 pr-3 py-2 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('password') border-red-500 @enderror" />
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <i class="fas fa-lock text-gray-400"></i>
                                    </div>
                                </div>
                                @error('password')
                                    <p class="mt-1 text-xs text-red-600">Password Harus sesuai</p>
                                @enderror
                            </div>

                            <div class="flex-1 mt-4 md:mt-0">
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                                    Konfirmasi Kata Sandi
                                </label>
                                <div class="relative mt-2">
                                    <input id="password_confirmation" type="password" name="password_confirmation"
                                        required placeholder="Ulangi kata sandi"
                                        class="w-full rounded-md  pl-10 pr-3 py-2 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('password_confirmation') border-red-500 @enderror" />
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <i class="fas fa-lock text-gray-400"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                            <div class="relative mt-2">
                                <select id="role" name="role" required
                                    class="appearance-none w-full rounded-md  pl-10 pr-8 py-2 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('role') border-red-500 @enderror">
                                    <option value="kader" {{ old('role') == 'kader' ? 'selected' : '' }}>Kader</option>
                                    <option value="pengguna" {{ old('role') == 'pengguna' ? 'selected' : '' }}>Pengguna
                                    </option>
                                </select>
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fas fa-user-tag text-gray-400"></i>
                                </div>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                    <i class="fas fa-chevron-down text-gray-400"></i>
                                </div>
                            </div>
                            @error('role')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <button type="submit"
                                class="w-full rounded-md bg-lamp-button px-4 py-3 text-sm font-semibold text-white shadow-sm hover:bg-lamp-button-hover focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Daftar
                            </button>
                        </div>
                    </form>

                    <p class="mt-6 text-center text-sm text-gray-600">
                        Sudah punya akun?
                        <a href="{{ route('login') }}"
                            class="font-semibold text-lamp-button hover:text-lamp-button-hover">
                            Masuk sekarang
                        </a>
                    </p>
                </div>
            </div>

            <div class="hidden md:flex md:w-1/2 bg-cover bg-center" style="background-image: url('/img/posyandu.png');">
            </div>
        </div>
    </div>
</x-app>
