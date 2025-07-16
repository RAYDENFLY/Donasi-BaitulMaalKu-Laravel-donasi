<x-app-layout>
      <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Daftar Testimoni') }}
        </h2>
    </x-slot>
<div class="py-10 max-w-4xl mx-auto sm:px-6 lg:px-8">
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-lg font-semibold mb-4">Tambah Testimoni</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('testimoni.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 font-medium">Nama</label>
            <input type="text" name="name" class="w-full border px-3 py-2 rounded" value="{{ old('name') }}" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Role / Jabatan (opsional)</label>
            <input type="text" name="role" class="w-full border px-3 py-2 rounded" value="{{ old('role') }}">
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Isi Testimoni</label>
            <textarea name="text" rows="4" class="w-full border px-3 py-2 rounded" required>{{ old('text') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Foto (opsional)</label>
            <input type="file" name="image" accept="image/*" class="block w-full">
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('testimoni.index') }}" class="text-gray-600 hover:underline">← Kembali</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Simpan Testimoni
            </button>
        </div>
    </form>
</div>
</x-app-layout>