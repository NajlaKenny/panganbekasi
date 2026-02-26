<x-admin-layout>

<div class="flex justify-between mb-6">

<h2 class="text-2xl font-bold">
Data Kategori
</h2>

<a href="{{ route('kategori.create') }}"
class="bg-indigo-600 text-white px-4 py-2 rounded">

Tambah Kategori

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

@forelse($kategoris as $kategori)

<tr class="border-t">

<td class="p-3">

{{ $kategori->nama }}

</td>


<td class="p-3 text-right">

<a href="{{ route('kategori.edit',$kategori) }}"
class="text-indigo-600 mr-3">

Edit

</a>


<form action="{{ route('kategori.destroy',$kategori) }}"
method="POST"
class="inline">

@csrf
@method('DELETE')

<button class="text-red-600">

Hapus

</button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="2" class="text-center p-5">

Tidak ada data kategori

</td>

</tr>

@endforelse

</tbody>

</table>

<div class="mt-4">

{{ $kategoris->links() }}

</div>

</x-admin-layout>