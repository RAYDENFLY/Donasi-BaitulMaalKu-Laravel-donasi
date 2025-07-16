<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Donasi') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-4">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-bold">Manajemen Donasi</h2>
                    <button class="bg-green-600 text-white px-4 py-2 rounded-md">Ekspor Data</button>
                </div>

                <div class="flex flex-wrap gap-4">
                    <input type="text" placeholder="Cari Donatur" class="flex-grow min-w-[250px] border rounded-lg px-4 py-2" />
                    <button class="border rounded-lg px-4 py-2">Semua Status</button>
                    <button class="border rounded-lg px-4 py-2">Semua Metode</button>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm text-left">
                        <thead class="bg-gray-100 text-gray-600">
                            <tr>
                                <th class="px-4 py-2">Donatur</th>
                                <th class="px-4 py-2">Program</th>
                                <th class="px-4 py-2">Nominal</th>
                                <th class="px-4 py-2">Status</th>
                                <th class="px-4 py-2">Metode</th>
                                <th class="px-4 py-2">Tanggal</th>
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse ($donations as $donation)
                                <tr>
                                    <td class="px-4 py-2">{{ $donation->name }}</td>
                                    <td class="px-4 py-2">{{ ucfirst($donation->program_type) }}</td>
                                    <td class="px-4 py-2">Rp {{ number_format($donation->nominal + ($donation->kode_unik ?? 0), 0, ',', '.') }}</td>
                                    @php
                                        $statusMap = [
                                            'menunggu' => ['label' => 'Menunggu', 'bg' => 'bg-yellow-100', 'text' => 'text-yellow-800'],
                                            'berhasil' => ['label' => 'Berhasil', 'bg' => 'bg-green-100', 'text' => 'text-green-800'],
                                            'ditolak' => ['label' => 'Ditolak', 'bg' => 'bg-red-100', 'text' => 'text-red-800'],
                                        ];

                                        $status = $donation->status;
                                        $style = $statusMap[$status] ?? $statusMap['menunggu'];
                                    @endphp

                                    <td class="px-4 py-2">
                                        <span class="{{ $style['bg'] }} {{ $style['text'] }} px-2 py-1 rounded-full text-sm font-medium">
                                            {{ $style['label'] }}
                                        </span>
                                    </td>

                                    <td class="px-4 py-2">{{ $donation->payment_method }}</td>
                                    <td class="px-4 py-2">{{ $donation->created_at->format('d/m/Y') }}</td>
                                    <td class="px-4 py-2 space-x-2">
                                        <div class="flex items-center gap-2">
                                         <!-- Tombol Invoice -->
                                    <a href="{{ route('donasi.invoice', $donation->id) }}"
                                    class="text-indigo-600 hover:text-indigo-800 flex items-center gap-1 text-sm">
                                        <i class="fas fa-file-invoice"></i>
                                    </a>

                                    <!-- Dropdown Status -->
                                    <form action="{{ route('donasi.updateStatus', $donation->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" onchange="this.form.submit()" class="border rounded px-2 py-1 text-sm">
                                            <option value="menunggu" {{ $donation->status === 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                            <option value="berhasil" {{ $donation->status === 'berhasil' ? 'selected' : '' }}>Berhasil</option>
                                            <option value="ditolak" {{ $donation->status === 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                        </select>
                                    </form>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('donasi.destroy', $donation->id) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button class="text-red-600 hover:text-red-800 flex items-center gap-1 text-sm"
                                                onclick="return confirm('Yakin ingin menghapus donasi ini?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-gray-500">Belum ada donasi.</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

                <div class="flex justify-between text-sm text-gray-500 pt-4 items-center">
    <div>
        Menampilkan {{ $donations->firstItem() }}–{{ $donations->lastItem() }} dari {{ $donations->total() }} Donatur
    </div>
        <div class="flex gap-1">
            {{-- Tombol Sebelumnya --}}
            @if ($donations->onFirstPage())
                <button class="px-2 py-1 border rounded text-gray-400 cursor-not-allowed">&lt;</button>
            @else
                <a href="{{ $donations->previousPageUrl() }}" class="px-2 py-1 border rounded hover:bg-gray-100">&lt;</a>
            @endif

            {{-- Tombol Halaman --}}
            @for ($i = 1; $i <= $donations->lastPage(); $i++)
                @if ($i == $donations->currentPage())
                    <span class="px-3 py-1 bg-blue-600 text-white rounded">{{ $i }}</span>
                @else
                    <a href="{{ $donations->url($i) }}" class="px-3 py-1 border rounded hover:bg-gray-100">{{ $i }}</a>
                @endif
            @endfor

            {{-- Tombol Selanjutnya --}}
            @if ($donations->hasMorePages())
                <a href="{{ $donations->nextPageUrl() }}" class="px-2 py-1 border rounded hover:bg-gray-100">&gt;</a>
            @else
                <button class="px-2 py-1 border rounded text-gray-400 cursor-not-allowed">&gt;</button>
            @endif
        </div>
    </div>

            </div>
        </div>
    </div>
</x-app-layout>
