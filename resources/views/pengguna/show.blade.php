<x-app-main>
    <div class="max-w-full mx-auto p-6 bg-white shadow-md rounded-xl">
        <!-- Judul -->
        <h1 class="text-2xl font-bold text-gray-800 mb-4">{{ $jadwal->keterangan }}</h1>

        <!-- Informasi utama -->
        <div class="space-y-4 text-gray-700">
            <div>
                <span class="font-semibold">📍 Lokasi:</span>
                <p>{{ $jadwal->lokasi }}</p>
            </div>

            <div>
                <span class="font-semibold">🕓 Waktu Mulai:</span>
                <p>{{ \Carbon\Carbon::parse($jadwal->waktu_mulai)->translatedFormat('l, d F Y • H:i') }}</p>
            </div>

            <div>
                <span class="font-semibold">🕘 Waktu Selesai:</span>
                <p>{{ \Carbon\Carbon::parse($jadwal->waktu_selesai)->translatedFormat('l, d F Y • H:i') }}</p>
            </div>
        </div>

        <!-- Garis pemisah -->
        <hr class="my-6">

        <!-- Tombol kembali -->
        <a href="{{ route('pengguna.dashboard') }}"
            class="flex justify-end items-center text-gray-600 hover:text-button mb-4">
            <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Daftar Jadwal
        </a>
    </div>
</x-app-main>
