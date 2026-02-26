<x-admin-layout>
    <div class="max-w-2xl mx-auto">
        <!-- Page Header -->
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Edit Data Pasar</h2>
                <p class="text-gray-500 mt-1">Perbarui data untuk {{ $pasar->nama }}.</p>
            </div>
            <a href="{{ route('pasars.index') }}"
                class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm text-gray-700 bg-white hover:bg-gray-50 transition">
                ← Kembali
            </a>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
            <form method="POST" action="{{ route('pasars.update', $pasar) }}" class="p-6 space-y-6">
                @csrf
                @method('PUT')

                <!-- Nama Pasar -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pasar</label>
                    <input 
                        type="text" 
                        name="nama" 
                        value="{{ old('nama', $pasar->nama) }}" 
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
                        placeholder="Contoh: Pasar Cihapit"
                    >
                    @error('nama')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Alamat -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                    <textarea 
                        name="alamat" 
                        rows="3"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
                        placeholder="Masukkan alamat pasar"
                    >{{ old('alamat', $pasar->alamat) }}</textarea>
                    @error('alamat')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select 
                        name="status"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    >
                        <option value="aktif" {{ old('status', $pasar->status) == 'aktif' ? 'selected' : '' }}>
                            Aktif
                        </option>
                        <option value="nonaktif" {{ old('status', $pasar->status) == 'nonaktif' ? 'selected' : '' }}>
                            Tidak Aktif
                        </option>
                    </select>

                    @error('status')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-end pt-4 border-t border-gray-100">
                    <button 
                        type="submit" 
                        class="inline-flex items-center px-6 py-2.5 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition"
                    >
                        Update Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>