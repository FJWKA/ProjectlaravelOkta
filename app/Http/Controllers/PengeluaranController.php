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

        // Redirect ke halaman manajemen dengan pesan sukses
        return redirect()->route('manajemen.index')->with('success', 'Pengeluaran berhasil ditambahkan');
    }
}
