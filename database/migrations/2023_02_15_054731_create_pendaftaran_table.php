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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id('id_pendaftaran');
            $table->string('email',50);
            $table->string('nama',50);
            $table->string('nis',15);
            $table->string('asal_sekolah',50);
            $table->string('tingkat_pendidikan',50);
            $table->string('kelas',20);
            $table->string('kartu_pelajar',50);
            $table->string('foto_diri',50);
            $table->string('nama_pembimbing',50)->nullable();
            $table->string('jenis_kelamin',10);
            $table->string('umur',10);
            $table->foreignId('id_lomba');
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
        Schema::dropIfExists('pendaftaran');
    }
};
