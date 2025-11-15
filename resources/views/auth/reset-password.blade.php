<x-app>
    <x-slot:title>Reset Kata Sandi</x-slot:title>

    <div class="min-h-screen flex items-center justify-center bg-gray-50 px-4">
        <div class="w-full max-w-md p-8 bg-white rounded-lg shadow">
            <h2 class="text-2xl font-bold text-center">Reset Kata Sandi</h2>
            <p class="mt-2 text-center text-sm text-gray-600">Masukkan password baru Anda.</p>

            @if (session('success'))
                <div class="mt-4 p-4 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="mt-4 p-4 bg-red-100 text-red-700 rounded">{{ session('error') }}</div>
            @endif

            <form action="{{ route('password.update') }}" method="POST" class="mt-6 space-y-4">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" required value="{{ old('email') }}"
                        class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Password Baru</label>
                    <input type="password" name="password" required
                        class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" required
                        class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                    Reset Kata Sandi
                </button>
            </form>
        </div>
    </div>
</x-app>
