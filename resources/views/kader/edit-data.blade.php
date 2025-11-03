<x-app-main title="Edit Data Peserta">
    <main>
        <div class="bg-white rounded-xl p-6 shadow-2xl w-full mx-auto">
            <h1 class="text-xl font-bold mb-4">Edit Data {{ ucwords(str_replace('_', ' ', $kategori)) }}</h1>

            <form action="{{ route('peserta.update', ['kategori' => $kategori, 'id' => $data->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="kategori" value="{{ $kategori }}">

                @if ($kategori === 'balita')
                    <div class="mb-4">
                        <label class="block text-gray-700">NIK Balita</label>
                        <input type="text" name="nik" value="{{ $data->nik }}"
                            class="w-full border rounded px-3 py-2 text-txt" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Nama Balita</label>
                        <input type="text" name="nama_balita" value="{{ $data->nama_balita }}"
                            class="w-full border rounded px-3 py-2 text-txt" required>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700">Usia Tahun</label>
                            <input type="number" name="usia_tahun" value="{{ $data->usia_tahun }}"
                                class="w-full border rounded px-3 py-2 text-txt" required>
                        </div>
                        <div>
                            <label class="block text-gray-700">Usia Bulan</label>
                            <input type="number" name="usia_bulan" value="{{ $data->usia_bulan }}"
                                class="w-full border rounded px-3 py-2 text-txt">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="w-full border rounded px-3 py-2 text-txt" required>
                            <option value="Laki-laki" {{ $data->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="Perempuan" {{ $data->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Alamat</label>
                        <textarea name="alamat" class="w-full border rounded px-3 py-2 text-txt" required>{{ $data->alamat }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Nama Orang Tua</label>
                        <input type="text" name="nama_orang_tua" value="{{ $data->nama_orang_tua }}"
                            class="w-full border rounded px-3 py-2 text-txt" required>
                    </div>
                @elseif($kategori === 'ibu_hamil')
                    <div class="mb-4">
                        <label class="block text-gray-700">NIK Ibu Hamil</label>
                        <input type="text" name="nik_ibu_hamil" value="{{ $data->nik_ibu_hamil }}"
                            class="w-full border rounded px-3 py-2 text-txt" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Nama Ibu Hamil</label>
                        <input type="text" name="nama_ibu_hamil" value="{{ $data->nama_ibu_hamil }}"
                            class="w-full border rounded px-3 py-2 text-txt" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Nama Suami</label>
                        <input type="text" name="nama_suami" value="{{ $data->nama_suami }}"
                            class="w-full border rounded px-3 py-2 text-txt" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Umur</label>
                        <input type="number" name="umur" value="{{ $data->umur }}"
                            class="w-full border rounded px-3 py-2 text-txt" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Alamat</label>
                        <textarea name="alamat_ibu_hamil" class="w-full border rounded px-3 py-2 text-txt" required>{{ $data->alamat_ibu_hamil }}</textarea>
                    </div>
                @endif

                <button type="submit" class="bg-posyanduu text-white px-4 py-2 rounded hover:bg-posyanduDark">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </main>
</x-app-main>
