<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Program;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
{
    $totalDonasiBulanIni = Donation::where('status', 'berhasil')
        ->whereMonth('created_at', Carbon::now()->month)
        ->whereYear('created_at', Carbon::now()->year)
        ->sum('total_donasi');

    $totalDonasiBulanLalu = Donation::where('status', 'berhasil')
        ->whereMonth('created_at', Carbon::now()->subMonth()->month)
        ->whereYear('created_at', Carbon::now()->subMonth()->year)
        ->sum('total_donasi');

    $persen = 0;
    if ($totalDonasiBulanLalu > 0) {
        $persen = (($totalDonasiBulanIni - $totalDonasiBulanLalu) / $totalDonasiBulanLalu) * 100;
    }

     $totalProgramBulanIni = Program::whereMonth('created_at', now()->month)
        ->whereYear('created_at', now()->year)
        ->count();

    $totalProgramBulanLalu = Program::whereMonth('created_at', now()->subMonth()->month)
        ->whereYear('created_at', now()->subMonth()->year)
        ->count();

    $persentaseProgram = 0;
    if ($totalProgramBulanLalu > 0) {
        $persentaseProgram = (($totalProgramBulanIni - $totalProgramBulanLalu) / $totalProgramBulanLalu) * 100;
    }

    $verifiedDonorsThisMonth = Donation::where('status', 'berhasil')
        ->whereMonth('created_at', now()->month)
        ->whereYear('created_at', now()->year)
        ->select(DB::raw('COUNT(DISTINCT email) as total'))
        ->value('total');

    $verifiedDonorsLastMonth = Donation::where('status', 'berhasil')
        ->whereMonth('created_at', now()->subMonth()->month)
        ->whereYear('created_at', now()->subMonth()->year)
        ->select(DB::raw('COUNT(DISTINCT email) as total'))
        ->value('total');

    $persentaseDonatur = 0;
    if ($verifiedDonorsLastMonth > 0) {
        $persentaseDonatur = (($verifiedDonorsThisMonth - $verifiedDonorsLastMonth) / $verifiedDonorsLastMonth) * 100;
    }

     $currentYear = now()->year;
     $driver = DB::getDriverName();

    
    if ($driver === 'sqlite') {
        $monthlyData = Donation::selectRaw("strftime('%m', created_at) as month, SUM(total_donasi) as total")
            ->where('status', 'berhasil')
            ->whereYear('created_at', $currentYear)
            ->groupBy(DB::raw("strftime('%m', created_at)"))
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();
    } else {
       $monthlyData = Donation::selectRaw("LPAD(MONTH(created_at), 2, '0') as bulan, SUM(total_donasi) as total")
        ->where('status', 'berhasil')
        ->whereYear('created_at', $currentYear)
        ->groupBy(DB::raw("LPAD(MONTH(created_at), 2, '0')"))
        ->orderBy(DB::raw("LPAD(MONTH(created_at), 2, '0')"))
        ->get()
        ->pluck('total', 'bulan')
        ->toArray();

    }

    $donationLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
    $donationData = [];

    for ($i = 1; $i <= 12; $i++) {
        $key = str_pad($i, 2, '0', STR_PAD_LEFT);
        $donationData[] = $monthlyData[$key] ?? 0;
    }
    


    return view('dashboard', [
        'totalDonasiBerhasil' => $totalDonasiBulanIni,
        'persentaseKenaikan' => round($persen, 1),
        'totalProgram' => Program::count(),
        'persentaseProgram' => round($persentaseProgram, 1),
        'totalDonatur' => Donation::where('status', 'berhasil')->distinct('email')->count('email'),
        'persentaseDonatur' => round($persentaseDonatur, 1),
        'donationLabels' => $donationLabels,
        'donationData' => $donationData,
]);
}
}
