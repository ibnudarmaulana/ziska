<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pemasukan_zakat', function (Blueprint $table) {
            $table->increments('pemasukan_id');
            $table->unsignedInteger('muzaki_id');
            $table->foreign('muzaki_id')->references('muzaki_id')->on('data_muzaki')->onDelete('cascade');
            $table->date('tgl_pemasukan');
            $table->integer('jumlah_pemasukan');
            $table->enum('metode_pembayaran', ['cash', 'transfer']);
            $table->string('ket_pemasukan', 50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemasukan_zakat');
    }
};
