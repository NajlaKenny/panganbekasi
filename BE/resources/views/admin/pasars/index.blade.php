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
        <form method="GET" action="{{ route('pasars.index') }}">
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Cari nama pasar..."
                   class="w-full border rounded-lg px-3 py-2">
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
                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">
                                    Aktif
                                </span>
                            @else
                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full">
                                    Tidak Aktif
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-gray-500">
                            {{ $pasar->created_at->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('pasars.edit', $pasar) }}" 
                               class="text-indigo-600 hover:underline mr-3">
                                Edit
                            </a>

                            <form action="{{ route('pasars.destroy', $pasar) }}" 
                                  method="POST" class="inline"
                                  onsubmit="return confirm('Yakin hapus data?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:underline">
                                    Hapus
                                </button>
                            </form>
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