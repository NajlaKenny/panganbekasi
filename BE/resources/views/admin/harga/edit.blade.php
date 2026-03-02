<x-admin-layout>

<div class="max-w-xl">

    <h2 class="text-xl font-bold mb-5">
        Edit Harga
    </h2>

    <form method="POST"
          action="{{ route('harga.update', $harga) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-2">Komoditas</label>
            <select name="komoditas_id"
                    class="border p-2 w-full rounded">

                @foreach($komoditas as $item)
                    <option value="{{ $item->id }}"
                        {{ $harga->komoditas_id == $item->id ? 'selected' : '' }}>
                        {{ $item->nama }}
                    </option>
                @endforeach

            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-2">Harga</label>
            <input type="number"
                   name="harga"
                   value="{{ old('harga', $harga->harga) }}"
                   class="border p-2 w-full rounded">
        </div>

        <div class="mb-4">
            <label class="block mb-2">Tanggal</label>
            <input type="date"
                   name="tanggal"
                   value="{{ old('tanggal', $harga->tanggal) }}"
                   class="border p-2 w-full rounded">
        </div>

        <button type="submit"
                class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
            Update
        </button>

    </form>

</div>

</x-admin-layout>