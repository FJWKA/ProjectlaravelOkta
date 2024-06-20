<?php

// database/migrations/create_tb_pemasukans_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_pemasukans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pemasukan');
            $table->decimal('jumlah_pemasukan', 15,2);
            $table->text('deskripsi')->nullable();
            $table->unsignedBigInteger('kategori_id');
            $table->foreign('kategori_id')->references('id')->on('tb_kategoris');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pemasukans');
    }
};
