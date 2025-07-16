<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Manajemen Program') }}
        </h2>
    </x-slot>

    <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-extrabold leading-tight text-black">Manajemen Program</h1>
            <a href="{{ route('program.create') }}" class="flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white font-medium text-base rounded-lg px-6 py-3">
                <i class="fas fa-plus"></i> Tambah Program
            </a>
        </div>

        <section class="bg-white rounded-lg shadow-sm">
            <div class="flex flex-col md:flex-row gap-4 p-4">
                <input type="text" class="flex-1 border border-gray-400 rounded-lg px-5 py-3 text-base placeholder:text-black placeholder:font-normal" placeholder="Cari Program">
                <button class="border border-gray-400 rounded-lg px-6 py-3 text-base font-normal" type="button">Semua Kategori</button>
                <button class="border border-gray-400 rounded-lg px-6 py-3 text-base font-normal" type="button">Semua Status</button>
            </div>

            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-left text-base font-normal text-gray-900">
                        <th class="py-3 px-6 rounded-tl-lg">Judul Program</th>
                        <th class="py-3 px-6">Target</th>
                        <th class="py-3 px-6">Terkumpul</th>
                        <th class="py-3 px-6">Status</th>
                        <th class="py-3 px-6 rounded-tr-lg">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($programs as $program)
                    <tr class="border-t border-gray-300">
                        <td class="py-4 px-6">{{ $program->judul }}</td>
                        <td class="py-4 px-6">Rp. {{ number_format($program->target, 0, ',', '.') }}</td>
                        <td class="py-4 px-6">Rp. {{ number_format($program->terkumpul, 0, ',', '.') }}</td>
                        <td class="py-4 px-6">

                        @php
                            $statusColors = [
                                'aktif' => 'bg-green-200 text-green-800',
                                'pending' => 'bg-yellow-200 text-yellow-800',
                                'nonaktif' => 'bg-red-200 text-red-800',
                            ];
                            $colorClass = $statusColors[$program->status] ?? 'bg-gray-200 text-gray-800';
                        @endphp
                            <span class="{{ $colorClass }} rounded-full px-3 py-1 text-sm font-normal">
                                {{ ucfirst($program->status) }}
                            </span>
                        </td>
                       <td class="py-4 px-6 flex gap-3">
                      <!-- Tombol Edit -->
                        <a href="{{ route('program.edit', $program) }}" class="text-blue-600 hover:text-blue-800">
                            <i class="fas fa-edit text-lg"></i>
                        </a>

                        <!-- Tombol Close Campaign (jika status masih aktif) -->
                        @if($program->status === 'aktif')
                            <form action="{{ route('program.close', $program) }}" method="POST" onsubmit="return confirm('Yakin ingin menutup campaign ini?')">
                                @csrf
                                <button type="submit" class="text-yellow-600 hover:text-yellow-800" title="Close Campaign">
                                    <i class="fas fa-times-circle text-lg"></i>
                                </button>
                            </form>
                        @endif

                            <!-- Tombol Aktifkan Campaign (jika status pending/nonaktif) -->
                        @if(in_array($program->status, ['pending', 'nonaktif']))
                            <form action="{{ route('program.activate', $program) }}" method="POST" onsubmit="return confirm('Yakin ingin mengaktifkan campaign ini?')">
                                @csrf
                                <button type="submit" class="text-green-600 hover:text-green-800" title="Aktifkan Campaign">
                                    <i class="fas fa-check-circle text-lg"></i>
                                </button>
                            </form>
                        @endif


                        <!-- Tombol Delete -->
                        <form action="{{ route('program.destroy', $program) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus program ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">
                                <i class="fas fa-trash-alt text-lg"></i>
                            </button>
                        </form>
                    </td>


                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-6 text-gray-500">Belum ada program tersedia.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-6 px-6">
                {{ $programs->links() }}
            </div>
        </section>
    </div>
</x-app-layout>
