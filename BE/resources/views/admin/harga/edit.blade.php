<x-admin-layout>

<div class="max-w-xl">

    <h2 class="text-xl font-bold mb-5">
        Edit Harga
    </h2>

    <form method="POST" action="{{ route('harga.update', $harga->id) }}">
        @csrf
        @method('PUT')

        {{-- Komoditas --}}
        <div class="mb-4">
            <label class="block mb-2">Komoditas</label>

            <select name="komoditas_id" class="border p-2 w-full rounded">
                @foreach($komoditas as $item)
                    <option value="{{ $item->id }}"
                        {{ $harga->komoditas_id == $item->id ? 'selected' : '' }}>
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Pasar --}}
        <div class="mb-4">
            <label class="block mb-2">Pasar</label>

            <select name="pasar_id" class="border p-2 w-full rounded">
                @foreach($pasars as $pasar)
                    <option value="{{ $pasar->id }}"
                        {{ $harga->pasar_id == $pasar->id ? 'selected' : '' }}>
                        {{ $pasar->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Harga --}}
        <div class="mb-4">
            <label class="block mb-2">Harga</label>

            <input type="number"
                   name="harga"
                   value="{{ old('harga', $harga->harga) }}"
                   class="border p-2 w-full rounded">
        </div>

        {{-- Tanggal --}}
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