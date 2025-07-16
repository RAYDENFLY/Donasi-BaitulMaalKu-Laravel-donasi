<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Testimoni;

class HomeController extends Controller
{
    public function welcome()
    {
        // Ambil 3 program terbaru yang statusnya aktif
        $programs = Program::where('status', 'aktif')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $testimonis = Testimoni::latest()->take(3)->get(); // ambil 3 testimoni terbaru

        return view('welcome', compact('programs', 'testimonis'));
    }
}
