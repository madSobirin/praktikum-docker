<x-app-main title="Data Peserta">
    <main class="ml-2 md:ml-2">
        <div class="mb-6 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">
                    Data Balita & Ibu Hamil
                </h1>
                <p class="text-gray-600">
                    Kelola data balita dan ibu hamil di posyandu
                </p>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('peserta.create') }}"
                    class="bg-button hover:bg-buttonhover transition-colors duration-200 text-white px-4 py-2 rounded-lg flex items-center">
                    <i class="fas fa-plus mr-2"></i> Tambah Data
                </a>

            </div>
        </div>

        <!-- Tabs -->
        <div class="bg-white rounded-xl shadow-md mb-6">
            <div class="border-b border-gray-200">
                <nav class="flex -mb-px">
                    <button id="balita-tab"
                        class="tab-button py-4 px-6 text-center border-b-2 border-posyanduu font-medium text-sm whitespace-nowrap  hover:text-gray-700">
                        Data Balita
                    </button>
                    <button id="ibu-hamil-tab"
                        class="tab-button py-4 px-6 text-center border-b-2 border-posyanduu font-medium text-sm whitespace-nowrap  hover:text-gray-700">
                        Data Ibu Hamil
                    </button>
                </nav>
            </div>
        </div>

        <!-- Data Balita Content -->
        <div id="balita-content" data-content class="active">
            <!-- Data Table -->
            <div class="bg-white rounded-xl p-4 md:p-6 shadow-md">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left border-b text-gray-600 text-sm">
                                <th class="pb-3 ">
                                    NIK
                                </th>
                                <th class="pb-3 ">
                                    Nama Balita
                                </th>
                                <th class="pb-3 ">
                                    Usia
                                </th>
                                <th class="pb-3 ">
                                    Jenis Kelamin
                                </th>
                                <th class="pb-3 ">
                                    Alamat
                                </th>
                                <th class="pb-3 ">
                                    Nama Orang Tua
                                </th>
                                <th class="pb-3 ">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y text-gray-700">
                            @isset($balitas)
                                @forelse ($balitas as $balita)
                                    <tr>
                                        <td class="py-4">{{ $balita->nik }}</td>
                                        <td class="py-4">{{ $balita->nama_balita }}</td>
                                        <td class="py-4">{{ $balita->usia_tahun }} tahun {{ $balita->usia_bulan }} bulan
                                        </td>
                                        <td class="py-4">{{ $balita->jenis_kelamin }}</td>
                                        <td class="py-4">{{ $balita->alamat }}</td>
                                        <td class="py-4">{{ $balita->nama_orang_tua }}</td>
                                        <td class="py-4 text-center">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('peserta.edit', ['kategori' => 'balita', 'id' => $balita->id]) }}"
                                                    class="text-warning hover:text-yellow-600">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <form
                                                    action="{{ route('peserta.destroy', ['kategori' => 'balita', 'id' => $balita->id]) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                                                    class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-danger hover:text-red-600 cursor-pointer">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="py-6 text-center text-gray-500">
                                            <i class="fas fa-info-circle mr-2"></i> Tidak ada data balita yang tersedia
                                        </td>
                                    </tr>
                                @endforelse
                            @else
                                <tr>
                                    <td colspan="7" class="py-6 text-center text-gray-500">
                                        <i class="fas fa-info-circle mr-2"></i> Data belum diinisialisasi
                                    </td>
                                </tr>
                            @endisset
                        </tbody>


                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-6 flex flex-col md:flex-row justify-between items-center">
                    <p class="text-sm text-gray-600 mb-4 md:mb-0">
                        Menampilkan {{ $balitas->count() }} dari 142 data balita
                    </p>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-100">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="px-3 py-1 rounded border border-posyanduu bg-posyanduu text-white">
                            1
                        </button>
                        <button class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-100">
                            2
                        </button>
                        <button class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-100">
                            3
                        </button>
                        <button class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-100">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Ibu Hamil Content -->
        <div id="ibu-hamil-content" data-content>
            <!-- Data Table -->
            <div class="bg-white rounded-xl p-4 md:p-6 card-shadow">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left border-b text-gray-600 text-sm">
                                <th class="pb-3 ">
                                    NIK
                                </th>
                                <th class="pb-3 ">
                                    Nama Ibu Hamil
                                </th>
                                <th class="pb-3 ">
                                    Nama Suami
                                </th>
                                <th class="pb-3 ">
                                    Umur
                                </th>
                                <th class="pb-3 ">
                                    Alamat
                                </th>
                                <th class="pb-3 ">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y text-gray-700">
                            @if (count($ibu_hamils) > 0)
                                @foreach ($ibu_hamils as $ibu)
                                    <tr>
                                        <td class="py-4">{{ $ibu->nik_ibu_hamil }}</td>
                                        <td class="py-4">{{ $ibu->nama_ibu_hamil }}</td>
                                        <td class="py-4">{{ $ibu->nama_suami }}</td>
                                        <td class="py-4">{{ $ibu->umur }} tahun</td>
                                        <td class="py-4">{{ $ibu->alamat_ibu_hamil }}</td>
                                        <td class="py-4 text-center">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('peserta.edit', ['kategori' => 'ibu_hamil', 'id' => $ibu->id]) }}"
                                                    class="text-warning hover:text-yellow-600">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <form
                                                    action="{{ route('peserta.destroy', ['kategori' => 'ibu_hamil', 'id' => $ibu->id]) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                                                    class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-danger hover:text-red-600 cursor-pointer">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="py-6 text-center text-gray-500">
                                        <i class="fas fa-info-circle mr-2"></i> Tidak ada data ibu hamil yang tersedia
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-6 flex flex-col md:flex-row justify-between items-center">
                    <p class="text-sm text-gray-600 mb-4 md:mb-0">
                        Menampilkan <span>{{ $ibu_hamils->count() }}</span> dari 28 data ibu hamil
                    </p>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-100">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="px-3 py-1 rounded border border-posyanduu bg-posyanduu text-white">
                            1
                        </button>
                        <button class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-100">
                            2
                        </button>
                        <button class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-100">
                            3
                        </button>
                        <button class="px-3 py-1 rounded border border-gray-300 text-gray-600 hover:bg-gray-100">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-main>
