<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasukan;
use App\Models\Kategori;

class PemasukanController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('pemasukan', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nilai' => 'required|numeric',
            'kategori' => 'required|exists:tb_kategoris,id',
            'deskripsi' => 'nullable|string',
        ]);

        Pemasukan::create([
            'jumlah_pemasukan' => $request->nilai,
            'kategori_id' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'tanggal_pemasukan' => now(),
        ]);

        return redirect()->route('manajemen.index')->with('success', 'Pemasukan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        $kategoris = Kategori::all();
        return view('editPemasukan', compact('pemasukan', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nilai' => 'required|numeric',
            'kategori' => 'required|exists:tb_kategoris,id',
            'deskripsi' => 'nullable|string',
        ]);

        $pemasukan = Pemasukan::findOrFail($id);
        $pemasukan->update([
            'jumlah_pemasukan' => $request->nilai,
            'kategori_id' => $request->kategori,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('manajemen.index')->with('success', 'Pemasukan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        $pemasukan->delete();

        return redirect()->route('manajemen.index')->with('success', 'Pemasukan berhasil dihapus');
    }
}
