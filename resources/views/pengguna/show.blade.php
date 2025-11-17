<x-app-main title="Detail Jadwal">
    <main class="min-h-screen w-full bg-slate-50/50 p-4 md:p-6 lg:p-8">

        <div class="mb-6">
            <a href="{{ route('pengguna.dashboard') }}"
                class="inline-flex items-center text-sm text-slate-500 hover:text-blue-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Dashboard
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-lg border border-slate-100 overflow-hidden w-full">

            <div class="relative bg-gradient-to-r bg-posyanduu px-6 py-8 md:px-10">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 rounded-full bg-white opacity-10 blur-xl">
                </div>

                <div class="relative flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <span
                                class="bg-white/20 backdrop-blur-sm text-white text-xs font-bold px-3 py-1 rounded-full border border-white/10 tracking-wider uppercase">
                                Agenda Kegiatan
                            </span>
                        </div>
                        <h1 class="text-3xl font-bold text-white leading-tight">
                            {{ $jadwal->keterangan }}
                        </h1>
                    </div>

                    <div
                        class="hidden md:block bg-white/10 backdrop-blur-md p-3 rounded-xl border border-white/20 shadow-inner">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="p-6 md:p-10">

                <div class="mb-8 bg-blue-50 rounded-xl p-5 border border-blue-100 flex items-start gap-4">
                    <div class="bg-white p-3 rounded-full shadow-sm text-blue-600 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-blue-800 uppercase tracking-wide mb-1">Lokasi Pelaksanaan</h3>
                        <p class="text-lg text-slate-800 font-medium leading-relaxed">
                            {{ $jadwal->lokasi }}
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div
                        class="group bg-white border border-slate-200 rounded-xl p-5 hover:border-green-400 transition-colors shadow-sm hover:shadow-md">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="p-2 bg-green-100 text-green-600 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span class="text-slate-500 font-semibold text-sm">Waktu Mulai</span>
                        </div>
                        <div class="pl-1">
                            <p class="text-xl font-bold text-slate-800">
                                {{ \Carbon\Carbon::parse($jadwal->waktu_mulai)->translatedFormat('H:i') }} <span
                                    class="text-sm font-normal text-slate-500">WIB</span>
                            </p>
                            <p class="text-slate-600 mt-1">
                                {{ \Carbon\Carbon::parse($jadwal->waktu_mulai)->translatedFormat('l, d F Y') }}
                            </p>
                        </div>
                    </div>

                    <div
                        class="group bg-white border border-slate-200 rounded-xl p-5 hover:border-red-400 transition-colors shadow-sm hover:shadow-md">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="p-2 bg-red-100 text-red-600 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span class="text-slate-500 font-semibold text-sm">Waktu Selesai</span>
                        </div>
                        <div class="pl-1">
                            <p class="text-xl font-bold text-slate-800">
                                {{ \Carbon\Carbon::parse($jadwal->waktu_selesai)->translatedFormat('H:i') }} <span
                                    class="text-sm font-normal text-slate-500">WIB</span>
                            </p>
                            <p class="text-slate-600 mt-1">
                                {{ \Carbon\Carbon::parse($jadwal->waktu_selesai)->translatedFormat('l, d F Y') }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-10 pt-6 border-t border-slate-100 flex justify-end">
                    <a href="{{ route('pengguna.dashboard') }}"
                        class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-slate-800 hover:bg-slate-900 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                        </svg>
                        Kembali ke Daftar Jadwal
                    </a>
                </div>

            </div>
        </div>
    </main>
</x-app-main>
