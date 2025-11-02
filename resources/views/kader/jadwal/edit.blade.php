<x-app-main title="Edit Jadwal">
    <div class="max-w-full  bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-semibold mb-4 text-posyanduu">Edit Jadwal Posyandu</h2>

        <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Keterangan</label>
                <input type="text" name="keterangan" placeholder="{{ old('keterangan', $jadwal->keterangan) }}" required
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-posyanduu ">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Lokasi</label>
                <input type="text" name="lokasi" placeholder="{{ old('lokasi', $jadwal->lokasi) }}" required
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-posyanduu">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Waktu Mulai</label>
                <input type="datetime-local" name="waktu_mulai"
                    value="{{ old('waktu_mulai', \Carbon\Carbon::parse($jadwal->waktu_mulai)->format('Y-m-d\TH:i')) }}"
                    required
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-posyanduu">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Waktu Selesai</label>
                <input type="datetime-local" name="waktu_selesai"
                    value="{{ old('waktu_selesai', \Carbon\Carbon::parse($jadwal->waktu_selesai)->format('Y-m-d\TH:i')) }}"
                    required
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-posyanduu">
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('pemeriksaan.index') }}"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded-lg">
                    Batal
                </a>
                <button type="submit" class="bg-posyanduu hover:bg-posyanduDark text-white py-2 px-4 rounded-lg">
                    Update
                </button>
            </div>
        </form>
    </div>
</x-app-main>
