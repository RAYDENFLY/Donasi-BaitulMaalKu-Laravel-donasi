<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimonis = Testimoni::latest()->paginate(10);
        return view('testimoni.index', compact('testimonis'));
    }

    public function create()
    {
        return view('testimoni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'role' => 'nullable|string|max:100',
            'text' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'role', 'text']);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('testimoni', 'public');
        }

        Testimoni::create($data);
        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil ditambahkan.');
    }

    public function edit(Testimoni $testimoni)
    {
        return view('testimoni.edit', compact('testimoni'));
    }

    public function update(Request $request, Testimoni $testimoni)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'role' => 'nullable|string|max:100',
            'text' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'role', 'text']);

        if ($request->hasFile('image')) {
            if ($testimoni->image && Storage::disk('public')->exists($testimoni->image)) {
                Storage::disk('public')->delete($testimoni->image);
            }
            $data['image'] = $request->file('image')->store('testimoni', 'public');
        }

        $testimoni->update($data);
        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil diperbarui.');
    }

    public function destroy(Testimoni $testimoni)
    {
        if ($testimoni->image && Storage::disk('public')->exists($testimoni->image)) {
            Storage::disk('public')->delete($testimoni->image);
        }
        $testimoni->delete();
        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}
