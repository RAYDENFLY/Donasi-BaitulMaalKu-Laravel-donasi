<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function index(Request $request)
{
    $query = Program::query();

    if ($request->filled('kategori')) {
        $query->where('kategori', $request->kategori);
    }

    if ($request->filled('search')) {
        $query->where('judul', 'like', '%' . $request->search . '%');
    }
    
    if ($request->sort === 'terlama') {
        $query->oldest();
    } else {
        $query->latest(); // default
    }

        // Filter lokasi
        if ($request->filled('lokasi')) {
            $query->where('lokasi', $request->lokasi);
        }

        // Ambil list lokasi dari config
        $lokasiList = collect(config('wilayah'))
            ->flatten()
            ->sort()
            ->values();




    $programs = $query->where('status', 'aktif')->latest()->paginate(9);

    return view('donasi', compact('programs', 'lokasiList'));
}

}

