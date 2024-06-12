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
        Schema::create('data_muzaki', function (Blueprint $table) {
            $table->increments('muzaki_id');
            $table->integer('nik')->nullable();
            $table->string('nama_muzaki', 50);
            $table->string('alamat_muzaki', 50);
            $table->enum('jk_muzaki', ['laki-laki', 'perempuan']);
            $table->string('no_telp_muzaki', 13);
            $table->string('email_muzaki', 50)->unique();
            $table->date('tgl_lahir_muzaki');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_muzaki');
    }
};
