<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Program') }}
        </h2>
    </x-slot>

    <div class="py-10 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded-xl p-6">
            <!-- Alert batas upload gambar -->
            <div class="mb-4 p-4 rounded-md bg-yellow-100 border border-yellow-400 text-yellow-700 text-sm">
                Maksimal ukuran file gambar adalah <b>2MB</b>. Semua field bertanda * wajib diisi.
            </div>
            @if ($errors->any())
                <div class="mb-4 p-4 rounded-md bg-red-100 border border-red-400 text-red-700 text-sm">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('program.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div id="alert-box" class="hidden mb-4 p-4 rounded-md bg-red-100 border border-red-400 text-red-700 text-sm"></div>
                <!-- Modal Notifikasi -->
                <div id="modal-oversize" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 hidden">
                    <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full text-center">
                        <div class="mb-4 text-red-600 text-lg font-semibold">
                            Ukuran file terlalu besar!
                        </div>
                        <div class="mb-4 text-gray-700 text-sm">
                            File gambar yang Anda pilih melebihi 2MB. Silakan pilih file lain dengan ukuran maksimal 2MB.
                        </div>
                        <button id="modal-close-btn" type="button" class="mt-2 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 focus:outline-none">
                            OK
                        </button>
                    </div>
                </div>
                <div>
                    <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Nama Program <span class="text-red-500">*</span></label>
                    <input type="text" name="judul" id="judul" required
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm focus:ring-2 focus:ring-green-400 focus:border-green-500 transition duration-150 sm:text-sm bg-gray-50" />
                    <div id="judul-error" class="text-red-600 text-xs mt-1 hidden"></div>
                </div>

                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi <span class="text-red-500">*</span></label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" required
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm focus:ring-2 focus:ring-green-400 focus:border-green-500 transition duration-150 sm:text-sm bg-gray-50"></textarea>
                    <button type="button" id="generate-deskripsi-btn" class="mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-xs">Generate Deskripsi AI</button>
                    <span id="ai-loading" class="ml-2 text-xs text-gray-500 hidden">Menghasilkan deskripsi...</span>
                    <div id="deskripsi-error" class="text-red-600 text-xs mt-1 hidden"></div>
                </div>

                <div>
                    <label for="provinsi" class="block text-sm font-medium text-gray-700 mb-1">Provinsi <span class="text-red-500">*</span></label>
                    <select id="provinsi" name="provinsi"
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm focus:ring-2 focus:ring-green-400 focus:border-green-500 transition duration-150 sm:text-sm bg-gray-50">
                        <option value="">-- Pilih Provinsi --</option>
                        @foreach ($wilayahList as $provinsi => $kotaList)
                            <option value="{{ $provinsi }}">{{ $provinsi }}</option>
                        @endforeach
                    </select>
                    <div id="provinsi-error" class="text-red-600 text-xs mt-1 hidden"></div>
                </div>

                <div>
                    <label for="lokasi" class="block text-sm font-medium text-gray-700 mb-1">Kota/Kabupaten <span class="text-red-500">*</span></label>
                    <select name="lokasi" id="lokasi" required
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm focus:ring-2 focus:ring-green-400 focus:border-green-500 transition duration-150 sm:text-sm bg-gray-50">
                        <option value="">-- Pilih Kota/Kabupaten --</option>
                    </select>
                    <div id="lokasi-error" class="text-red-600 text-xs mt-1 hidden"></div>
                </div>

                <div>
                    <label for="target" class="block text-sm font-medium text-gray-700 mb-1">Target Penghimpunan <span class="text-red-500">*</span></label>
                    <div class="flex items-center mt-1">
                        <span class="inline-block px-3 py-2 bg-gray-200 text-gray-700 rounded-l-lg border border-gray-300 border-r-0 text-sm select-none">Rp</span>
                        <input type="number" name="target" id="target" required min="0" step="1"
                            class="block w-full rounded-r-lg border border-gray-300 px-4 py-2 shadow-sm focus:ring-2 focus:ring-green-400 focus:border-green-500 transition duration-150 sm:text-sm bg-gray-50" />
                    </div>
                    <div id="target-error" class="text-red-600 text-xs mt-1 hidden"></div>
                </div>

                <div>
                    <label for="kategori" class="block text-sm font-medium text-gray-700 mb-1">Kategori <span class="text-red-500">*</span></label>
                    <select name="kategori" id="kategori" required
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm focus:ring-2 focus:ring-green-400 focus:border-green-500 transition duration-150 sm:text-sm bg-gray-50">
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Pendidikan">Pendidikan</option>
                        <option value="Kesehatan">Kesehatan</option>
                        <option value="Pembangunan">Pembangunan</option>
                        <option value="Sosial">Sosial</option>
                        <option value="Dakwah">Dakwah</option>
                        <option value="Kemanusiaan">Kemanusiaan</option>
                    </select>
                    <div id="kategori-error" class="text-red-600 text-xs mt-1 hidden"></div>
                </div>

                <div>
                    <label for="gambar" class="block text-sm font-medium text-gray-700 mb-1">Upload Gambar <span class="text-red-500">*</span></label>
                    <input type="file" name="gambar" id="gambar" accept="image/*"
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-4 py-2 bg-white text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-600 file:text-white hover:file:bg-green-700 transition duration-150" />
                    <p class="text-xs text-gray-500 mt-1">Ukuran maksimal file: 2MB. Format: jpg, jpeg, png.</p>
                    <div id="gambar-error" class="text-red-600 text-xs mt-1 hidden"></div>
                </div>
    <!-- Modal Error Popup -->
    <div id="modal-error" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full text-center">
            <div class="mb-4 text-red-600 text-lg font-semibold">
                Terjadi kesalahan!
            </div>
            <div id="modal-error-msg" class="mb-4 text-gray-700 text-sm"></div>
            <button id="modal-error-close" type="button" class="mt-2 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 focus:outline-none">
                OK
            </button>
        </div>
    </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="inline-flex items-center px-6 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <i class="fas fa-plus mr-2"></i> Tambah Program
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
    // AI Groq Generate Deskripsi
    document.getElementById('generate-deskripsi-btn').addEventListener('click', async function() {
        const judul = document.getElementById('judul').value.trim();
        const deskripsi = document.getElementById('deskripsi');
        const loading = document.getElementById('ai-loading');
        if (!judul) {
            alert('Isi judul program terlebih dahulu!');
            return;
        }
        loading.classList.remove('hidden');
        this.disabled = true;
        try {
            const response = await fetch('https://api.groq.com/openai/v1/chat/completions', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer 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'
                },
                body: JSON.stringify({
                    model: 'meta-llama/llama-4-scout-17b-16e-instruct',
                    messages: [
                        {"role": "system", "content": "Kamu adalah AI copywriter campaign donasi. Buat deskripsi campaign donasi yang menarik, informatif, dan mengajak orang berdonasi. Panjang minimal 100 kata, gunakan bahasa Indonesia yang baik dan sopan. Jangan menulis format list, call-to-action, info rekening, link donasi, atau instruksi seperti 'Donasi Sekarang', 'Transfer Bank', 'Donasi Online', dan jangan gunakan tanda * atau ** di awal kalimat."},
                        {"role": "user", "content": `Judul campaign: ${judul}`}
                    ],
                    max_tokens: 512,
                    temperature: 0.7
                })
            });
            const data = await response.json();
            if (data.choices && data.choices[0] && data.choices[0].message && data.choices[0].message.content) {
                deskripsi.value = data.choices[0].message.content.trim();
            } else {
                alert('Gagal mendapatkan deskripsi dari AI.');
            }
        } catch (err) {
            alert('Terjadi kesalahan koneksi ke AI.');
        }
        loading.classList.add('hidden');
        this.disabled = false;
    });
    const wilayahData = @json($wilayahList);

    document.getElementById('provinsi').addEventListener('change', function () {
        const selectedProvinsi = this.value;
        const kotaSelect = document.getElementById('lokasi');
        kotaSelect.innerHTML = '<option value="">-- Pilih Kota/Kabupaten --</option>';

        if (wilayahData[selectedProvinsi]) {
            wilayahData[selectedProvinsi].forEach(function (kota) {
                const option = document.createElement('option');
                option.value = kota;
                option.text = kota;
                kotaSelect.appendChild(option);
            });
        }
    });
</script>

    <script>
    const form = document.querySelector('form');
    const alertBox = document.getElementById('alert-box');

    form.addEventListener('submit', function(e) {
        alertBox.classList.add('hidden');
        alertBox.innerHTML = '';

        let errors = [];

        // Ambil semua input dan error div
        const judul = document.getElementById('judul').value.trim();
        const deskripsi = document.getElementById('deskripsi').value.trim();
        const provinsi = document.getElementById('provinsi').value.trim();
        const lokasi = document.getElementById('lokasi').value.trim();
        const target = document.getElementById('target').value.trim();
        const kategori = document.getElementById('kategori').value.trim();
        const gambarInput = document.getElementById('gambar');
        const judulError = document.getElementById('judul-error');
        const deskripsiError = document.getElementById('deskripsi-error');
        const provinsiError = document.getElementById('provinsi-error');
        const lokasiError = document.getElementById('lokasi-error');
        const targetError = document.getElementById('target-error');
        const kategoriError = document.getElementById('kategori-error');
        const gambarError = document.getElementById('gambar-error');
        const modalError = document.getElementById('modal-error');
        const modalErrorMsg = document.getElementById('modal-error-msg');
        const modalErrorClose = document.getElementById('modal-error-close');

        // Reset semua error
        [judulError, deskripsiError, provinsiError, lokasiError, targetError, kategoriError, gambarError].forEach(function(el) {
            el.classList.add('hidden');
            el.innerHTML = '';
        });
        alertBox.classList.add('hidden');
        alertBox.innerHTML = '';

        // Validasi judul
        if (!judul) {
            errors.push('Nama Program wajib diisi.');
            judulError.innerHTML = 'Nama Program wajib diisi.';
            judulError.classList.remove('hidden');
        }
        // Validasi deskripsi
        if (!deskripsi) {
            errors.push('Deskripsi wajib diisi.');
            deskripsiError.innerHTML = 'Deskripsi wajib diisi.';
            deskripsiError.classList.remove('hidden');
        }
        // Validasi provinsi
        if (!provinsi) {
            errors.push('Provinsi wajib diisi.');
            provinsiError.innerHTML = 'Provinsi wajib diisi.';
            provinsiError.classList.remove('hidden');
        }
        // Validasi lokasi
        if (!lokasi) {
            errors.push('Kota/Kabupaten wajib diisi.');
            lokasiError.innerHTML = 'Kota/Kabupaten wajib diisi.';
            lokasiError.classList.remove('hidden');
        }
        // Validasi target
        if (!target || isNaN(cleanRupiah(target))) {
            errors.push('Target harus diisi dengan angka.');
            targetError.innerHTML = 'Target harus diisi dengan angka.';
            targetError.classList.remove('hidden');
        }
        // Validasi kategori
        if (!kategori) {
            errors.push('Kategori wajib diisi.');
            kategoriError.innerHTML = 'Kategori wajib diisi.';
            kategoriError.classList.remove('hidden');
        }
        // Validasi gambar
        if (gambarInput.files.length === 0) {
            errors.push('Gambar wajib diupload.');
            gambarError.innerHTML = 'Gambar wajib diupload.';
            gambarError.classList.remove('hidden');
        } else if (gambarInput.files[0].size > 2 * 1024 * 1024) {
            errors.push('Ukuran gambar harus di bawah 2MB.');
            gambarError.innerHTML = 'Ukuran gambar harus di bawah 2MB.';
            gambarError.classList.remove('hidden');
        }

        if (errors.length > 0) {
            e.preventDefault();
            // Tampilkan modal error
            modalErrorMsg.innerHTML = errors.join('<br>');
            modalError.classList.remove('hidden');
            // Fokus tombol OK
            modalErrorClose.focus();
        }
        // Hilangkan format pada target sebelum submit
        targetInput.value = cleanRupiah(targetInput.value);

        // Pastikan value yang dikirim ke backend adalah angka murni
        // Jika menggunakan FormData, bisa juga:
        // form.elements['target'].value = cleanRupiah(form.elements['target'].value);

        // Tutup modal error
        modalErrorClose.onclick = function() {
            modalError.classList.add('hidden');
        };
        modalError.onclick = function(event) {
            if (event.target === modalError) {
                modalError.classList.add('hidden');
            }
        };
    });
</script>

    <script>
    // ...existing code...
</script>

    <script>
    document.getElementById('gambar').addEventListener('change', function(e) {
        const modal = document.getElementById('modal-oversize');
        const closeBtn = document.getElementById('modal-close-btn');
        if (this.files.length > 0 && this.files[0].size > 2 * 1024 * 1024) {
            // Reset input
            this.value = '';
            // Show modal
            modal.classList.remove('hidden');
            // Focus OK button
            closeBtn.focus();
        }
        closeBtn.onclick = function() {
            modal.classList.add('hidden');
        };
        // Optional: close modal on background click
        modal.onclick = function(event) {
            if (event.target === modal) {
                modal.classList.add('hidden');
            }
        };
    });
</script>

</x-app-layout>
