<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->string('nisn', 10)->primary();
            $table->char('nis', 8);
            $table->string('nama', 35);
            $table->foreignId('id_kelas')->constrained('kelas', 'id_kelas');
            $table->text('alamat');
            $table->string('no_telp', 13);
            $table->foreignId('id_spp')->constrained('spp', 'id_spp');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
};
