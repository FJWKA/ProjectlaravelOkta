<?php

// app/Models/Pengeluaran.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $table = 'tb_pengeluarans';

    protected $fillable = [
        'tanggal_pengeluaran',
        'jumlah_pengeluaran',
        'deskripsi',
        'kategori_id'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}



