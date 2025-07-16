<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; // di atas
use App\Models\QrisPayment;
use App\Models\BankAccount;


class ProgramController extends Controller
{

        public function index()
    {
        $programs = Program::paginate(10);
        return view('program.index', compact('programs'));
    }

    public function create()
    {
    $wilayahList = config('wilayah');
    return view('program.create', compact('wilayahList'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'provinsi'  => 'required|string|max:255',
            'lokasi'    => 'required|string|max:255',
            'kategori'  => 'required|string|max:255',
            'target'    => 'required|numeric',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('programs', 'public');
        }

        Program::create([
            'judul'     => $request->judul,
            'slug'      => Str::slug($request->judul),
            'kategori'  => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'provinsi'  => $request->provinsi,
            'lokasi'    => $request->lokasi,
            'target'    => $request->target,
            'gambar'    => $gambarPath,
        ]);

        return redirect()->route('program.index')->with('success', 'Program berhasil ditambahkan.');
    }


        public function edit($id)
    {
        $program = Program::findOrFail($id);
            $wilayahList = config('wilayah');
        return view('program.edit', compact('program', 'wilayahList'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'provinsi'  => 'required|string|max:255', // ditambahkan
            'lokasi'    => 'required|string|max:255',
            'kategori'  => 'required|string|max:255', // ditambahkan
            'target'    => 'required|numeric',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);


        $program = Program::findOrFail($id);

        if ($request->hasFile('gambar')) {
            if ($program->gambar && Storage::disk('public')->exists($program->gambar)) {
                Storage::disk('public')->delete($program->gambar);
            }
            $gambarPath = $request->file('gambar')->store('programs', 'public');
        } else {
            $gambarPath = $program->gambar;
        }

        $program->update([
            'judul'     => $request->judul,
            'slug'      => Str::slug($request->judul),
            'kategori'  => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'provinsi'  => $request->provinsi, // ditambahkan
            'lokasi'    => $request->lokasi,
            'target'    => $request->target,
            'gambar'    => $gambarPath,
        ]);



        return redirect()->route('program.index')->with('success', 'Program berhasil diperbarui.');
    }

    public function destroy(Program $program)
    {
        $program->delete();
        return redirect()->route('program.index')->with('success', 'Program berhasil dihapus.');
    }

        public function close(Program $program)
    {
        $program->status = 'nonaktif';
        $program->save();

        return redirect()->route('program.index')->with('success', 'Campaign berhasil ditutup.');
    }
    public function activate(Program $program)
    {
        $program->update(['status' => 'aktif']);
        return redirect()->route('program.index')->with('success', 'Campaign berhasil diaktifkan.');
    }

public function show($id)
{
    $program = Program::findOrFail($id);

    // Hilangkan kondisi infaq untuk test
    $programType = 'infaq'; // bisa dari parameter atau config
    $qrisList = QrisPayment::where('program_type', $programType)->get();
    $bankAccounts = BankAccount::where('program_type', $programType)->get();

    return view('program.show', compact('program', 'qrisList', 'bankAccounts'));
}

public function zakat($jenis = 'maal') // default ke maal
{
    // Pastikan jenis view valid
    $availableViews = ['maal', 'agricultural', 'gold', 'trade', 'income'];
    abort_unless(in_array($jenis, $availableViews), 404);
    $programType = 'zakat'; // Pastikan programType = 'Zakat'
    
    // Ambil semua QRIS dan bank yang program_type-nya 'Zakat'
    $qrisList = QrisPayment::where('program_type', $programType)->get();
    $bankAccounts = BankAccount::where('program_type', $programType)->get();

    return view("zakat.$jenis", compact('qrisList', 'bankAccounts', 'programType','jenis'));
}


    

}
