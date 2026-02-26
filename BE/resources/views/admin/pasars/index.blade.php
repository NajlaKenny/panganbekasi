<x-admin-layout>
    <!-- Page Header -->
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-4 sm:space-y-0">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Data Pasar</h2>
            <p class="text-gray-500 mt-1">Kelola data pasar yang tersedia.</p>
        </div>
        <a href="{{ route('pasars.create') }}"
            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">
            + Tambah Pasar
        </a>
    </div>

    <!-- Search -->
    <div class="bg-white rounded-xl border border-gray-100 p-4 mb-6 shadow-sm">
        <form method="GET" action="{{ route('pasars.index') }}" class="flex gap-2">

            <!-- Input -->
            <input type="text" name="search" value="{{ request('search') }}"
                placeholder="Cari nama atau alamat pasar..."
                class="w-full border border-gray-200 rounded-lg px-4 py-2 focus:ring focus:ring-blue-100 focus:outline-none">

            <!-- Tombol Cari -->
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Cari
            </button>

            <!-- Tombol Reset -->
            <a href="{{ route('pasars.index') }}"
                class="px-4 py-2 rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-100 transition">
                Reset
            </a>

        </form>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl border shadow-sm overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50 text-xs text-gray-500 uppercase">
                <tr>
                    <th class="px-6 py-4 text-left">Nama Pasar</th>
                    <th class="px-6 py-4 text-left">Alamat</th>
                    <th class="px-6 py-4 text-left">Status</th>
                    <th class="px-6 py-4 text-left">Dibuat</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($pasars as $pasar)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ $pasar->nama }}
                        </td>
                        <td class="px-6 py-4 text-gray-600">
                            {{ $pasar->alamat }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($pasar->status == 'aktif')
                                <span
                                    class="inline-flex items-center px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">
                                    Aktif
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full">
                                    Tidak Aktif
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-gray-500">
                            {{ $pasar->created_at->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end items-center gap-2">

                                <!-- Edit -->
                                <a href="{{ route('pasars.edit', $pasar) }}"
                                    class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-indigo-600 bg-indigo-50 rounded-lg hover:bg-indigo-100 transition">
                                    Edit
                                </a>

                                <!-- Delete -->
                                <form action="{{ route('pasars.destroy', $pasar) }}" method="POST"
                                    onsubmit="return confirm('Yakin hapus data ini?')" class="inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition">
                                        Hapus
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-10 text-gray-500">
                            Tidak ada data pasar
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="p-4">
            {{ $pasars->links() }}
        </div>
    </div>
</x-admin-layout>
