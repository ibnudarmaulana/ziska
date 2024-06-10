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
        Schema::create('data_upz', function (Blueprint $table) {
            $table->increments('upz_id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('user')->onDelete('cascade');
            $table->string('nama_upz', 16)->unique();
            $table->string('alamat', 30);
            $table->string('no_telp_upz', 13);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_upz');
    }
};
