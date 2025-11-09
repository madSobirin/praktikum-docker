<x-app-main title="Laporan">
    <main x-data="laporanData()">
        <div class="mb-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800 flex items-center">
                        <i class="fas fa-file-pdf mr-3 text-posyanduu"></i>
                        Ekspor Data Balita dan Ibu Hamil ke PDF
                    </h1>
                    <p class="text-gray-600 mt-1">
                        Cari dan pilih data pengguna yang ingin diekspor
                    </p>
                </div>
                {{-- cara kembali ke halaman sebelumnya --}}
                <a href="{{ url()->previous() }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg flex items-center transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-white rounded-xl p-6 card-shadow h-fit">
                <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-search mr-3 text-posyanduu"></i>
                    Cari Balita / Ibu Hamil
                </h2>

                <div class="mb-6 relative">
                    <input type="text" x-model="query" x-on:input.debounce.500ms="search()"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-posyanduu focus:border-posyanduu transition-all"
                        placeholder="Ketik nama atau NIK..." />
                    <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>

                <div class="max-h-[500px] overflow-y-auto space-y-3 text-sm text-gray-800 scroll-smooth">
                    <div x-show="loading" class="text-gray-500 text-center py-4">
                        <i class="fas fa-spinner fa-spin mr-2"></i> Mencari data...
                    </div>

                    <div x-show="!loading && results.length === 0" class="text-gray-500 text-center py-4">
                        <span
                            x-text="query ? 'Data tidak ditemukan.' : 'Ketik nama atau NIK untuk mencari data.'"></span>
                    </div>

                    <template x-for="item in results" :key="item.tipe + item.id">
                        <div @click="showDetail(item)" class="p-4 rounded-lg cursor-pointer transition-all border"
                            :class="item.tipe === 'balita' ?
                                'bg-blue-50 border-blue-100 hover:bg-blue-100 text-blue-900' :
                                'bg-pink-50 border-pink-100 hover:bg-pink-100 text-pink-900'">
                            <div class="flex items-center">
                                <span class="text-xl mr-3">
                                    <i class="fas"
                                        :class="item.tipe === 'balita' ? 'fa-baby text-blue-500' : 'fa-female text-pink-500'"></i>
                                </span>
                                <div>
                                    <p class="font-semibold" x-text="item.nama"></p>
                                    <p class="text-xs opacity-75" x-text="'NIK: ' + item.nik"></p>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <div class="space-y-6 top-6 ">
                <div class="bg-white rounded-xl p-6 card-shadow min-h-[300px] flex flex-col">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-info-circle mr-3 text-posyanduu"></i>
                        Detail Data
                    </h2>

                    <div x-show="!selected" x-transition.opacity
                        class="flex-1 flex flex-col items-center justify-center text-gray-400 py-8">
                        <i class="fas fa-folder-open text-5xl mb-4 opacity-50"></i>
                        <p class="text-lg font-medium">Belum ada data dipilih</p>
                        <p class="text-sm">Pilih dari hasil pencarian di sebelah kiri</p>
                    </div>

                    <div x-show="selected && detail" x-transition class="space-y-4">
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                            <h3 class="font-bold text-posyanduu mb-3 border-b pb-2">Informasi Utama</h3>
                            <div class="grid grid-cols-2 gap-y-2 text-sm">
                                <span class="text-gray-600">Nama Lengkap</span>
                                <span class="font-medium text-gray-900" x-text="detail?.nama"></span>

                                <span class="text-gray-600">NIK</span>
                                <span class="font-medium text-gray-900 font-mono" x-text="detail?.nik"></span>

                                <template x-if="selected?.tipe === 'balita'">
                                    <div class="contents">
                                        <span class="text-gray-600">Jenis Kelamin</span>
                                        <span class="font-medium text-gray-900" x-text="detail?.jenis_kelamin"></span>
                                        <span class="text-gray-600">Tanggal Lahir</span>
                                        <span class="font-medium text-gray-900" x-text="detail?.tanggal_lahir"></span>
                                    </div>
                                </template>

                                <template x-if="selected?.tipe === 'ibu'">
                                    <div class="contents">
                                        <span class="text-gray-600">Nama Suami</span>
                                        <span class="font-medium text-gray-900" x-text="detail?.nama_suami"></span>
                                        <span class="text-gray-600">Umur</span>
                                        <span class="font-medium text-gray-900" x-text="detail?.umur + ' Tahun'"></span>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <div x-show="pemeriksaan" class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                            <h3 class="font-bold text-posyanduu mb-3 border-b pb-2">Pemeriksaan Terakhir</h3>
                            <div class="grid grid-cols-2 gap-y-2 text-sm">
                                <span class="text-gray-600">Tanggal</span>
                                <span class="font-medium text-gray-900" x-text="pemeriksaan?.tanggal"></span>

                                <span class="text-gray-600">Berat Badan</span>
                                <span class="font-medium text-gray-900"
                                    x-text="(pemeriksaan?.berat_badan || '-') + ' kg'"></span>

                                <template x-if="selected?.tipe === 'balita'">
                                    <div class="contents">
                                        <span class="text-gray-600">Tinggi Badan</span>
                                        <span class="font-medium text-gray-900"
                                            x-text="(pemeriksaan?.tinggi_badan || '-') + ' cm'"></span>

                                        <span class="text-gray-600">Status Gizi</span>
                                        <span class="font-medium"
                                            :class="{
                                                'text-green-600': pemeriksaan?.status_gizi === 'Gizi Baik',
                                                'text-orange-600': pemeriksaan?.status_gizi === 'Gizi Buruk',
                                                'text-red-600': pemeriksaan?.status_gizi === 'Stunting'
                                            }"
                                            x-text="pemeriksaan?.status_gizi || '-'">
                                        </span>
                                    </div>
                                </template>


                                <template x-if="selected?.tipe === 'ibu'">
                                    <div class="contents">
                                        <span class="text-gray-600">Tekanan Darah</span>
                                        <span class="font-medium text-gray-900"
                                            x-text="pemeriksaan?.tekanan_darah || '-'"></span>
                                        <span class="text-gray-600">Status Kesehatan</span>
                                        <span class="font-medium"
                                            :class="{
                                                'text-green-600': pemeriksaan?.status_ibu === 'Kondisi Baik',
                                                'text-red-600': pemeriksaan?.status_ibu === 'Anemia',
                                            }"
                                            x-text="pemeriksaan?.status_ibu || '-'"></span>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-6 card-shadow grid grid-cols-2 gap-4">
                    <button @click="exportPdf" :disabled="!selected"
                        class="flex items-center justify-center py-3 px-4 rounded-lg font-medium text-white transition-all bg-posyanduu hover:bg-posyanduDark disabled:opacity-50 disabled:cursor-not-allowed">
                        <i class="fas fa-file-pdf mr-2"></i> Ekspor PDF
                    </button>
                    <button @click="printData" :disabled="!selected"
                        class="flex items-center justify-center py-3 px-4 rounded-lg font-medium text-white transition-all bg-green-500 hover:bg-green-600 disabled:opacity-50 disabled:cursor-not-allowed">
                        <i class="fas fa-print mr-2"></i> Cetak
                    </button>
                </div>
            </div>
        </div>
    </main>

    <script>
        function laporanData() {
            return {
                query: '',
                results: [],
                selected: null,
                detail: null,
                pemeriksaan: null,
                loading: false,

                async search() {
                    if (!this.query.trim()) {
                        this.results = [];
                        return;
                    }

                    this.loading = true;
                    try {
                        const res = await fetch(`/laporan/search?q=${encodeURIComponent(this.query)}`);
                        const data = await res.json();
                        this.results = [
                            ...(data.balita || []).map(b => ({
                                ...b,
                                tipe: 'balita'
                            })),
                            ...(data.ibu || []).map(i => ({
                                ...i,
                                tipe: 'ibu'
                            }))
                        ];
                    } catch (error) {
                        console.error("Search error:", error);
                        this.results = [];
                    } finally {
                        this.loading = false;
                    }
                },

                async showDetail(item) {
                    if (this.selected?.id === item.id && this.selected?.tipe === item.tipe) return;

                    this.selected = item;
                    this.detail = null;
                    this.pemeriksaan = null;

                    try {
                        const res = await fetch(`/laporan/${item.tipe}/${item.id}`);
                        const data = await res.json();
                        this.detail = data.data;
                        this.pemeriksaan = data.pemeriksaan;
                    } catch (error) {
                        console.error("Fetch detail error:", error);
                        alert('Gagal mengambil detail data.');
                    }
                },

                exportPdf() {
                    if (!this.selected) return;
                    alert(`Mengekspor ${this.selected.tipe.toUpperCase()} - ID: ${this.selected.id}`);
                },

                printData() {
                    if (!this.selected) return;
                    window.print();
                }
            };
        }
    </script>
</x-app-main>
