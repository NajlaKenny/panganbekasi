<x-admin-layout>

<div class="max-w-xl">

    <h2 class="text-xl font-bold mb-5">
        Tambah Harga
    </h2>

    <form method="POST" action="{{ route('harga.store') }}">
        @csrf

        <div>

<div class="mb-4">
<label class="block mb-2">Pasar</label>

<select name="pasar" class="border p-2 w-full rounded">

<option value="">Pilih Pasar</option>

@foreach($pasars as $pasar)

<option value="{{ $pasar->nama }}">
{{ $pasar->nama }}
</option>

@endforeach

</select>

</div>
</div>

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


        <button type="submit"
                class="bg-indigo-600 text-white px-4 py-2 rounded">
            Simpan
        </button>
    </form>

</div>

</x-admin-layout>