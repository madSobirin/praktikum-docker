<x-app-main title="Jadwal">
    <div class="space-y-4 p-4 bg-white rounded-lg shadow-md">
        <h1 class="text-xl font-bold text-slate-800">Jadwal Mendatang</h1>

        @forelse ($jadwals as $jadwal)
            <div class="flex items-center p-4 border border-gray-200 rounded-lg mt-4">
                <div class="bg-posyanduu text-white rounded-lg w-12 h-12 flex flex-col items-center justify-center">
                    <span class="font-bold">
                        {{ \Carbon\Carbon::parse($jadwal->waktu_mulai)->translatedFormat('d') }}
                    </span>
                </div>

                <div class="ml-4 flex-1">
                    <h3 class="font-medium">{{ $jadwal->keterangan }}</h3>
                    <p class="text-sm text-gray-600">
                        {{ \Carbon\Carbon::parse($jadwal->waktu_mulai)->format('H:i') }} -
                        {{ \Carbon\Carbon::parse($jadwal->waktu_selesai)->format('H:i') }}
                        • {{ $jadwal->lokasi }}
                    </p>
                </div>

                <div class="flex space-x-2">
                    <a href="{{ route('pengguna.show', $jadwal->slug) }}"
                        class="text-posyanduu font-normal cursor-pointer hover:text-gray-400 text-sm">
                        Detail
                    </a>
                </div>
            </div>
        @empty
            <p class="text-gray-500 mt-4 text-center">Belum ada jadwal tersedia.</p>
        @endforelse
    </div>
</x-app-main>
