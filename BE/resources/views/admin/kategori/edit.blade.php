<x-admin-layout>

<div class="max-w-xl">

    <h2 class="text-xl font-bold mb-5">
        Edit Kategori
    </h2>

    <form method="POST"
        action="{{ route('kategori.update', $kategori) }}">

        @csrf
        @method('PUT')

        <div class="mb-4">

            <label class="block mb-2 font-medium">
                Nama Kategori
            </label>

            <input type="text"
                name="nama"
                value="{{ old('nama', $kategori->nama) }}"
                class="border p-2 w-full rounded">

            @error('nama')
                <p class="text-red-600 mt-1">
                    {{ $message }}
                </p>
            @enderror

        </div>

        <button
            class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">

            Update

        </button>

    </form>

</div>

</x-admin-layout>