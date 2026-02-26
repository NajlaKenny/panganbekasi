<x-admin-layout>
    <div class="max-w-2xl mx-auto">
        <!-- Page Header -->
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Tambah Data Pasar</h2>
                <p class="text-gray-500 mt-1">Masukkan data pasar baru.</p>
            </div>
            <a href="{{ route('pasars.index') }}"
                class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm text-gray-700 bg-white hover:bg-gray-50">
                ← Kembali
            </a>
        </div>

        <!-- Form -->
        <div class="bg-white rounded-xl border shadow-sm">
            <form method="POST" action="{{ route('pasars.store') }}" class="p-6 space-y-6">
                @csrf

                <!-- Nama Pasar -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pasar</label>
                    <input type="text" name="nama" value="{{ old('nama') }}" required
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500"
                        placeholder="Contoh: Pasar Cihapit">
                    @error('nama')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Alamat -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                    <textarea name="alamat" rows="3" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500"
                        placeholder="Masukkan alamat pasar">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select name="status"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Tidak Aktif</option>
                    </select>

                    @error('status')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit -->
                <div class="flex justify-end border-t pt-4">
                    <button type="submit" class="px-6 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
