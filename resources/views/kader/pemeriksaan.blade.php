<x-app-main title="Pemeriksaan">
    <main>
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
            <div class="flex-1">
                <h1 class="text-2xl font-bold text-gray-800">
                    Pemeriksaan & Jadwal Posyandu
                </h1>
                <p class="text-gray-600">
                    Kelola pemeriksaan dan jadwal kegiatan posyandu
                </p>
            </div>
            <div class="flex-shrink-0">
                <a href="{{ route('pemeriksaan.create') }}"
                    class="cursor-pointer bg-button hover:bg-buttonhover transition-colors duration-200 text-white px-4 py-2 rounded-lg flex items-center shadow-sm w-full md:w-auto justify-center md:justify-start">
                    <i class="fas fa-plus mr-2"></i>
                    Pemeriksaan Baru
                </a>
            </div>
        </div>

        <div x-data="{
            activeTab: new URLSearchParams(window.location.search).get('tab') || 'pemeriksaan',
            underlineLeft: 0,
            underlineWidth: 0,
            updateUnderline($el) {
                if ($el) {
                    this.underlineLeft = $el.offsetLeft;
                    this.underlineWidth = $el.offsetWidth;
                }
            },
            deleteConfirmation(event) {
                event.preventDefault();
                const form = event.target.closest('form');
                Swal.fire({
                    title: 'Anda yakin?',
                    text: 'Data ini akan dihapus secara permanen!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#e74c3c',
                    cancelButtonColor: '#6e7881',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            }
        }" x-init="@if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#70b2b2',
        });
        @endif
        @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '{{ session('error') }}',
            confirmButtonColor: '#e74c3c',
        });
        @endif
        
        $nextTick(() => { updateUnderline($refs[activeTab + 'Tab']); });"
            class="bg-white rounded-xl card-shadow mb-6 overflow-hidden">

            <nav class="flex justify-start relative border-b border-gray-200 p-4">
                <button x-ref="pemeriksaanTab" @click="activeTab = 'pemeriksaan'; updateUnderline($el)"
                    :class="activeTab === 'pemeriksaan' ? 'text-posyanduu' : 'text-gray-500 hover:text-gray-700'"
                    class="relative py-3 px-6 text-center font-medium text-sm whitespace-nowrap transition-colors">
                    Pemeriksaan
                </button>

                <button x-ref="jadwalTab" @click="activeTab = 'jadwal'; updateUnderline($el)"
                    :class="activeTab === 'jadwal' ? 'text-posyanduu' : 'text-gray-500 hover:text-gray-700'"
                    class="relative py-3 px-6 text-center font-medium text-sm whitespace-nowrap transition-colors">
                    Jadwal Posyandu
                </button>

                <div class="absolute bottom-0 h-0.5 bg-posyanduu transition-all duration-300 ease-out"
                    :style="`left: ${underlineLeft}px; width: ${underlineWidth}px;`"></div>
            </nav>

            <div class="p-6">
                <div x-show="activeTab === 'pemeriksaan'"
                    x-transition:enter="transition ease-out duration-300 delay-300"
                    x-transition:enter-start="opacity-0 translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 translate-y-2">

                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm text-left text-gray-700 border border-gray-200 rounded-lg">
                            <thead class="text-gray-600">
                                <tr>
                                    <th class="px-4 py-3">Tanggal Pemeriksaan</th>
                                    <th class="px-4 py-3">Jenis Pemeriksaan</th>
                                    <th class="px-4 py-3">Nama</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pemeriksaans as $p)
                                    <tr class="border-t">
                                        <td class="px-4 py-3">
                                            {{ \Carbon\Carbon::parse($p->tanggal)->format('d M Y') }}<br>
                                            <span
                                                class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($p->tanggal)->format('H:i') }}</span>
                                        </td>
                                        <td class="px-4 py-3 flex items-center gap-2">
                                            <div
                                                class="w-8 h-8 flex items-center justify-center rounded-full {{ $p->tipe === 'balita' ? 'bg-blue-100' : 'bg-pink-100' }}">
                                                <i
                                                    class="fas {{ $p->tipe === 'balita' ? 'fa-baby text-blue-500' : 'fa-female text-pink-500' }} text-sm"></i>
                                            </div>
                                            <span>Pemeriksaan {{ ucwords(str_replace('_', ' ', $p->tipe)) }}</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            {{ $p->tipe === 'balita' ? $p->balita->nama_balita : $p->ibu_hamil->nama_ibu_hamil }}
                                        </td>
                                        <td class="px-4 py-3">
                                            @if ($p->tipe === 'balita')
                                                @if ($p->status_gizi === 'Gizi Baik')
                                                    <span
                                                        class="px-2 py-1 bg-green-100 text-green-600 text-xs rounded-full">{{ $p->status_gizi }}</span>
                                                @elseif($p->status_gizi === 'Gizi Buruk')
                                                    <span
                                                        class="px-2 py-1 bg-orange-100 text-orange-600 text-xs rounded-full">{{ $p->status_gizi }}</span>
                                                @else
                                                    <span
                                                        class="px-2 py-1 bg-red-100 text-red-600 text-xs rounded-full">{{ $p->status_gizi }}</span>
                                                @endif
                                            @else
                                                <span
                                                    class="px-2 py-1 {{ $p->status_ibu === 'Kondisi Baik' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }} text-xs rounded-full">
                                                    {{ $p->status_ibu }}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-center text-base flex justify-center gap-3">
                                            <a href="{{ route('pemeriksaan.show', $p->id) }}"
                                                class="text-blue-600 hover:text-blue-800 transition-colors"
                                                title="Lihat">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('pemeriksaan.edit', $p->id) }}"
                                                class="text-warning hover:text-yellow-600 transition-colors"
                                                title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('pemeriksaan.destroy', $p->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" @click.prevent="deleteConfirmation"
                                                    class="text-danger hover:text-red-600 transition-colors"
                                                    title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-gray-500">Belum ada data
                                            pemeriksaan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div x-show="activeTab === 'jadwal'" x-transition:enter="transition ease-out duration-300 delay-300"
                    x-transition:enter-start="opacity-0 translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 translate-y-2">

                    <div class="flex justify-between items-center">
                        <h1 class="text-xl font-bold text-gray-800">Kegiatan Mendatang</h1>
                        <a href="{{ route('jadwal.create') }}"
                            class="bg-button text-white px-4 py-2 rounded-md hover:bg-buttonhover transition-colors">
                            <i class="fa-solid fa-calendar-plus mr-2"></i>Tambah Jadwal
                        </a>
                    </div>

                    <div class="mt-6">
                        @forelse ($jadwals as $jadwal)
                            <div class="flex items-center p-4 border border-gray-200 rounded-lg mt-4">
                                <div
                                    class="bg-posyanduu text-white rounded-lg w-12 h-12 flex flex-col items-center justify-center flex-shrink-0">
                                    <span class="font-bold text-lg">
                                        {{ \Carbon\Carbon::parse($jadwal->waktu_mulai)->format('d') }}
                                    </span>
                                </div>
                                <div class="ml-4 flex-1">
                                    <h3 class="font-medium text-gray-800">{{ $jadwal->keterangan }}</h3>
                                    <p class="text-sm text-gray-600">
                                        {{ \Carbon\Carbon::parse($jadwal->waktu_mulai)->format('H:i') }} -
                                        {{ \Carbon\Carbon::parse($jadwal->waktu_selesai)->format('H:i') }}
                                        <span class="mx-1">•</span> {{ $jadwal->lokasi }}
                                    </p>
                                </div>
                                <div class="flex space-x-3 ml-4">
                                    <a href="{{ route('jadwal.edit', $jadwal->id) }}"
                                        class="text-posyanduu hover:text-posyanduDark transition-colors" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" @click.prevent="deleteConfirmation"
                                            class="text-danger hover:text-red-600 transition-colors" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="text-center text-gray-500 mt-10 py-8">
                                <i class="fa-solid fa-calendar-xmark text-5xl mb-3 opacity-50"></i>
                                <p class="text-lg font-medium">Belum ada jadwal posyandu.</p>
                                <p class="text-sm">Silakan tambahkan jadwal baru untuk ditampilkan di sini.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-main>
