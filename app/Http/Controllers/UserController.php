<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return view('manajemen');
    }

    public function store(Request $request)
    {
        // Logika penyimpanan transaksi sementara tanpa database
        $type = $request->input('type');
        $amount = $request->input('amount');

        return view('manajemen', compact('type', 'amount'));
    }
}
