<x-app-main title="Laporan">
    <main x-data="laporanData">
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
                            <div class="flex-shrink-0 text-right">
                                <span class="text-xs font-medium text-right"
                                    :class="item.status_pemeriksaan === 'Belum terperiksa' ? 'text-red-600' :
                                        'text-green-600'"
                                    x-text="item.status_pemeriksaan"></span>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <div class="space-y-6 top-6 " id="detail-container">
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
        document.addEventListener('alpine:init', () => {
            Alpine.data('laporanData', () => ({
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
                        const res = await fetch(
                            `/laporan/search?q=${encodeURIComponent(this.query)}`);
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
                    const url = `/laporan/pdf/${this.selected.tipe}/${this.selected.id}`;
                    const win = window.open(url, '_blank');
                    if (!win) alert('Silakan izinkan pop-up untuk menampilkan PDF.');
                },
                printData() {
                    if (!this.selected) {
                        alert('Silakan pilih data terlebih dahulu.');
                        return;
                    }

                    // 1. Definisikan Style CSS untuk Halaman Cetak
                    const cssStyles = `
        <style>
            @media print {
                @page {
                    size: A4;
                    margin: 1in;
                }
            }
            body {
                font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
                margin: 0;
                padding: 20px;
                color: #333;
                line-height: 1.6;
            }
            .header {
                text-align: center;
                border-bottom: 2px solid #f0f0f0;
                padding-bottom: 15px;
                margin-bottom: 25px;
            }
            .header h1 {
                margin: 0;
                color: #70b2b2; /* Warna Posyandu Anda */
                font-size: 24px;
            }
            .header p {
                margin: 5px 0 0;
                font-size: 14px;
                color: #555;
            }
            h2 {
                font-size: 18px;
                font-weight: 600;
                background-color: #f9f9f9;
                padding: 10px;
                border-left: 4px solid #70b2b2;
                margin-top: 30px;
                margin-bottom: 15px;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                font-size: 14px;
            }
            table td {
                padding: 10px 8px;
                border: 1px solid #e0e0e0;
                vertical-align: top;
            }
            table td.label {
                font-weight: 600;
                width: 35%;
                background-color: #fafafa;
                color: #444;
            }
            .no-data {
                text-align: center;
                color: #888;
                font-style: italic;
                padding: 20px;
            }
            .footer {
                text-align: right;
                margin-top: 50px;
                font-size: 12px;
                color: #777;
            }
        </style>
    `;

                    // 2. Buat HTML dari Data (Bukan dari Elemen DOM)
                    let contentHtml = `
        <div class="header">
            <h1>Laporan Data Posyandu</h1>
            <p>Data Peserta - ${this.selected.tipe === 'balita' ? 'Balita' : 'Ibu Hamil'}</p>
        </div>
    `;

                    // --- Bagian Data Diri ---
                    if (this.selected.tipe === 'balita') {
                        contentHtml += `
            <h2>Data Diri Balita</h2>
            <table>
                <tr><td class="label">Nama Lengkap</td><td>${this.detail.nama || '-'}</td></tr>
                <tr><td class="label">NIK</td><td>${this.detail.nik || '-'}</td></tr>
                <tr><td class="label">Jenis Kelamin</td><td>${this.detail.jenis_kelamin || '-'}</td></tr>
                <tr><td class="label">Tanggal Lahir</td><td>${this.detail.tanggal_lahir || '-'}</td></tr>
            </table>
        `;
                    } else {
                        contentHtml += `
            <h2>Data Diri Ibu Hamil</h2>
            <table>
                <tr><td class="label">Nama Lengkap</td><td>${this.detail.nama || '-'}</td></tr>
                <tr><td class="label">NIK</td><td>${this.detail.nik || '-'}</td></tr>
                <tr><td class="label">Nama Suami</td><td>${this.detail.nama_suami || '-'}</td></tr>
                <tr><td class="label">Umur</td><td>${this.detail.umur ? this.detail.umur + ' Tahun' : '-'}</td></tr>
            </table>
        `;
                    }

                    // --- Bagian Pemeriksaan ---
                    contentHtml += `<h2>Pemeriksaan Terakhir</h2>`;
                    if (this.pemeriksaan) {
                        if (this.selected.tipe === 'balita') {
                            contentHtml += `
                <table>
                    <tr><td class="label">Tanggal Pemeriksaan</td><td>${this.pemeriksaan.tanggal || '-'}</td></tr>
                    <tr><td class="label">Berat Badan</td><td>${this.pemeriksaan.berat_badan ? this.pemeriksaan.berat_badan + ' kg' : '-'}</td></tr>
                    <tr><td class="label">Tinggi Badan</td><td>${this.pemeriksaan.tinggi_badan ? this.pemeriksaan.tinggi_badan + ' cm' : '-'}</td></tr>
                    <tr><td class="label">Status Gizi</td><td><strong>${this.pemeriksaan.status_gizi || '-'}</strong></td></tr>
                </table>
            `;
                        } else {
                            contentHtml += `
                <table>
                    <tr><td class="label">Tanggal Pemeriksaan</td><td>${this.pemeriksaan.tanggal || '-'}</td></tr>
                    <tr><td class="label">Berat Badan</td><td>${this.pemeriksaan.berat_badan ? this.pemeriksaan.berat_badan + ' kg' : '-'}</td></tr>
                    <tr><td class="label">Tekanan Darah</td><td>${this.pemeriksaan.tekanan_darah || '-'}</td></tr>
                    <tr><td class="label">Status Kesehatan</td><td><strong>${this.pemeriksaan.status_ibu || '-'}</strong></td></tr>
                </table>
            `;
                        }
                    } else {
                        contentHtml +=
                        `<div class="no-data">Belum ada data pemeriksaan terakhir.</div>`;
                    }

                    // --- Footer ---
                    contentHtml += `
        <div class="footer">
            Dicetak pada: ${new Date().toLocaleString('id-ID')}
        </div>
    `;

                    // 3. Buka Jendela Cetak, Tulis HTML & CSS, lalu Cetak
                    const printWindow = window.open('', '_blank', 'width=800,height=600');

                    printWindow.document.write(`
        <html>
            <head>
                <title>Cetak Laporan - ${this.detail.nama}</title>
                ${cssStyles}
            </head>
            <body>
                ${contentHtml}
            </body>
        </html>
    `);

                    printWindow.document.close(); // Selesaikan penulisan dokumen
                    printWindow.focus(); // Fokus ke jendela baru

                    // Tunggu gambar dan style dimuat (penting)
                    printWindow.onload = function() {
                        printWindow.print(); // Buka dialog cetak
                        printWindow.close(); // Tutup jendela setelah dicetak
                    };
                }
            }));
        });
    </script>
</x-app-main>
