<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengaturan Pembayaran') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Form Tambah QRIS -->
            <div class="bg-white shadow sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Tambah QRIS</h3>
                <form action="{{ route('payment.qris.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jenis Program</label>
                        <select name="program_type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="">Pilih jenis</option>
                            <option value="zakat">Zakat</option>
                            <option value="infaq">Infaq</option>
                            <option value="wakaf">Wakaf</option>
                            <option value="sedekah">Sedekah</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Upload QRIS</label>
                        <input type="file" name="qris_image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 mt-8 rounded-md">Simpan QRIS</button>
                </form>
            </div>

            <!-- Form Tambah Bank -->
            <div class="bg-white shadow sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Tambah Bank</h3>
               <form action="{{ route('payment.bank.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Upload Logo Bank</label>
                        <input type="file" name="logo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Bank</label>
                        <input type="text" name="bank_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Contoh: BCA, Mandiri">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nomor Rekening</label>
                        <input type="text" name="account_number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="1234567890">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Atas Nama</label>
                        <input type="text" name="account_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Nama Pemilik Rekening">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jenis Program</label>
                        <select name="program_type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="">Pilih jenis</option>
                            <option value="zakat">Zakat</option>
                            <option value="infaq">Infaq</option>
                            <option value="wakaf">Wakaf</option>
                            <option value="sedekah">Sedekah</option>
                        </select>
                    </div>

                    <button type="submit" class="bg-green-600 text-white px-4 py-2 mt-8 rounded-md">Simpan Bank</button>
                </form>
            </div>

            <!-- List Metode Pembayaran -->
            <div class="bg-white shadow sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Daftar Metode Pembayaran</h3>
                <div class="grid md:grid-cols-2 gap-4">

                    <!-- Tampilkan QRIS dari database -->
                    @foreach($qrisList as $qris)
                        <div class="border p-4 rounded-md">
                            <p class="font-medium text-gray-800">QRIS - {{ ucfirst($qris->program_type) }}</p>
                            <img src="{{ asset('storage/' . $qris->image_path) }}" alt="QRIS {{ $qris->program_type }}" class="w-32 mt-2">
                            <form action="{{ route('payment.deleteQris', $qris->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus QRIS ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="mt-2 text-red-600 text-sm">Hapus</button>
                            </form>
                        </div>
                    @endforeach

                    <!-- Tampilkan Rekening Bank dari database -->
                    @foreach($bankAccounts as $bank)
                        <div class="border p-4 rounded-md">
                            @if($bank->logo_path)
                                <img src="{{ asset('storage/' . $bank->logo_path) }}" alt="Logo {{ $bank->bank_name }}" class="w-16 mb-2">
                            @endif

                            <p class="font-medium text-gray-800">{{ $bank->bank_name }} - {{ $bank->account_number }}</p>
                            <p class="text-sm text-gray-600">a.n {{ $bank->account_name }}</p>
                            
                            @if($bank->program_type)
                                <p class="text-sm text-gray-500 italic">Jenis: {{ ucfirst($bank->program_type) }}</p>
                            @endif

                            <form action="{{ route('payment.deleteBank', $bank->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus rekening ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="mt-2 text-red-600 text-sm">Hapus</button>
                            </form>
                        </div>
                    @endforeach


                </div>
            </div>


        </div>
    </div>
</x-app-layout>
