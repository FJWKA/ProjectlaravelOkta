<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;

class ManajemenController extends Controller
{
    public function index()
    {
        // Ambil semua pemasukan dan pengeluaran
        $pemasukans = Pemasukan::with('kategori')->get();
        $pengeluarans = Pengeluaran::with('kategori')->get();

        // Hitung total pemasukan dan pengeluaran
        $totalPemasukan = Pemasukan::sum('jumlah_pemasukan');
        $totalPengeluaran = Pengeluaran::sum('jumlah_pengeluaran');

        // Hitung saldo atau sisa saldo
        $saldo = $totalPemasukan - $totalPengeluaran;

        // Simpan total pemasukan, pengeluaran, dan saldo di session atau langsung di view
        session()->flash('totalPemasukan', $totalPemasukan);
        session()->flash('totalPengeluaran', $totalPengeluaran);
        session()->flash('saldo', $saldo);

        return view('manajemen', compact('pemasukans', 'pengeluarans'));
    }
}
