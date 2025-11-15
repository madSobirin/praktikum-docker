<x-app>
    <x-slot:title>Lupa Kata Sandi</x-slot:title>

    <div class="min-h-screen flex items-center justify-center bg-gray-50 px-4">
        <div class="w-full max-w-md p-8 bg-white rounded-lg shadow">
            <h2 class="text-2xl font-bold text-center">Lupa Kata Sandi</h2>
            <p class="mt-2 text-center text-sm text-gray-600">Masukkan email untuk reset kata sandi.</p>

            <!-- ALERT SUKSES -->
            @if (session('success'))
                <div id="alert-success"
                    class="flex items-center justify-between mt-4 p-4 bg-green-100 text-green-700 rounded">
                    <span>{{ session('success') }}</span>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 close-alert">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            @endif

            <!-- ALERT ERROR -->
            @if (session('error'))
                <div id="alert-error" class="flex items-center justify-between mt-4 p-4 bg-red-100 text-red-700 rounded">
                    <span>{{ session('error') }}</span>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 close-alert">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            @endif

            <!-- FORM RESET PASSWORD -->
            <form action="{{ route('password.email') }}" method="POST" class="mt-6 space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" required value="{{ old('email') }}"
                        class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                    Kirim Link Reset
                </button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.close-alert');
            buttons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const parent = this.closest('div');
                    parent.classList.add('opacity-0');
                    setTimeout(() => parent.remove(), 300);
                });
            });
        });
    </script>
</x-app>
