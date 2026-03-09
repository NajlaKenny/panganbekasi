<x-admin-layout>
    <div class="max-w-2xl mx-auto">

        <div class="mb-8 flex justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">
                    Tambah Data Barang
                </h2>
                <p class="text-gray-500">
                    Masukkan Barang baru.
                </p>
            </div>

            <a href="{{ route('komoditas.index') }}"
                class="px-4 py-2 border rounded-lg">
                ← Kembali
            </a>
        </div>

        <div class="bg-white rounded-xl border shadow-sm">

            <form method="POST" action="{{ route('komoditas.store') }}" enctype="multipart/form-data">

                @csrf

                <!-- Nama Barang -->
                <div>
                    <label class="block mb-2 font-medium">
                        Nama Barang
                    </label>

                    <input type="text"
                        name="nama"
                        value="{{ old('nama') }}"
                        required
                        class="w-full border rounded-lg px-4 py-2">
                </div>


                <!-- KATEGORI -->
                <div>
                    <label class="block mb-2 font-medium">
                        Kategori
                    </label>

                    <select name="kategori_id"
                        required
                        class="w-full border rounded-lg px-4 py-2">

                        <option value="">Pilih Kategori</option>

                        @foreach($kategori as $k)
                            <option value="{{ $k->id }}">
                                {{ $k->nama }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div>
<label>Gambar</label>
<input type="file" name="gambar" class="w-full border rounded-lg px-4 py-2">
</div>


                <div class="flex justify-end border-t pt-4">
                    <button type="submit"
                        class="px-6 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">
                        Simpan
                    </button>
                </div>

            </form>

        </div>

    </div>
</x-admin-layout>