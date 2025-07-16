<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Program; // Tambahkan ini di atas

class DonationController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'nullable|string|max:255',
        'program_type' => 'required|string',
        'hide_name' => 'nullable',
        'whatsapp' => 'required|string',
        'email' => 'required|email',
        'nominal' => 'required|numeric',
        'payment_method' => 'required|string',
        'doa' => 'nullable|string',
        'kode_unik' => 'nullable|numeric|min:0|max:999', // tambahkan validasi kode_unik
    ]);

    // Gunakan kode unik dari request jika ada, jika tidak generate random
    $kodeUnik = $request->filled('kode_unik') ? intval($request->kode_unik) : rand(100, 999);
    $validated['status'] = 'menunggu';

    // Hitung total donasi
    $validated['kode_unik'] = $kodeUnik;
    $validated['total_donasi'] = $validated['nominal'] + $kodeUnik;

    if ($request->has('hide_name')) {
        $validated['name'] = 'Hamba Allah';
    }

    $donation = \App\Models\Donation::create($validated);

    // Jika donasi langsung berstatus berhasil, update terkumpul
    if ($donation->status === 'berhasil') {
        $program = Program::where('judul', $donation->program_type)->first();
        if ($program) {
            $program->terkumpul += $donation->total_donasi;
            $program->save();
        }
    }

    return redirect()->route('donasi.invoice', ['id' => $donation->id]);
}


public function invoice($id)
{
    $donation = \App\Models\Donation::findOrFail($id);
    return view('donasi.invoice', compact('donation'));
}

public function updateStatus(Request $request, $id)
{
    $validated = $request->validate([
        'status' => 'required|in:menunggu,berhasil,ditolak',
    ]);

    $donation = \App\Models\Donation::findOrFail($id);
    $oldStatus = $donation->status;
    $donation->status = $validated['status'];
    $donation->save();

    // Update program->terkumpul jika status berubah
    $program = Program::where('judul', $donation->program_type)->first();
    if ($program) {
        // Jika status berubah ke berhasil dan sebelumnya bukan berhasil, tambahkan
        if ($oldStatus !== 'berhasil' && $donation->status === 'berhasil') {
            $program->terkumpul += $donation->total_donasi;
            $program->save();
        }
        // Jika status berubah dari berhasil ke status lain, kurangi
        if ($oldStatus === 'berhasil' && $donation->status !== 'berhasil') {
            $program->terkumpul -= $donation->total_donasi;
            if ($program->terkumpul < 0) $program->terkumpul = 0;
            $program->save();
        }
    }

    return redirect()->back()->with('success', 'Status donasi berhasil diperbarui.');
}


public function manage()
{
    $donations = Donation::latest()->paginate(10); // atau ->get() jika tanpa pagination
    return view('donasi.manage', compact('donations'));
}

public function laporanBerhasil()
{
    $verifiedDonations = Donation::where('status', 'berhasil')
        ->orderByDesc('created_at')
        ->get();

    return view('reports.laporan', compact('verifiedDonations'));
}

public function crmIndex(Request $request)
{
    $query = \App\Models\Donation::query()
        ->select('name', 'email', 'whatsapp')
        ->groupBy('name', 'email', 'whatsapp')
        ->selectRaw('SUM(total_donasi) as total_donasi, COUNT(*) as jumlah_transaksi');

    if ($request->filled('search')) {
        $search = $request->search;
        $query->havingRaw('LOWER(name) LIKE ? OR LOWER(email) LIKE ? OR whatsapp LIKE ?', [
            '%' . strtolower($search) . '%',
            '%' . strtolower($search) . '%',
            '%' . $search . '%',
        ]);
    }

    if ($request->sort == 'oldest') {
        $query->orderByRaw('MIN(created_at) asc');
    } elseif ($request->sort == 'highest') {
        $query->orderByDesc('total_donasi');
    } else {
        $query->orderByRaw('MAX(created_at) desc');
    }

    $donors = $query->get();

    return view('crm.index', compact('donors'));
}


public function destroy($id)
{
    $donation = Donation::findOrFail($id);
    $donation->delete();

    return redirect()->back()->with('success', 'Donasi berhasil dihapus.');
}


}
