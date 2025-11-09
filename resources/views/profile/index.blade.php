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
                    @if ($profiles->role == 'kader')
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
                    @else
                    @endif
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
