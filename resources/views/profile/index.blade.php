<x-app-main title="Profil Pengguna">
    <main class="p-6 bg-gray-50 min-h-screen shadow-md">
        <div class="max-w-4xl">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-posyanduu to-posyanduDark rounded-2xl shadow-lg p-6 mb-6 text-white">
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <div class="flex items-center space-x-4 mb-4 md:mb-0">
                        <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 12a5 5 0 1 0 0-10 5 5 0 0 0 0 10Zm0 2c-4.42 0-8 3.58-8 8h16c0-4.42-3.58-8-8-8Z" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold">{{ ucfirst($profiles->name) }}</h1>
                            <p class="text-blue-100 opacity-90">{{ ucfirst($profiles->role) }}</p>
                        </div>
                    </div>
                    <div class="text-center md:text-right">
                        <p class="text-sm text-blue-100">Bergabung sejak</p>
                        <p class="font-semibold">{{ $profiles->created_at->format('d F Y') }}</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Sidebar Menu -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Menu Profil</h3>
                        <nav class="space-y-2">
                            <a href="#"
                                class="flex items-center space-x-3 p-3 rounded-lg bg-indigo-50 text-indigo-600 font-medium">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span>Informasi Pribadi</span>
                            </a>
                        </nav>
                    </div>
                    <div class="bg-white rounded-2xl shadow-sm p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Statistik</h3>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Peserta Terdaftar</span>
                                <span class="font-semibold text-indigo-600">{{ $totalPeserta }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Total Pemeriksaan</span>
                                <span class="font-semibold text-indigo-600">{{ $pemeriksaans->count() }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <!-- Personal Information -->
                    <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-bold text-gray-800">Informasi Pribadi</h2>
                            <button
                                class="text-indigo-600 hover:text-indigo-700 font-medium flex items-center space-x-1 cursor-pointer">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                <span>Edit</span>
                            </button>
                        </div>

                        <div class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="md:col-span-1">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                </div>
                                <div class="md:col-span-2">
                                    <div class="p-3 bg-gray-50 rounded-lg border border-gray-200">
                                        <p class="text-gray-900">{{ ucfirst($profiles->name) }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="md:col-span-1">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                                </div>
                                <div class="md:col-span-2">
                                    <div class="p-3 bg-gray-50 rounded-lg border border-gray-200">
                                        <p class="text-gray-900">{{ $profiles->email }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="md:col-span-1">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Peran</label>
                                </div>
                                <div class="md:col-span-2">
                                    <div class="p-3 bg-gray-50 rounded-lg border border-gray-200">
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                            {{ ucfirst($profiles->role) }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="md:col-span-1">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Bergabung Pada</label>
                                </div>
                                <div class="md:col-span-2">
                                    <div class="p-3 bg-gray-50 rounded-lg border border-gray-200">
                                        <p class="text-gray-900">{{ $profiles->created_at->format('d F Y, H:i') }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="md:col-span-1">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Terakhir
                                        Diperbarui</label>
                                </div>
                                <div class="md:col-span-2">
                                    <div class="p-3 bg-gray-50 rounded-lg border border-gray-200">
                                        <p class="text-gray-900">{{ $profiles->updated_at->format('d F Y, H:i') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-main>

{{-- <x-app-main title="Profil Pengguna">
    <main class="p-6 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl shadow-lg p-6 mb-6 text-white">
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <div class="flex items-center space-x-4 mb-4 md:mb-0">
                        <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 12a5 5 0 1 0 0-10 5 5 0 0 0 0 10Zm0 2c-4.42 0-8 3.58-8 8h16c0-4.42-3.58-8-8-8Z"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold">Amelia Putri</h1>
                            <p class="text-blue-100 opacity-90">Bidan/Kader Posyandu</p>
                        </div>
                    </div>
                    <div class="text-center md:text-right">
                        <p class="text-sm text-blue-100">Bergabung sejak</p>
                        <p class="font-semibold">01 Januari 2023</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Menu Profil</h3>
                        <nav class="space-y-2">
                            <a href="#" class="flex items-center space-x-3 p-3 rounded-lg bg-indigo-50 text-indigo-600 font-medium">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                <span>Informasi Pribadi</span>
                            </a>
                            <a href="#" class="flex items-center space-x-3 p-3 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                                <span>Keamanan</span>
                            </a>
                            <a href="#" class="flex items-center space-x-3 p-3 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span>Pengaturan</span>
                            </a>
                        </nav>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Statistik</h3>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Aktivitas Bulan Ini</span>
                                <span class="font-semibold text-indigo-600">24</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Total Pemeriksaan</span>
                                <span class="font-semibold text-indigo-600">156</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Status Akun</span>
                                <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Aktif</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-bold text-gray-800">Informasi Pribadi</h2>
                            <button class="text-indigo-600 hover:text-indigo-700 font-medium flex items-center space-x-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                <span>Edit</span>
                            </button>
                        </div>

                        <div class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="md:col-span-1">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                </div>
                                <div class="md:col-span-2">
                                    <div class="p-3 bg-gray-50 rounded-lg border border-gray-200">
                                        <p class="text-gray-900">Amelia Putri</p>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="md:col-span-1">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                                </div>
                                <div class="md:col-span-2">
                                    <div class="p-3 bg-gray-50 rounded-lg border border-gray-200">
                                        <p class="text-gray-900">amelia.putri@posyandu.id</p>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="md:col-span-1">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Peran</label>
                                </div>
                                <div class="md:col-span-2">
                                    <div class="p-3 bg-gray-50 rounded-lg border border-gray-200">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                            Bidan/Kader Posyandu
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="md:col-span-1">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Bergabung Pada</label>
                                </div>
                                <div class="md:col-span-2">
                                    <div class="p-3 bg-gray-50 rounded-lg border border-gray-200">
                                        <p class="text-gray-900">01 Januari 2023, 10:00</p>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="md:col-span-1">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Terakhir Diperbarui</label>
                                </div>
                                <div class="md:col-span-2">
                                    <div class="p-3 bg-gray-50 rounded-lg border border-gray-200">
                                        <p class="text-gray-900">04 November 2025, 19:30</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-6">Aktivitas Terbaru</h2>
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3 p-4 bg-blue-50 rounded-lg border border-blue-100">
                                <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-gray-800 font-medium">Pemeriksaan balita selesai</p>
                                    <p class="text-gray-600 text-sm">Pemeriksaan untuk Ananda Rizki telah berhasil dicatat</p>
                                    <p class="text-gray-500 text-xs mt-1">2 jam yang lalu</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3 p-4 bg-green-50 rounded-lg border border-green-100">
                                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-gray-800 font-medium">Data baru ditambahkan</p>
                                    <p class="text-gray-600 text-sm">Data ibu hamil baru berhasil dimasukkan ke sistem</p>
                                    <p class="text-gray-500 text-xs mt-1">Kemarin, 14:30</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3 p-4 bg-purple-50 rounded-lg border border-purple-100">
                                <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-gray-800 font-medium">Laporan bulanan dibuat</p>
                                    <p class="text-gray-600 text-sm">Laporan aktivitas November 2025 telah berhasil digenerate</p>
                                    <p class="text-gray-500 text-xs mt-1">3 hari yang lalu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-main> --}}
