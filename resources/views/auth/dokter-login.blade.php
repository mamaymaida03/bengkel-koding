<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('dokter.login') }}">
        @csrf

        <!-- Nama Dokter -->
        <div>
            <x-input-label for="nama" :value="__('Nama Dokter')" />
            <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
        </div>

        <!-- Alamat Dokter -->
        <div class="mt-4">
            <x-input-label for="alamat" :value="__('Alamat Dokter')" />
            <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')"
                required autocomplete="address" />
            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3">
                {{ __('Login Dokter') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
