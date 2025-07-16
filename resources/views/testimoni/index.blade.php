<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Daftar Testimoni') }}
        </h2>
    </x-slot>
<div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded-xl p-6">
    <div class="flex justify-between items-center mb-4">
    <h2 class="text-lg font-bold">Daftar Testimoni</h2>
    <a href="{{ route('testimoni.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Testimoni</a>
    </div>

    @if(session('success'))
    <div class="bg-green-100 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    <table class="w-full text-sm">
        <thead>
           <tr class="bg-gray-100 text-gray-700">
                <th class="py-2 px-3 text-left">Nama</th>
                <th class="py-2 px-3 text-left">Role</th>
                <th class="py-2 px-3 text-left">Text</th>
                <th class="py-2 px-3 text-left">Foto</th>
                <th class="py-2 px-3 text-left">Aksi</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($testimonis as $item)
            <tr class="border-t">
                <td>{{ $item->name }}</td>
                <td>{{ $item->role }}</td>
                <td>{{ Str::limit($item->text, 50) }}</td>
                <td>
                    @if ($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" class="w-12 h-12 rounded-full object-cover">
                    @endif
                </td>
                <td class="space-x-2">
                    <a href="{{ route('testimoni.edit', $item) }}" class="text-blue-500">Edit</a>
                    <form action="{{ route('testimoni.destroy', $item) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus?')" class="text-red-500">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</x-app-layout>
