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

// API method untuk program show
public function apiShow($id)
{
    try {
        $program = Program::findOrFail($id);
        
        // Hilangkan kondisi infaq untuk test
        $programType = 'infaq'; // bisa dari parameter atau config
        $qrisList = QrisPayment::where('program_type', $programType)->get();
        $bankAccounts = BankAccount::where('program_type', $programType)->get();

        return response()->json([
            'success' => true,
            'data' => [
                'program' => $program,
                'qris_list' => $qrisList,
                'bank_accounts' => $bankAccounts
            ]
        ], 200)->header('Access-Control-Allow-Origin', '*');
        
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Program tidak ditemukan'
        ], 404)->header('Access-Control-Allow-Origin', '*');
    }
}

// API method untuk list semua program
public function apiIndex(Request $request)
{
    try {
        $perPage = $request->get('per_page', 10);
        $programs = Program::paginate($perPage);
        
        return response()->json([
            'success' => true,
            'data' => $programs
        ], 200)->header('Access-Control-Allow-Origin', '*');
        
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal mengambil data program'
        ], 500)->header('Access-Control-Allow-Origin', '*');
    }
}

// API method untuk zakat
public function apiZakat($jenis = 'maal')
{
    try {
        // Pastikan jenis view valid
        $availableViews = ['maal', 'agricultural', 'gold', 'trade', 'income'];
        
        if (!in_array($jenis, $availableViews)) {
            return response()->json([
                'success' => false,
                'message' => 'Jenis zakat tidak valid'
            ], 404)->header('Access-Control-Allow-Origin', '*');
        }
        
        $programType = 'zakat'; // Pastikan programType = 'Zakat'
        
        // Ambil semua QRIS dan bank yang program_type-nya 'Akat'
        $qrisList = QrisPayment::where('program_type', $programType)->get();
        $bankAccounts = BankAccount::where('program_type', $programType)->get();

        return response()->json([
            'success' => true,
            'data' => [
                'jenis' => $jenis,
                'program_type' => $programType,
                'qris_list' => $qrisList,
                'bank_accounts' => $bankAccounts
            ]
        ], 200)->header('Access-Control-Allow-Origin', '*');
        
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal mengambil data zakat'
        ], 500)->header('Access-Control-Allow-Origin', '*');
    }
}

// API khusus untuk company profile - menampilkan campaign untuk di-embed
public function apiCampaigns(Request $request)
{
    try {
        $limit = $request->get('limit', 6); // Default 6 campaign
        $status = $request->get('status', 'aktif'); // Default hanya yang aktif
        $baseUrl = $request->get('base_url', request()->getSchemeAndHttpHost()); // URL website donasi
        
        $programs = Program::where('status', $status)
                          ->latest()
                          ->limit($limit)
                          ->get();

        $campaignData = $programs->map(function ($program) use ($baseUrl) {
            return [
                'id' => $program->id,
                'title' => $program->judul,
                'description' => $program->deskripsi,
                'short_description' => substr(strip_tags($program->deskripsi), 0, 150) . '...',
                'category' => $program->kategori,
                'location' => $program->lokasi . ', ' . $program->provinsi,
                'target' => $program->target,
                'target_formatted' => 'Rp ' . number_format($program->target, 0, ',', '.'),
                'image' => $program->gambar ? asset('storage/' . $program->gambar) : null,
                'status' => $program->status,
                'donation_url' => $baseUrl . '/program/' . $program->id, // URL untuk redirect donasi
                'created_at' => $program->created_at->format('Y-m-d H:i:s'),
            ];
        });

        return response()->json([
            'success' => true,
            'data' => [
                'campaigns' => $campaignData,
                'total' => $campaignData->count(),
                'website_info' => [
                    'name' => 'Donasi BaitulMaal Ku',
                    'base_url' => $baseUrl,
                    'donation_base_url' => $baseUrl . '/program/'
                ]
            ]
        ], 200)->header('Access-Control-Allow-Origin', '*');
        
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal mengambil data campaign'
        ], 500)->header('Access-Control-Allow-Origin', '*');
    }
}

// API untuk get campaign featured (untuk homepage company profile)
public function apiFeaturedCampaigns(Request $request)
{
    try {
        $limit = $request->get('limit', 3); // Default 3 featured campaign
        $baseUrl = $request->get('base_url', request()->getSchemeAndHttpHost());
        
        // Ambil campaign berdasarkan target terbesar atau yang terbaru
        $programs = Program::where('status', 'aktif')
                          ->orderBy('target', 'desc') // atau bisa orderBy('created_at', 'desc')
                          ->limit($limit)
                          ->get();

        $featuredData = $programs->map(function ($program) use ($baseUrl) {
            return [
                'id' => $program->id,
                'title' => $program->judul,
                'description' => substr(strip_tags($program->deskripsi), 0, 100) . '...',
                'category' => $program->kategori,
                'location' => $program->lokasi . ', ' . $program->provinsi,
                'target' => $program->target,
                'target_formatted' => 'Rp ' . number_format($program->target, 0, ',', '.'),
                'image' => $program->gambar ? asset('storage/' . $program->gambar) : null,
                'donation_url' => $baseUrl . '/program/' . $program->id,
                'cta_text' => 'Donasi Sekarang'
            ];
        });

        return response()->json([
            'success' => true,
            'data' => [
                'featured_campaigns' => $featuredData,
                'total' => $featuredData->count()
            ]
        ], 200)->header('Access-Control-Allow-Origin', '*');
        
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal mengambil featured campaign'
        ], 500)->header('Access-Control-Allow-Origin', '*');
    }
}

}
