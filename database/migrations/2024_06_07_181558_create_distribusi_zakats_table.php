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
        Schema::create('distribusi_zakat', function (Blueprint $table) {
            $table->increments('distribusi_id');
            $table->unsignedInteger('mustahiq_id');
            $table->foreign('mustahiq_id')->references('mustahiq_id')->on('data_mustahiq')->onDelete('cascade');
            $table->enum('status_asnaf', ['fakir', 'miskin', 'amil', 'mualaf', 'riqab', 'gharim', 'fisabilillah', 'ibnusabil']);
            $table->date('tgl_distribusi');
            $table->integer('jumlah_distribusi');
            $table->enum('metode_pembayaran', ['cash', 'transfer']);
            $table->string('ket_distribusi', 50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distribusi_zakat');
    }
};
