<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;
use App\Models\Kategori;

class PengeluaranController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('pengeluaran', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nilai' => 'required|numeric',
            'kategori' => 'required|exists:tb_kategoris,id',
            'deskripsi' => 'nullable|string',
        ]);

        Pengeluaran::create([
            'jumlah_pengeluaran' => $request->nilai,
            'kategori_id' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'tanggal_pengeluaran' => now(),
        ]);

        return redirect()->route('manajemen.index')->with('success', 'Pengeluaran berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $kategoris = Kategori::all();
        return view('editPengeluaran', compact('pengeluaran', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nilai' => 'required|numeric',
            'kategori' => 'required|exists:tb_kategoris,id',
            'deskripsi' => 'nullable|string',
        ]);

        $pengeluaran = Pengeluaran::findOrFail($id);
        $pengeluaran->update([
            'jumlah_pengeluaran' => $request->nilai,
            'kategori_id' => $request->kategori,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('manajemen.index')->with('success', 'Pengeluaran berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $pengeluaran->delete();

        return redirect()->route('manajemen.index')->with('success', 'Pengeluaran berhasil dihapus');
    }
}
