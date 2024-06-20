<?php

// app/Models/Pemasukan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;

    protected $table = 'tb_pemasukans';

    protected $fillable = [
        'tanggal_pemasukan',
        'jumlah_pemasukan',
        'deskripsi',
        'kategori_id'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}



