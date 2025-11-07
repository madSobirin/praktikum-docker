<x-app-main title="Tambah Pemeriksaan">
    <main class="ml-2 md:ml-2">
        <!-- Header -->
        <div class="mb-6 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800"><i class="fas fa-plus-circle mr-3 text-posyanduu"></i>Tambah
                    Pemeriksaan</h1>
                <p class="text-gray-600"><i class="fas fa-info-circle mr-2 text-posyanduu"></i>Pilih tipe peserta dan isi
                    form sesuai jenis pemeriksaan</p>
            </div>
            <div class="flex space-x-2">
                <a href="{{ url('/pemeriksaan') }}"
                    class="bg-gray-100 hover:bg-gray-200 transition-colors duration-200 text-gray-700 px-4 py-2 rounded-lg flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
            </div>
        </div>

        <!-- Card Form -->
        <div class="bg-white rounded-xl shadow-md p-6 md:p-8">
            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-2 rounded mb-4">{{ session('success') }}</div>
            @endif

            <form action="{{ route('pemeriksaan.store') }}" method="POST" class="space-y-8">
                @csrf

                <!-- Pilih Tipe -->
                <div>
                    <label for="tipe" class="block text-sm font-medium text-gray-700 mb-2">
                        Tipe Peserta <span class="text-red-500">*</span>
                    </label>
                    <select name="tipe" id="tipe"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-button focus:border-transparent"
                        required>
                        <option value="">-- Pilih Tipe --</option>
                        <option value="balita">Balita</option>
                        <option value="ibu_hamil">Ibu Hamil</option>
                    </select>
                </div>

                <!-- Cari Peserta -->
                <div>
                    <label for="search-peserta" class="block text-sm font-medium text-gray-700 mb-2">
                        Cari Peserta (Nama/NIK) <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="search-peserta"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-button focus:border-transparent"
                        placeholder="Cari peserta...">
                    <input type="hidden" name="peserta_id" id="peserta_id">
                    <div id="search-results" class="border rounded mt-1 max-h-40 overflow-y-auto"></div>
                </div>

                <!-- Tanggal Pemeriksaan -->
                <div>
                    <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-2">
                        Tanggal & Jam Pemeriksaan <span class="text-red-500">*</span>
                    </label>
                    <input type="datetime-local" name="tanggal"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-button focus:border-transparent"
                        required>
                </div>


                <!-- Input Dinamis -->
                <div id="input-balita" class="hidden space-y-6">
                    <div>
                        <label for="berat_badan_balita" class="block text-sm font-medium text-gray-700 mb-2">Berat Badan
                            (kg)</label>
                        <input type="number" step="1" min="0" name="berat_badan_balita"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-button focus:border-transparent">
                    </div>
                    <div>
                        <label for="tinggi_badan" class="block text-sm font-medium text-gray-700 mb-2">Tinggi Badan
                            (cm)</label>
                        <input type="number" step="1" min="0" name="tinggi_badan"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-button focus:border-transparent">
                    </div>
                    <div>
                        <label for="status_gizi" class="block text-sm font-medium text-gray-700 mb-2">Status
                            Gizi</label>
                        <select name="status_gizi"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-button focus:border-transparent">
                            <option value="">-- Pilih Status --</option>
                            <option value="Gizi Baik">Gizi Baik</option>
                            <option value="Gizi Buruk">Gizi Buruk</option>
                            <option value="Stunting">Stunting</option>
                        </select>
                    </div>
                </div>

                <div id="input-ibu" class="hidden space-y-6">
                    <div>
                        <label for="berat_badan_ibu" class="block text-sm font-medium text-gray-700 mb-2">Berat Badan
                            (kg)</label>
                        <input type="number" step="1" min="0" name="berat_badan_ibu"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-button focus:border-transparent">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="tekanan_sistolik" class="block text-sm font-medium text-gray-700 mb-2">
                                Tekanan Darah (Sistolik)
                            </label>
                            <input type="number" name="tekanan_sistolik" step="1" min="0"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-button focus:border-transparent"
                                placeholder="120">
                        </div>
                        <div>
                            <label for="tekanan_diastolik" class="block text-sm font-medium text-gray-700 mb-2">
                                Tekanan Darah (Diastolik)
                            </label>
                            <input type="number" name="tekanan_diastolik" step="1" min="0"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-button focus:border-transparent"
                                placeholder="80">
                        </div>
                    </div>
                    <div>
                        <label for="usia_kehamilan" class="block text-sm font-medium text-gray-700 mb-2">Usia Kehamilan
                            (minggu)</label>
                        <input type="number" name="usia_kehamilan"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-button focus:border-transparent">
                    </div>
                    <div>
                        <label for="status_ibu" class="block text-sm font-medium text-gray-700 mb-2">Status Ibu</label>
                        <select name="status_ibu"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-button focus:border-transparent">
                            <option value="">-- Pilih Status --</option>
                            <option value="Kondisi Baik">Kondisi Baik</option>
                            <option value="Anemia">Anemia</option>
                        </select>
                    </div>
                </div>

                <!-- Tombol -->
                <div class="pt-6 border-t flex flex-col sm:flex-row gap-4 justify-end">
                    <a href="{{ url('/pemeriksaan') }}"
                        class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition duration-200 text-center">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-6 py-2 bg-button hover:bg-buttonhover transition-colors duration-200 text-white rounded-lg flex items-center justify-center">
                        <i class="fas fa-save mr-2"></i> Simpan Pemeriksaan
                    </button>
                </div>
            </form>
        </div>
    </main>

    <script>
        // Tampilkan input sesuai tipe
        const tipe = document.getElementById('tipe');
        const inputBalita = document.getElementById('input-balita');
        const inputIbu = document.getElementById('input-ibu');

        tipe.addEventListener('change', function() {
            if (this.value === 'balita') {
                inputBalita.classList.remove('hidden');
                inputIbu.classList.add('hidden');
            } else if (this.value === 'ibu_hamil') {
                inputIbu.classList.remove('hidden');
                inputBalita.classList.add('hidden');
            } else {
                inputBalita.classList.add('hidden');
                inputIbu.classList.add('hidden');
            }
        });

        // AJAX search peserta
        const searchInput = document.getElementById('search-peserta');
        const resultsDiv = document.getElementById('search-results');
        const pesertaIdInput = document.getElementById('peserta_id');

        searchInput.addEventListener('keyup', function() {
            const query = this.value;
            if (query.length < 2) {
                resultsDiv.innerHTML = '';
                return;
            }

            fetch(`/pemeriksaan/search?q=${query}`)
                .then(res => res.json())
                .then(data => {
                    resultsDiv.innerHTML = '';
                    if (data.message) {
                        resultsDiv.innerHTML = `<div class="p-2 text-red-600">${data.message}</div>`;
                    } else {
                        data.forEach(item => {
                            const div = document.createElement('div');
                            div.classList.add('p-2', 'cursor-pointer', 'hover:bg-gray-200');
                            div.textContent = `${item.nama} | NIK: ${item.nik}`;
                            div.addEventListener('click', () => {
                                pesertaIdInput.value = item.id;
                                searchInput.value = item.nama;
                                resultsDiv.innerHTML = '';
                            });
                            resultsDiv.appendChild(div);
                        });
                    }
                });
        });
    </script>
</x-app-main>
