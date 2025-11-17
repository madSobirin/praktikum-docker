<x-app-main title="Data Peserta">
    <main class="ml-2 md:ml-2">
        <div class="mb-6 flex flex-col md:flex-row md:justify-between md:items-center gap-3">
            <div>
                <h1 class="text-lg md:text-2xl font-bold text-gray-800">
                    Data Balita & Ibu Hamil
                </h1>
                <p class="text-gray-600 text-xs md:text-sm">
                    Kelola data balita dan ibu hamil di posyandu
                </p>
            </div>

            <div class="flex justify-start md:justify-end">
                <a href="{{ route('peserta.create') }}"
                    class="bg-button hover:bg-buttonhover transition-colors duration-200
                   text-white text-xs md:text-base px-3 py-2 md:px-4 md:py-2 rounded-lg flex items-center">
                    <i class="fas fa-plus mr-2"></i> Tambah Data
                </a>
            </div>
        </div>


        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#70b2b2',
                });
            </script>
        @endif
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const deleteButtons = document.querySelectorAll('.delete-button');

                deleteButtons.forEach(button => {
                    button.addEventListener('click', (e) => {
                        e.preventDefault();
                        const form = e.target.closest('form');

                        Swal.fire({
                            title: 'Apakah Anda yakin?',
                            text: 'Data ini akan dihapus secara permanen!',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#70b2b2',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, hapus!',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });
                    });
                });
            });
        </script>

        <!-- Tabs -->
        <div class="bg-white rounded-xl shadow-md mb-6">
            <div class="border-b border-gray-200">
                <nav class="flex -mb-px">
                    <button id="balita-tab"
                        class="tab-button py-4 px-6 text-center border-b-2 font-medium text-sm whitespace-nowrap hover:text-gray-700">
                        Data Balita
                    </button>
                    <button id="ibu-hamil-tab"
                        class="tab-button py-4 px-6 text-center border-b-2 font-medium text-sm whitespace-nowrap hover:text-gray-700">
                        Data Ibu Hamil
                    </button>
                </nav>
            </div>
        </div>

        <!-- Data Balita Content -->
        <div id="balita-content" data-content class="active">
            <div class="bg-white rounded-xl p-4 md:p-6 shadow-md">
                <div class="overflow-x-auto rounded-xl border border-gray-200 shadow-sm scroll-smooth">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-50">
                            <tr class="text-left border-b text-gray-600">
                                <th class="py-3 px-3 whitespace-nowrap text-xs">NIK</th>
                                <th class="py-3 px-3 whitespace-nowrap text-xs">Nama</th>
                                <th class="py-3 px-3 whitespace-nowrap text-xs">Usia</th>
                                <th class="py-3 px-3 whitespace-nowrap text-xs">JK</th>
                                <th class="py-3 px-3 whitespace-nowrap text-xs">Alamat</th>
                                <th class="py-3 px-3 whitespace-nowrap text-xs">Orang Tua</th>
                                <th class="py-3 px-3 whitespace-nowrap text-xs text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y text-gray-800">
                            @forelse($balitas as $balita)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-3 whitespace-nowrap">{{ $balita->nik }}</td>
                                    <td class="py-3 px-3 whitespace-nowrap">{{ $balita->nama_balita }}</td>
                                    <td class="py-3 px-3 whitespace-nowrap">
                                        {{ $balita->usia_tahun }} tahun • {{ $balita->usia_bulan }} bulan
                                    </td>
                                    <td class="py-3 px-3 whitespace-nowrap">{{ $balita->jenis_kelamin }}</td>
                                    <td class="py-3 px-3 whitespace-nowrap">{{ $balita->alamat }}</td>
                                    <td class="py-3 px-3 whitespace-nowrap">{{ $balita->nama_orang_tua }}</td>

                                    <td class="py-3 px-3 text-center whitespace-nowrap">
                                        <div class="flex items-center justify-center space-x-3">
                                            <a href="{{ route('peserta.edit', ['kategori' => 'balita', 'id' => $balita->id]) }}"
                                                class="text-yellow-500 hover:text-yellow-600">
                                                <i class="fas fa-edit text-sm"></i>
                                            </a>

                                            <form
                                                action="{{ route('peserta.destroy', ['kategori' => 'balita', 'id' => $balita->id]) }}"
                                                method="POST" class="delete-button inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-600">
                                                    <i class="fas fa-trash text-sm"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="py-6 text-center text-gray-500 text-sm">
                                        Tidak ada data balita
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>



                <!-- Pagination Balita -->
                <div class="mt-6 flex flex-col md:flex-row justify-between items-center">
                    <p class="text-sm text-gray-600 mb-4 md:mb-0">
                        Menampilkan {{ $balitas->lastItem() ?? 0 }} dari {{ $balitas->total() }} data balita
                    </p>

                    <div class="flex space-x-2">
                        @if ($balitas->onFirstPage())
                            <button disabled
                                class="px-3 py-1 rounded border border-gray-300 text-gray-400 cursor-not-allowed">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                        @else
                            <a href="{{ $balitas->previousPageUrl() }}&tab=balita"
                                class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-100">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        @endif

                        @foreach ($balitas->getUrlRange(1, $balitas->lastPage()) as $page => $url)
                            @if ($page == $balitas->currentPage())
                                <span
                                    class="px-3 py-1 rounded border border-posyanduu bg-posyanduu text-white">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}&tab=balita"
                                    class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-100">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($balitas->hasMorePages())
                            <a href="{{ $balitas->nextPageUrl() }}&tab=balita"
                                class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-100">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        @else
                            <button disabled
                                class="px-3 py-1 rounded border border-gray-300 text-gray-400 cursor-not-allowed">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Ibu Hamil Content -->
        <div id="ibu-hamil-content" data-content>
            <div class="bg-white rounded-xl p-4 md:p-6 shadow-md">
                <div class="overflow-x-auto rounded-xl border border-gray-200 shadow-sm scroll-smooth">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="text-left border-b text-gray-600 bg-gray-50">
                                <th class="py-3 px-3 whitespace-nowrap text-xs">NIK</th>
                                <th class="py-3 px-3 whitespace-nowrap text-xs">Nama Ibu Hamil</th>
                                <th class="py-3 px-3 whitespace-nowrap text-xs">Nama Suami</th>
                                <th class="py-3 px-3 whitespace-nowrap text-xs">Umur</th>
                                <th class="py-3 px-3 whitespace-nowrap text-xs">Alamat</th>
                                <th class="py-3 px-3 whitespace-nowrap text-xs text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y text-gray-800">
                            @forelse ($ibu_hamils as $ibu)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-3 whitespace-nowrap">{{ $ibu->nik_ibu_hamil }}</td>
                                    <td class="py-3 px-3 whitespace-nowrap">{{ $ibu->nama_ibu_hamil }}</td>
                                    <td class="py-3 px-3 whitespace-nowrap">{{ $ibu->nama_suami }}</td>
                                    <td class="py-3 px-3 whitespace-nowrap">{{ $ibu->umur }} tahun</td>
                                    <td class="py-3 px-3 whitespace-nowrap">{{ $ibu->alamat_ibu_hamil }}</td>

                                    <td class="py-3 px-3 text-center whitespace-nowrap">
                                        <div class="flex items-center justify-center space-x-3">
                                            <a href="{{ route('peserta.edit', ['kategori' => 'ibu_hamil', 'id' => $ibu->id]) }}"
                                                class="text-yellow-500 hover:text-yellow-600">
                                                <i class="fas fa-edit text-sm"></i>
                                            </a>

                                            <form
                                                action="{{ route('peserta.destroy', ['kategori' => 'ibu_hamil', 'id' => $ibu->id]) }}"
                                                method="POST" class="delete-button inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-600">
                                                    <i class="fas fa-trash text-sm"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="py-6 text-center text-gray-500 text-sm">
                                        Tidak ada data ibu hamil
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>


                <!-- Pagination Ibu Hamil -->
                <div class="mt-6 flex flex-col md:flex-row justify-between items-center">
                    <p class="text-sm text-gray-600 mb-4 md:mb-0">
                        Menampilkan {{ $ibu_hamils->lastItem() ?? 0 }} dari {{ $ibu_hamils->total() }} data ibu hamil
                    </p>

                    <div class="flex space-x-2">
                        @if ($ibu_hamils->onFirstPage())
                            <button disabled
                                class="px-3 py-1 rounded border border-gray-300 text-gray-400 cursor-not-allowed">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                        @else
                            <a href="{{ $ibu_hamils->previousPageUrl() }}&tab=ibu_hamil"
                                class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-100">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        @endif

                        @foreach ($ibu_hamils->getUrlRange(1, $ibu_hamils->lastPage()) as $page => $url)
                            @if ($page == $ibu_hamils->currentPage())
                                <span
                                    class="px-3 py-1 rounded border border-posyanduu bg-posyanduu text-white">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}&tab=ibu_hamil"
                                    class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-100">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($ibu_hamils->hasMorePages())
                            <a href="{{ $ibu_hamils->nextPageUrl() }}&tab=ibu_hamil"
                                class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-100">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        @else
                            <button disabled
                                class="px-3 py-1 rounded border border-gray-300 text-gray-400 cursor-not-allowed">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-main>
