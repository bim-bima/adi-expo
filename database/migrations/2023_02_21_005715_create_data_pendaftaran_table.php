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
        Schema::create('data_pendaftaran', function (Blueprint $table) {
            $table->id('id_daftar');
            $table->string('nama_sekolah',50)->nullable();
            $table->text('alamat_sekolah')->nullable();
            $table->text('nama_pembimbing',50)->nullable();
            $table->string('no_pembimbing',15)->nullable();
            $table->string('email_pembimbing',50)->nullable();
            $table->string('nama_ketua',50)->nullable();
            $table->string('nama_anggota1',50)->nullable();
            $table->string('nama_anggota2',50)->nullable();
            $table->string('nama_lengkap',50)->nullable();
            $table->string('kelas',10)->nullable();
            $table->string('no_peserta',15)->nullable();
            $table->string('no_kartu_identitas',30)->nullable();
            $table->text('alamat_peserta')->nullable();
            $table->string('email_peserta',50)->nullable();
            $table->string('umur',10)->nullable();
            $table->text('chara_anime')->nullable();
            $table->string('jurusan_alumni',50)->nullable();
            $table->enum('bidang_lomba',['Cerdas Cermat','Debat Bahasa Inggris','Cosplay-Coswalk'])->nullable();
            $table->enum('kategori_peserta',['smp','sma','umum','alumni'])->nullable();
            $table->enum('daftar_sebagai',['Peserta Coswalk', 'Peserta Cosplay'])->nullable();
            $table->enum('status',['verified','unverified','pending'])->default('unverified');
            $table->string('qr',100);
            $table->text('token');
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
        Schema::dropIfExists('data_pendaftaran');
    }
};
