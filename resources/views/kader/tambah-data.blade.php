<x-app-main title="Tambah Data Peserta">
    <main class="ml-2 md:ml-2">
        <!-- Header -->
        <div class="mb-6 flex justify-between items-center">
            <div>

                <h1 class="text-2xl font-bold text-gray-800"><i class="fas fa-plus-circle mr-3 text-posyanduu"></i>Tambah
                    Data Peserta</h1>

                <p class="text-gray-600"> <i class="fas fa-info-circle mr-2 text-posyanduu"></i>Pilih kategori dan isi
                    form
                    sesuai jenis data peserta</p>
            </div>
            <div class="flex space-x-2">
                <a href="{{ url('/data') }}"
                    class="bg-gray-100 hover:bg-gray-200 transition-colors duration-200 text-gray-700 px-4 py-2 rounded-lg flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
            </div>
        </div>

        <!-- Card Form -->
        <div class="bg-white rounded-xl shadow-md p-6 md:p-8">
            <form action="{{ route('peserta.store') }}" method="POST" class="space-y-8">
                @csrf
                <input type="hidden" id="kategori_hidden" name="kategori">
                <!-- Pilih Kategori -->
                <div>
                    <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">
                        Kategori Data <span class="text-red-500">*</span>
                    </label>
                    <select id="kategori" name="kategori"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-button focus:border-transparent"
                        required>
                        <option value="" selected>-- Pilih Kategori --</option>
                        <option value="balita" {{ old('kategori') == 'balita' ? 'selected' : '' }}>Balita</option>
                        <option value="ibu_hamil" {{ old('kategori') == 'ibu_hamil' ? 'selected' : '' }}>Ibu Hamil
                        </option>
                    </select>

                </div>

                <!-- Form Balita -->
                <div id="form-balita" class="hidden space-y-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Kolom Kiri -->
                        <div class="space-y-6">
                            <!-- NIK -->
                            <div>
                                <label for="nik" class="block text-sm font-medium text-gray-700 mb-2">
                                    NIK Balita <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="nik" name="nik" value="{{ old('nik') }}" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-button focus:border-transparent"
                                    placeholder="Masukkan NIK balita">
                                @error('nik')
                                    <p class="text-red-500 text-sm mt-1">nik sudah terpakai</p>
                                @enderror
                            </div>

                            <!-- Nama Balita -->
                            <div>
                                <label for="nama_balita" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nama Balita <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="nama_balita" name="nama_balita"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-button focus:border-transparent"
                                    placeholder="Masukkan nama lengkap balita" required>
                            </div>

                            <!-- Usia -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Usia <span class="text-red-500">*</span>
                                </label>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="tahun" class="block text-xs text-gray-500 mb-1">Tahun</label>
                                        <input type="number" id="usia_tahun" name="usia_tahun" min="0"
                                            max="5"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-button focus:border-transparent"
                                            placeholder="0" required>
                                    </div>
                                    <div>
                                        <label for="usia_bulan" class="block text-xs text-gray-500 mb-1">Bulan</label>
                                        <input type="number" id="usia_bulan" name="usia_bulan" min="0"
                                            max="11"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-button focus:border-transparent"
                                            placeholder="0" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="space-y-6">
                            <!-- Jenis Kelamin -->
                            <div>
                                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 mb-2">
                                    Jenis Kelamin <span class="text-red-500">*</span>
                                </label>
                                <select id="jenis_kelamin" name="jenis_kelamin" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-button focus:border-transparent">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <!-- Alamat -->
                            <div>
                                <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">
                                    Alamat <span class="text-red-500">*</span>
                                </label>
                                <textarea id="alamat" name="alamat" rows="3"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-button focus:border-transparent"
                                    placeholder="Masukkan alamat lengkap" required></textarea>
                            </div>

                            <!-- Nama Orang Tua -->
                            <div>
                                <label for="nama_orang_tua" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nama Orang Tua <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="nama_orang_tua" name="nama_orang_tua"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-button focus:border-transparent"
                                    placeholder="Masukkan nama orang tua" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Ibu Hamil -->
                <div id="form-ibu-hamil" class="hidden space-y-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Kolom Kiri -->
                        <div class="space-y-6">
                            <!-- NIK -->
                            <div>
                                <label for="nik_ibu_hamil" class="block text-sm font-medium text-gray-700 mb-2">
                                    NIK Ibu Hamil <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="nik_ibu_hamil" name="nik_ibu_hamil"
                                    value="{{ old('nik_ibu_hamil') }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-button focus:border-transparent"
                                    placeholder="Masukkan NIK ibu hamil" required>
                                @error('nik_ibu_hamil')
                                    <p class="text-red-500 text-sm mt-1">nik sudah terpakai</p>
                                @enderror
                            </div>

                            <!-- Nama Ibu Hamil -->
                            <div>
                                <label for="nama_ibu_hamil" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nama Ibu Hamil <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="nama_ibu_hamil" name="nama_ibu_hamil"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-button focus:border-transparent"
                                    placeholder="Masukkan nama ibu hamil" required>
                            </div>

                            <!-- Nama Suami -->
                            <div>
                                <label for="nama_suami" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nama Suami <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="nama_suami" name="nama_suami"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-button focus:border-transparent"
                                    placeholder="Masukkan nama suami" required>
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="space-y-6">
                            <!-- Umur -->
                            <div>
                                <label for="umur" class="block text-sm font-medium text-gray-700 mb-2">
                                    Umur <span class="text-red-500">*</span>
                                </label>
                                <input type="number" id="umur" name="umur" min="15" max="60"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-button focus:border-transparent"
                                    placeholder="Masukkan umur ibu hamil" required>
                            </div>

                            <!-- Alamat -->
                            <div>
                                <label for="alamat_ibu_hamil" class="block text-sm font-medium text-gray-700 mb-2">
                                    Alamat <span class="text-red-500">*</span>
                                </label>
                                <textarea id="alamat_ibu_hamil" name="alamat_ibu_hamil" rows="3"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-button focus:border-transparent"
                                    placeholder="Masukkan alamat lengkap" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="pt-6 border-t flex flex-col sm:flex-row gap-4 justify-end">
                    <a href="{{ url('/data') }}"
                        class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition duration-200 text-center">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-6 py-2 bg-button hover:bg-buttonhover transition-colors duration-200 text-white rounded-lg flex items-center justify-center">
                        <i class="fas fa-save mr-2"></i> Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </main>
</x-app-main>
