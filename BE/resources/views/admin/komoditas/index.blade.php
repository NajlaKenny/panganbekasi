<x-admin-layout>

    <div class="flex justify-between mb-6">
        <h2 class="text-2xl font-bold">
            Data Barang
        </h2>

        <a href="{{ route('komoditas.create') }}"
           class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
            Tambah Data Barang
        </a>
    </div>

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-3 text-left">Nama</th>
                <th class="p-3 text-right">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($komoditas as $item)
                <tr class="border-t">
                    <td class="p-3">
                        {{ $item->nama }}
                    </td>

                    <td class="p-3 text-right">

                        <!-- Edit -->
                        <a href="{{ route('komoditas.edit', $item) }}"
                           class="text-indigo-600 mr-3 hover:underline">
                            Edit
                        </a>

                        <!-- Hapus -->
                        <form action="{{ route('komoditas.destroy', $item) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="text-red-600 hover:underline">
                                Hapus
                            </button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="text-center p-5">
                        Tidak ada data Barang
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $komoditas->links() }}
    </div>

</x-admin-layout>