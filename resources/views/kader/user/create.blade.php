<x-app-main title="Tambah Pengguna Baru">

    {{-- Load Library GSAP --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    <main class="relative min-h-screen bg-slate-50 p-4 md:p-8 flex justify-center items-start pt-10">

        {{-- Background Elements (Sama persis dengan halaman Edit) --}}
        <div
            class="fixed top-0 left-0 w-full h-80 bg-gradient-to-r from-posyanduDark to-ed -z-10 rounded-b-[50px] shadow-lg">
        </div>
        <div class="fixed top-20 right-10 w-64 h-64 bg-white/10 rounded-full blur-3xl -z-10"></div>
        <div class="fixed top-40 left-20 w-40 h-40 bg-purple-500/20 rounded-full blur-2xl -z-10"></div>

        <div class="w-full max-w-4xl relative z-10">

            {{-- Header Section --}}
            <div class="gsap-header opacity-0 -translate-y-5 flex justify-between items-center mb-6 text-white">
                <div>
                    <h1 class="text-2xl font-bold text-ed">Tambah Pengguna Baru</h1>
                    <p class="text-ed text-sm opacity-90">Daftarkan pengguna baru untuk mengakses sistem.</p>
                </div>
                <a href="{{ route('admin.pengguna.index') }}"
                    class="group flex items-center bg-white/10 hover:bg-white/20 backdrop-blur-sm px-4 py-2 rounded-xl transition-all border border-white/20">
                    <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform"></i>
                    <span>Kembali</span>
                </a>
            </div>

            {{-- Content Grid --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- Left Column: Info Card (Agar layout serasi dengan halaman Edit) --}}
                <div class="gsap-card opacity-0 -translate-x-5 lg:col-span-1">
                    <div
                        class="bg-white rounded-2xl shadow-xl shadow-indigo-100 p-6 text-center border border-gray-100 h-full relative overflow-hidden flex flex-col justify-center items-center">
                        {{-- Top Decoration --}}
                        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-ed to-posyanduDark"></div>

                        <div
                            class="w-24 h-24 bg-green-50 rounded-full flex items-center justify-center mb-4 border-4 border-white shadow-md relative group">
                            <i
                                class="fas fa-user-plus text-4xl text-posyanduDark group-hover:scale-110 transition-transform duration-300"></i>
                            <div
                                class="absolute top-0 right-0 w-6 h-6 bg-ed border-2 border-white rounded-full animate-bounce">
                            </div>
                        </div>

                        <h3 class="text-lg font-bold text-gray-800">Registrasi User</h3>
                        <p class="text-gray-500 text-sm mt-2">
                            Pastikan data yang dimasukkan sudah sesuai dengan identitas pengguna.
                        </p>

                        <div class="mt-6 w-full space-y-3">
                            <div class="flex items-center text-xs text-gray-500 bg-gray-50 p-3 rounded-lg">
                                <i class="fas fa-info-circle text-blue-400 mr-2 text-lg"></i>
                                <span class="text-left">Password default dapat diatur sesuai kebijakan keamanan.</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right Column: Form Input --}}
                <div class="gsap-card opacity-0 translate-x-5 lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-xl shadow-indigo-100 p-8 border border-gray-100">

                        <form action="{{ route('admin.pengguna.store') }}" method="POST">
                            @csrf

                            <div class="space-y-6">
                                {{-- Input Nama --}}
                                <div class="gsap-input group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i
                                                class="fas fa-id-card text-gray-400 group-focus-within:text-blue-500 transition-colors"></i>
                                        </div>
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="block w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 outline-none transition-all font-medium text-gray-800"
                                            placeholder="Masukkan nama lengkap" required>
                                    </div>
                                    @error('name')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Input Email --}}
                                <div class="gsap-input group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat Email</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i
                                                class="fas fa-envelope text-gray-400 group-focus-within:text-blue-500 transition-colors"></i>
                                        </div>
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="block w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 outline-none transition-all font-medium text-gray-800"
                                            placeholder="contoh@email.com" required>
                                    </div>
                                    @error('email')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="border-t border-gray-100 my-4"></div>

                                {{-- Input Password --}}
                                <div class="gsap-input group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i
                                                class="fas fa-lock text-gray-400 group-focus-within:text-blue-500 transition-colors"></i>
                                        </div>
                                        <input type="password" name="password" id="passwordInput"
                                            class="block w-full pl-10 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 outline-none transition-all font-medium text-gray-800"
                                            placeholder="Minimal 8 karakter" required>

                                        <button type="button" onclick="togglePassword()"
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none cursor-pointer">
                                            <i class="fas fa-eye" id="eyeIcon"></i>
                                        </button>
                                    </div>
                                    @error('password')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Action Buttons --}}
                                <div class="gsap-input pt-4 flex items-center justify-end space-x-4">
                                    <a href="{{ route('admin.pengguna.index') }}"
                                        class="px-6 py-2.5 rounded-xl border border-gray-300 text-gray-700 font-medium hover:bg-gray-50 transition-colors">
                                        Batal
                                    </a>
                                    <button type="submit"
                                        class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-ed to-posyanduDark text-white font-medium shadow-lg shadow-blue-500/30 hover:shadow-ed hover:-translate-y-0.5 transition-all duration-300 cursor-pointer flex items-center">
                                        <i class="fas fa-save mr-2"></i> Simpan Pengguna
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- Script JavaScript (Sama dengan Edit, disesuaikan) --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Animasi GSAP
            const tl = gsap.timeline({
                defaults: {
                    ease: "power3.out"
                }
            });

            tl.to(".gsap-header", {
                    y: 0,
                    opacity: 1,
                    duration: 0.8
                })
                .to(".gsap-card", {
                    x: 0,
                    opacity: 1,
                    duration: 0.8,
                    stagger: 0.2
                }, "-=0.5")
                .from(".gsap-input", {
                    y: 20,
                    opacity: 0,
                    duration: 0.5,
                    stagger: 0.1
                }, "-=0.3");

            // SweetAlert untuk Session Success
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#70b2b2',
                    timer: 3000
                });
            @endif
        });

        // Script Toggle Password
        function togglePassword() {
            const input = document.getElementById('passwordInput');
            const icon = document.getElementById('eyeIcon');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</x-app-main>
