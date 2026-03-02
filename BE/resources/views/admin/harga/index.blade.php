<x-admin-layout>

<div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-bold">
        Data Harga Komoditas
    </h2>

    <a href="{{ route('harga.create') }}"
       class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
        + Tambah Harga
    </a>
</div>

@if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-lg shadow overflow-hidden">

    <table class="w-full border-collapse">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 text-left">No</th>
                <th class="p-3 text-left">Komoditas</th>
                <th class="p-3 text-left">Harga</th>
                <th class="p-3 text-left">Tanggal</th>
                <th class="p-3 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($hargas as $index => $item)
                <tr class="border-t">
                    <td class="p-3">
                        {{ $hargas->firstItem() + $index }}
                    </td>

                    <td class="p-3">
                        {{ $item->komoditas->nama ?? '-' }}
                    </td>

                    <td class="p-3">
                        Rp {{ number_format($item->harga, 0, ',', '.') }}
                    </td>

                    <td class="p-3">
                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}
                    </td>

                    <td class="p-3 text-center space-x-2">

                        <a href="{{ route('harga.edit', $item->id) }}"
                           class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                            Edit
                        </a>

                        <form action="{{ route('harga.destroy', $item->id) }}"
                              method="POST"
                              class="inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700"
                                    onclick="return confirm('Yakin hapus data?')">
                                Hapus
                            </button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-4 text-center text-gray-500">
                        Belum ada data harga.
                    </td>
                </tr>
            @endforelse
        </tbody>

    </table>

</div>

<div class="mt-4">
    {{ $hargas->links() }}
</div>

</x-admin-layout>