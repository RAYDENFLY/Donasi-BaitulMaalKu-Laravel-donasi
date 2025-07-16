<?php

namespace App\Http\Controllers;

use App\Models\QrisPayment;
use App\Models\BankAccount;
use Illuminate\Http\Request;

class PaymentSettingController extends Controller
{
    public function index()
    {
        $qrisList = QrisPayment::all();
        $bankAccounts = BankAccount::all();

        return view('settings.payment', compact('qrisList', 'bankAccounts'));
    }

    public function storeQris(Request $request)
    {
        $request->validate([
            'program_type' => 'required',
            'qris_image' => 'required|image|max:2048',
        ]);

        $path = $request->file('qris_image')->store('qris', 'public');

        QrisPayment::create([
            'program_type' => $request->program_type,
            'image_path' => $path,
        ]);

        // Setelah store, redirect ke index dengan data terbaru
        return redirect()->route('payment.index')->with('success', 'QRIS berhasil disimpan.');
    }

    public function storeBank(Request $request)
    {
        $request->validate([
            'bank_name' => 'required',
            'account_number' => 'required',
            'account_name' => 'required',
            'program_type' => 'required|in:zakat,infaq,wakaf,sedekah',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('bank_logos', 'public');
        }

        BankAccount::create([
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'account_name' => $request->account_name,
            'program_type' => $request->program_type,
            'logo_path' => $logoPath,
        ]);

        return redirect()->route('payment.index')->with('success', 'Bank berhasil disimpan.');
    }


    public function deleteQris($id)
    {
        $qris = QrisPayment::findOrFail($id);
        
        // Hapus file gambar jika ada
        if ($qris->image_path && \Storage::disk('public')->exists($qris->image_path)) {
            \Storage::disk('public')->delete($qris->image_path);
        }
        
        $qris->delete();

        return redirect()->route('payment.index')->with('success', 'QRIS berhasil dihapus.');
    }

    public function deleteBank($id)
    {
        $bank = BankAccount::findOrFail($id);
        $bank->delete();

        return redirect()->route('payment.index')->with('success', 'Bank berhasil dihapus.');
    }
}