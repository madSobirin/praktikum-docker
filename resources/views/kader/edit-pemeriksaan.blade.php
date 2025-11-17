<x-app-main title="Edit Pemeriksaan">
    <main class="min-h-screen w-full bg-slate-50/50 p-4 md:p-6 lg:p-8 z-0">

        <div class="mb-6">
            <a href="{{ route('pemeriksaan.index') }}"
                class="inline-flex items-center text-sm text-slate-500 hover:text-blue-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Riwayat
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-lg border border-slate-100 overflow-hidden w-full">

            <div class="relative bg-gradient-to-r bg-posyanduu px-6 py-8 md:px-10">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 rounded-full bg-white opacity-10 blur-xl">
                </div>
                <div class="absolute bottom-0 left-0 -mb-4 -ml-4 w-24 h-24 rounded-full bg-white opacity-10 blur-xl">
                </div>

                <div class="relative flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-3 mb-2">
                            <span
                                class="bg-white/20 backdrop-blur-sm text-white text-xs font-mono px-2.5 py-0.5 rounded border border-white/10">
                                ID: #{{ $pemeriksaan->id }}
                            </span>
                        </div>
                        <h1 class="text-3xl font-bold text-white tracking-tight">
                            Edit Data Pemeriksaan
                        </h1>
                        <p class="text-blue-50 mt-2 text-sm md:text-base">
                            Perbarui hasil pengukuran dan pemeriksaan kesehatan.
                        </p>
                    </div>

                    <div class="hidden md:block opacity-90">
                        <div class="bg-white/10 backdrop-blur-md p-3 rounded-xl border border-white/20 shadow-inner">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-6 md:p-10 bg-white">
                <form action="{{ route('pemeriksaan.update', $pemeriksaan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-8 border-b border-slate-100 pb-6">
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Tanggal & Waktu
                            Pemeriksaan</label>
                        <div class="relative max-w-md">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input type="datetime-local" name="tanggal" value="{{ $pemeriksaan->tanggal }}"
                                class="pl-10 w-full rounded-lg border-slate-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all shadow-sm py-2.5">
                        </div>
                    </div>

                    @if ($pemeriksaan->balita)
                        <div class="bg-blue-50/50 rounded-2xl p-6 border border-blue-100 mb-8">
                            <div class="flex items-center gap-2 mb-6 text-blue-800 border-b border-blue-100 pb-2">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                                <h3 class="text-lg font-bold">Data Pemeriksaan Balita</h3>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-8 gap-y-6">
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Berat Badan
                                        (kg)</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                            </svg>
                                        </div>
                                        <input type="number" name="berat_badan_balita"
                                            value="{{ $pemeriksaan->berat_badan_balita }}" step="0.1"
                                            class="pl-10 w-full rounded-lg border-slate-300 focus:ring-blue-500 focus:border-blue-500 shadow-sm py-2.5">
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Tinggi Badan
                                        (cm)</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                            </svg>
                                        </div>
                                        <input type="number" name="tinggi_badan"
                                            value="{{ $pemeriksaan->tinggi_badan }}" step="0.1"
                                            class="pl-10 w-full rounded-lg border-slate-300 focus:ring-blue-500 focus:border-blue-500 shadow-sm py-2.5">
                                    </div>
                                </div>

                                <div class="lg:col-span-2">
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Status Gizi</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                            </svg>
                                        </div>
                                        <select name="status_gizi"
                                            class="pl-10 w-full rounded-lg border-slate-300 focus:ring-blue-500 focus:border-blue-500 shadow-sm py-2.5 cursor-pointer">
                                            <option value="">-- Pilih Status Gizi --</option>
                                            <option value="Gizi Baik"
                                                {{ $pemeriksaan->status_gizi == 'Gizi Baik' ? 'selected' : '' }}>Gizi
                                                Baik</option>
                                            <option value="Gizi Buruk"
                                                {{ $pemeriksaan->status_gizi == 'Gizi Buruk' ? 'selected' : '' }}>Gizi
                                                Buruk</option>
                                            <option value="Stunting"
                                                {{ $pemeriksaan->status_gizi == 'Stunting' ? 'selected' : '' }}>Stunting
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($pemeriksaan->ibu_hamil)
                        <div class="bg-pink-50/50 rounded-2xl p-6 border border-pink-100 mb-8">
                            <div class="flex items-center gap-2 mb-6 text-pink-800 border-b border-pink-100 pb-2">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <h3 class="text-lg font-bold">Data Pemeriksaan Ibu Hamil</h3>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-8 gap-y-6">
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Berat Badan
                                        (kg)</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                            </svg>
                                        </div>
                                        <input type="number" name="berat_badan_ibu"
                                            value="{{ $pemeriksaan->berat_badan_ibu }}" step="0.1"
                                            class="pl-10 w-full rounded-lg border-slate-300 focus:ring-pink-500 focus:border-pink-500 shadow-sm py-2.5">
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Usia Kehamilan
                                        (minggu)</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <input type="number" name="usia_kehamilan"
                                            value="{{ $pemeriksaan->usia_kehamilan }}"
                                            class="pl-10 w-full rounded-lg border-slate-300 focus:ring-pink-500 focus:border-pink-500 shadow-sm py-2.5">
                                    </div>
                                </div>

                                <div class="lg:col-span-2">
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Tekanan Darah
                                        (mmHg)</label>
                                    <div class="flex items-start gap-4">
                                        <div class="flex-1">
                                            <div class="relative">
                                                <div
                                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <svg class="h-5 w-5 text-slate-400" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                    </svg>
                                                </div>
                                                <input type="number" name="tekanan_sistolik"
                                                    value="{{ $pemeriksaan->tekanan_sistolik }}" placeholder="120"
                                                    class="pl-10 w-full rounded-lg border-slate-300 focus:ring-pink-500 focus:border-pink-500 shadow-sm py-2.5">
                                            </div>
                                            <span class="text-xs text-slate-500 mt-1 ml-1">Sistolik (Atas)</span>
                                        </div>
                                        <div class="py-2 text-slate-400 text-xl font-light">/</div>
                                        <div class="flex-1">
                                            <div class="relative">
                                                <div
                                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <svg class="h-5 w-5 text-slate-400" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                    </svg>
                                                </div>
                                                <input type="number" name="tekanan_diastolik"
                                                    value="{{ $pemeriksaan->tekanan_diastolik }}" placeholder="80"
                                                    class="pl-10 w-full rounded-lg border-slate-300 focus:ring-pink-500 focus:border-pink-500 shadow-sm py-2.5">
                                            </div>
                                            <span class="text-xs text-slate-500 mt-1 ml-1">Diastolik (Bawah)</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="lg:col-span-2">
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Status Kesehatan
                                        Ibu</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <select name="status_ibu"
                                            class="pl-10 w-full rounded-lg border-slate-300 focus:ring-pink-500 focus:border-pink-500 shadow-sm py-2.5 cursor-pointer">
                                            <option value="">-- Pilih Status --</option>
                                            <option value="Kondisi Baik"
                                                {{ $pemeriksaan->status_ibu == 'Kondisi Baik' ? 'selected' : '' }}>
                                                Kondisi Baik</option>
                                            <option value="Anemia"
                                                {{ $pemeriksaan->status_ibu == 'Anemia' ? 'selected' : '' }}>Anemia
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div
                        class="mt-8 pt-6 border-t border-slate-100 flex flex-col-reverse sm:flex-row justify-end gap-3">
                        <a href="{{ route('pemeriksaan.index') }}"
                            class="inline-flex justify-center items-center px-6 py-3 border border-slate-300 shadow-sm text-sm font-medium rounded-lg text-slate-700 bg-white hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500 transition-all">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Batal
                        </a>
                        <button type="submit"
                            class="inline-flex justify-center items-center px-6 py-3 border border-transparent shadow-md text-sm font-medium rounded-lg text-white bg-gradient-to-r bg-posyanduu hover:brightness-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all transform hover:-translate-y-0.5">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4">
                                </path>
                            </svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-app-main>
