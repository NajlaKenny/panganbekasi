<x-admin-layout>

<div class="flex justify-between items-center mb-6">

<h2 class="text-2xl font-bold">
Data Komoditas
</h2>

<a href="{{ route('komoditas.create') }}"
class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">

Tambah Barang

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
<th class="p-3 text-left">Gambar</th>
<th class="p-3 text-left">Nama Barang</th>
<th class="p-3 text-left">Kategori</th>
<th class="p-3 text-right">Aksi</th>

</tr>

</thead>


<tbody>

@forelse($komoditas as $index => $item)

<tr class="border-t">

<td class="p-3">
{{ $komoditas->firstItem() + $index }}
</td>


<td class="p-3">

@if($item->gambar)

<img src="{{ asset('storage/'.$item->gambar) }}"
width="60"
class="rounded">

@else

<span class="text-gray-400">
Tidak ada gambar
</span>

@endif

</td>


<td class="p-3">

{{ $item->nama }}

</td>


<td class="p-3">

{{ $item->kategori->nama ?? '-' }}

</td>


<td class="p-3 text-right space-x-2">

<a href="{{ route('komoditas.edit',$item->id) }}"
class="text-yellow-600">

Edit

</a>


<form action="{{ route('komoditas.destroy',$item->id) }}"
method="POST"
class="inline">

@csrf
@method('DELETE')

<button
class="text-red-600"
onclick="return confirm('Yakin hapus barang?')">

Hapus

</button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="5"
class="text-center p-5 text-gray-500">

Belum ada data barang

</td>

</tr>

@endforelse

</tbody>

</table>

</div>


<div class="mt-4">

{{ $komoditas->links() }}

</div>

</x-admin-layout>