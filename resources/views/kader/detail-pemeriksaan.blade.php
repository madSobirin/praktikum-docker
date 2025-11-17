<x-app-main title="Detail Pemeriksaan">
    <main class="min-h-screen w-full bg-slate-50/50 p-4 md:p-6 lg:p-8">

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
                        <div class="flex items-center gap-2 mb-2">
                            <span
                                class="bg-white/20 backdrop-blur-sm text-white text-xs font-mono px-3 py-1 rounded-full border border-white/10 tracking-wider uppercase">
                                #REKAP-{{ $pemeriksaan->id }}
                            </span>
                            <span
                                class="bg-white/20 backdrop-blur-sm text-white text-xs font-bold px-3 py-1 rounded-full border border-white/10 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ \Carbon\Carbon::parse($pemeriksaan->tanggal)->format('d F Y') }}
                            </span>
                        </div>
                        <h1 class="text-3xl font-bold text-white tracking-tight">
                            Detail Hasil Pemeriksaan
                        </h1>
                        <p class="text-blue-50 mt-2 text-sm md:text-base">
                            @if ($pemeriksaan->balita)
                                Data tumbuh kembang anak.
                            @elseif($pemeriksaan->ibu_hamil)
                                Data kesehatan ibu dan janin.
                            @endif
                        </p>
                    </div>

                    <div class="hidden md:block opacity-90">
                        <div class="bg-white/10 backdrop-blur-md p-3 rounded-xl border border-white/20 shadow-inner">
                            @if ($pemeriksaan->balita)
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            @elseif($pemeriksaan->ibu_hamil)
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-6 md:p-10">

                @if ($pemeriksaan->balita)
                    <div class="border-l-4 border-blue-500 pl-6 mb-8">
                        <h2 class="text-xl font-bold text-slate-800">Informasi Peserta</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <div>
                                <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">Nama
                                    Balita</label>
                                <p class="text-lg font-semibold text-blue-700">{{ $pemeriksaan->balita->nama_balita }}
                                </p>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">NIK</label>
                                <p class="text-lg font-semibold text-slate-700">{{ $pemeriksaan->balita->nik }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
                        <div
                            class="bg-blue-50 rounded-2xl p-5 border border-blue-100 flex flex-col items-center justify-center text-center">
                            <div class="bg-white p-3 rounded-full shadow-sm mb-3 text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                </svg>
                            </div>
                            <span class="text-sm text-blue-600 font-medium mb-1">Berat Badan</span>
                            <span class="text-2xl font-bold text-slate-800">{{ $pemeriksaan->berat_badan_balita }}
                                <small class="text-sm text-slate-500 font-normal">kg</small></span>
                        </div>

                        <div
                            class="bg-indigo-50 rounded-2xl p-5 border border-indigo-100 flex flex-col items-center justify-center text-center">
                            <div class="bg-white p-3 rounded-full shadow-sm mb-3 text-indigo-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <span class="text-sm text-indigo-600 font-medium mb-1">Tinggi Badan</span>
                            <span class="text-2xl font-bold text-slate-800">{{ $pemeriksaan->tinggi_badan }} <small
                                    class="text-sm text-slate-500 font-normal">cm</small></span>
                        </div>

                        <div
                            class="bg-slate-50 rounded-2xl p-5 border border-slate-200 flex flex-col items-center justify-center text-center">
                            <div class="bg-white p-3 rounded-full shadow-sm mb-3 text-slate-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span class="text-sm text-slate-600 font-medium mb-1">Status Gizi</span>
                            @php
                                $colorClass = 'text-slate-800';
                                if ($pemeriksaan->status_gizi === 'Gizi Buruk') {
                                    $colorClass = 'text-red-600';
                                } elseif ($pemeriksaan->status_gizi === 'Stunting') {
                                    $colorClass = 'text-amber-600';
                                } elseif ($pemeriksaan->status_gizi === 'Gizi Baik') {
                                    $colorClass = 'text-green-600';
                                }
                            @endphp
                            <span
                                class="text-xl font-bold uppercase {{ $colorClass }}">{{ $pemeriksaan->status_gizi ?? '-' }}</span>
                        </div>
                    </div>
                @endif


                @if ($pemeriksaan->ibu_hamil)
                    <div class="border-l-4 border-pink-500 pl-6 mb-8">
                        <h2 class="text-xl font-bold text-slate-800">Informasi Ibu Hamil</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <div>
                                <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">Nama
                                    Ibu</label>
                                <p class="text-lg font-semibold text-pink-700">
                                    {{ $pemeriksaan->ibu_hamil->nama_ibu_hamil }}</p>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">NIK</label>
                                <p class="text-lg font-semibold text-slate-700">
                                    {{ $pemeriksaan->ibu_hamil->nik_ibu_hamil }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div
                            class="bg-pink-50 rounded-2xl p-5 border border-pink-100 flex flex-col items-center justify-center text-center">
                            <span class="text-xs font-bold text-pink-400 uppercase mb-2">Berat Badan</span>
                            <span class="text-2xl font-bold text-slate-800">{{ $pemeriksaan->berat_badan_ibu }} <small
                                    class="text-sm text-slate-500 font-normal">kg</small></span>
                        </div>

                        <div
                            class="bg-purple-50 rounded-2xl p-5 border border-purple-100 flex flex-col items-center justify-center text-center">
                            <span class="text-xs font-bold text-purple-400 uppercase mb-2">Usia Kehamilan</span>
                            <span class="text-2xl font-bold text-slate-800">{{ $pemeriksaan->usia_kehamilan }} <small
                                    class="text-sm text-slate-500 font-normal">minggu</small></span>
                        </div>

                        <div
                            class="bg-slate-50 rounded-2xl p-5 border border-slate-200 flex flex-col items-center justify-center text-center">
                            <span class="text-xs font-bold text-slate-400 uppercase mb-2">Tekanan Darah</span>
                            @php
                                $sistolik = $pemeriksaan->tekanan_sistolik;
                                $diastolik = $pemeriksaan->tekanan_diastolik;
                                $isHigh = $sistolik > 140 || $diastolik > 90;
                            @endphp
                            <span class="text-2xl font-bold {{ $isHigh ? 'text-red-600' : 'text-emerald-600' }}">
                                {{ $sistolik }}/{{ $diastolik }}
                            </span>
                            <span class="text-xs text-slate-400 mt-1">mmHg</span>
                        </div>

                        <div
                            class="bg-slate-50 rounded-2xl p-5 border border-slate-200 flex flex-col items-center justify-center text-center">
                            <span class="text-xs font-bold text-slate-400 uppercase mb-2">Status Kesehatan</span>
                            @php
                                $statusClass = 'text-slate-800';
                                if ($pemeriksaan->status_ibu === 'Anemia') {
                                    $statusClass = 'text-red-600';
                                } elseif ($pemeriksaan->status_ibu === 'Kondisi Baik') {
                                    $statusClass = 'text-emerald-600';
                                }
                            @endphp
                            <span
                                class="text-lg font-bold uppercase {{ $statusClass }}">{{ $pemeriksaan->status_ibu ?? '-' }}</span>
                        </div>
                    </div>
                @endif

                <div class="mt-10 pt-6 border-t border-slate-100 flex justify-end">
                    <a href="{{ route('pemeriksaan.index') }}"
                        class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-slate-800 hover:bg-slate-900 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                        </svg>
                        Kembali ke Daftar
                    </a>
                </div>

            </div>
        </div>
    </main>
</x-app-main>
