<x-admin-layout>

<div class="max-w-xl">

    <h2 class="text-xl font-bold mb-5">
        Tambah Harga
    </h2>

    <form method="POST" action="{{ route('harga.store') }}">
        @csrf

        <div class="mb-4">
            <label class="block mb-2">Komoditas</label>
            <select name="komoditas_id" class="border p-2 w-full rounded">
                @foreach($komoditas as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-2">Harga</label>
            <input type="number"
                   name="harga"
                   class="border p-2 w-full rounded">
        </div>

        <div class="mb-4">
            <label class="block mb-2">Tanggal</label>
            <input type="date"
                   name="tanggal"
                   class="border p-2 w-full rounded">
        </div>

        <button type="submit"
                class="bg-indigo-600 text-white px-4 py-2 rounded">
            Simpan
        </button>
    </form>

</div>

</x-admin-layout>