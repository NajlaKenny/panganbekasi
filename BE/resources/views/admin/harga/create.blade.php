<x-admin-layout>

<div class="max-w-xl">

    <h2 class="text-xl font-bold mb-5">
        Tambah Harga
    </h2>

    <form method="POST" action="{{ route('harga.store') }}">
        @csrf

        {{-- Komoditas --}}
        <div class="mb-4">
            <label class="block mb-2 font-semibold">Komoditas</label>
            <select name="komoditas_id" class="border p-2 w-full rounded">
                <option value="">Pilih Komoditas</option>
                @foreach($komoditas as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Pasar --}}
        <div class="mb-4">
            <label class="block mb-2 font-semibold">Pasar</label>
            <select name="pasar_id" class="border p-2 w-full rounded">
                <option value="">Pilih Pasar</option>
                @foreach($pasars as $pasar)
                    <option value="{{ $pasar->id }}">
                        {{ $pasar->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Harga --}}
        <div class="mb-4">
            <label class="block mb-2 font-semibold">Harga</label>
            <input type="number"
                   name="harga"
                   class="border p-2 w-full rounded"
                   placeholder="Masukkan harga">
        </div>

        {{-- Tanggal --}}
        <div class="mb-4">
            <label class="block mb-2 font-semibold">Tanggal</label>
            <input type="date"
                   name="tanggal"
                   class="border p-2 w-full rounded">
        </div>

        <button type="submit"
                class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
            Simpan
        </button>

    </form>

</div>

</x-admin-layout>