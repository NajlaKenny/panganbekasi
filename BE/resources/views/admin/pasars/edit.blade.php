<x-app-layout>
    <form method="POST" action="{{ route('pasars.update', $pasar->id) }}">
        @csrf
        @method('PUT')

        <input type="text" name="nama" value="{{ $pasar->nama }}" class="border p-2">

        <button class="bg-yellow-500 text-white px-3 py-2">Update</button>
    </form>
</x-app-layout>