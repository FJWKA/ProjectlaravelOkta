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

        // Redirect ke halaman manajemen dengan pesan sukses
        return redirect()->route('manajemen.index')->with('success', 'Pemasukan berhasil ditambahkan');
    }
}
