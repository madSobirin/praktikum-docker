<x-app-main title="Create Jadwal">
    <div class="max-w-full mx-auto bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">Tambah Jadwal Posyandu</h2>

        <form action="{{ route('jadwal.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Keterangan</label>
                <select name="keterangan" required
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-posyanduu">
                    <option value="">-- Pilih Keterangan --</option>
                    <option value="Pemeriksaan Balita"
                        {{ old('keterangan') == 'Pemeriksaan Balita' ? 'selected' : '' }}>Pemeriksaan Balita</option>
                    <option value="Pemeriksaan Ibu Hamil"
                        {{ old('keterangan') == 'Pemeriksaan Ibu Hamil' ? 'selected' : '' }}>Pemeriksaan Ibu Hamil
                    </option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Lokasi</label>
                <input type="text" name="lokasi" value="{{ old('lokasi') }}" required
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-posyanduu">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Waktu Mulai</label>
                <input type="datetime-local" name="waktu_mulai" value="{{ old('waktu_mulai') }}" required
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-posyanduu">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Waktu Selesai</label>
                <input type="datetime-local" name="waktu_selesai" value="{{ old('waktu_selesai') }}" required
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-posyanduu">
                @error('waktu_selesai')
                    <p class="text-red-500 text-sm mt-1 italic">Waktu selesai harus lebih besar dari waktu mulai!</p>
                @enderror

            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('pemeriksaan.index') }}"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded-lg">
                    Batal
                </a>
                <button type="submit" class="bg-posyanduu hover:bg-posyanduDark text-white py-2 px-4 rounded-lg">
                    Simpan
                </button>
            </div>
        </form>
    </div>

</x-app-main>
