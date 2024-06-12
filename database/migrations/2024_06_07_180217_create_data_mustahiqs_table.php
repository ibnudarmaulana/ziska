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
        Schema::create('data_mustahiq', function (Blueprint $table) {
            $table->increments('mustahiq_id');
            $table->integer('nik')->nullable();
            $table->string('nama_mustahiq', 50);
            $table->string('alamat_mustahiq', 50);
            $table->enum('jk_mustahiq', ['laki-laki', 'perempuan']);
            $table->string('no_telp_mustahiq', 13);
            $table->string('email_mustahiq', 50)->unique();
            $table->date('tgl_lahir_mustahiq');
            $table->enum('status_mustahiq', ['menikah', 'lajang', 'cerai']);
            $table->integer('jml_anggota_keluarga');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_mustahiq');
    }
};
