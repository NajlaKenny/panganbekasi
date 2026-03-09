<x-admin-layout>

<div class="max-w-xl">

    <h2 class="text-xl font-bold mb-5">
        Edit Barang
    </h2>

    <form method="POST"
          action="{{ route('komoditas.update', $komoditas) }}"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        {{-- Nama Barang --}}
        <div class="mb-4">

            <label class="block mb-2 font-medium">
                Nama Barang
            </label>

            <input type="text"
                name="nama"
                value="{{ old('nama', $komoditas->nama) }}"
                class="border p-2 w-full rounded">

            @error('nama')
                <p class="text-red-600 mt-1">
                    {{ $message }}
                </p>
            @enderror

        </div>

        {{-- Kategori --}}
        <div class="mb-4">

            <label class="block mb-2 font-medium">
                Kategori
            </label>

            <select name="kategori_id"
                    class="border p-2 w-full rounded">

                @foreach($kategoris as $kategori)

                <option value="{{ $kategori->id }}"
                    {{ $komoditas->kategori_id == $kategori->id ? 'selected' : '' }}>

                    {{ $kategori->nama }}

                </option>

                @endforeach

            </select>

        </div>

        {{-- Gambar --}}
        <div class="mb-4">

            <label class="block mb-2 font-medium">
                Gambar Barang
            </label>

            <input type="file"
                   name="gambar"
                   class="border p-2 w-full rounded">

            @if($komoditas->gambar)

            <img src="{{ asset('storage/'.$komoditas->gambar) }}"
                 width="100"
                 class="mt-2 rounded">

            @endif

        </div>

        <button type="submit"
                class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">

            Update

        </button>

    </form>

</div>

</x-admin-layout>