<x-app-main :title="'Dashboard'">
    <main class="ml-2 md:ml-2">
        <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
        <p class="text-gray-600 mb-6">haloo {{ Auth::user()->name }}, selamat datang di dashboard</p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 md:gap-6 mb-6">
            <div class="bg-white rounded-xl p-4 shadow-md">
                <div class="flex items-center">
                    <div class="rounded-lg bg-blue-100 p-3">
                        <i class="fas fa-baby text-2xl text-baby"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-gray-500 text-sm">
                            Total Balita
                        </p>
                        <h3 class="text-2xl font-bold">{{ $totalBalita }}</h3>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl p-4 shadow-md">
                <div class="flex items-center">
                    <div class="rounded-lg bg-green-100 p-3">
                        <i class="fas fa-female text-2xl text-success"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-gray-500 text-sm">
                            Ibu Hamil
                        </p>
                        <h3 class="text-2xl font-bold">{{ $totalIbuHamil }}</h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- Untuk Meletakkan Data Chart di JS jembatan antara controller dan chart.js --}}
        <div id="chart-data" data-gizi='@json([$totalGiziBaik, $totalGiziBuruk, $totalStunting])' data-ibu='@json([$totalKondisiBaik, $totalKondisiAnemia])'>
        </div>

        {{-- Chart Section --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <!-- Status Gizi Balita Chart -->
            <div class="bg-white rounded-xl p-4 md:p-6 shadow-md">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold text-gray-800">
                        Status Gizi Balita
                    </h2>
                </div>
                <div class="h-64">
                    <canvas id="giziChart"></canvas>
                </div>
            </div>


            <!-- Kondisi Ibu Hamil Chart -->
            <div class="bg-white rounded-xl p-4 md:p-6 shadow-md">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold text-gray-800">
                        Kondisi Ibu Hamil
                    </h2>
                </div>
                <div class="h-64">
                    <canvas id="ibuHamilChart"></canvas>
                </div>
            </div>
        </div>

        {{-- Schedule Jadwal --}}
        <div class="bg-white rounded-xl p-4 md:p-6 card-shadow">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-bold text-gray-800">
                    Jadwal Mendatang
                </h2>
            </div>

            <div class="space-y-4">
                @forelse ($jadwals as $jadwal)
                    <div class="flex items-center p-4 border border-gray-200 rounded-lg mt-4">
                        <!-- Kotak tanggal -->
                        <div
                            class="bg-posyanduu text-white rounded-lg w-12 h-12 flex flex-col items-center justify-center">
                            <span class="font-bold">
                                {{ \Carbon\Carbon::parse($jadwal->waktu_mulai)->format('d') }}
                            </span>
                        </div>

                        <!-- Informasi jadwal -->
                        <div class="ml-4 flex-1">
                            <h3 class="font-medium">{{ $jadwal->keterangan }}</h3>
                            <p class="text-sm text-gray-600">
                                {{ \Carbon\Carbon::parse($jadwal->waktu_mulai)->format('H:i') }}
                                -
                                {{ \Carbon\Carbon::parse($jadwal->waktu_selesai)->format('H:i') }}
                                • {{ $jadwal->lokasi }}
                            </p>
                        </div>

                        <!-- Tombol aksi -->
                        <div class="flex space-x-2">
                            <a href="{{ route('jadwal.edit', $jadwal->id) }}"
                                class="text-posyanduu hover:text-posyanduDark">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin hapus jadwal ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-danger hover:text-red-600">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-gray-500 mt-10">
                        <i class="fa-solid fa-calendar-xmark text-4xl mb-2"></i>
                        <p class="text-lg font-medium">Belum ada jadwal posyandu.</p>
                        <p class="text-sm">Silakan tambahkan jadwal baru untuk ditampilkan di sini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </main>
</x-app-main>
