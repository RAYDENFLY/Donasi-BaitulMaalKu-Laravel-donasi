<?php

namespace App\Exports;

use App\Models\Donation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VerifiedDonationsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Donation::where('status', 'berhasil')
            ->select('name', 'program_type', 'total_donasi', 'payment_method', 'created_at')
            ->get();
    }

    public function headings(): array
    {
        return [
            'Nama Donatur',
            'Program',
            'Nominal',
            'Metode Pembayaran',
            'Tanggal Donasi',
        ];
    }
}
