@extends('layouts/appAdmin')
@section('content_admin')
    <div class="container mt-3">
        <form method="POST" action="{{ route('import.excel') }}" enctype="multipart/form-data">
            @csrf
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    @foreach (session('error') as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <div class="form-group">
                <label for="file">Upload file Excel:</label>
                <input type="file" class="form-control-file" id="file" name="file">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <br>
        <div class="row">
            <div class="col-lg-6 col-12">
                <h3>Form Input Lomba Cerdas Cermat</h3>
                <form action="">
                    <div class="mb-3">
                        <label for="nama_sekolah" class="form-label"><b>1. Nama Sekolah (SMP)</b></label>
                        <input type="text" class="form-control" id="nama_sekolah"
                            placeholder="Masukkan Nama Sekolah Anda" name="nama_sekolah">
                    </div>
                    <div class="mb-3">
                        <label for="alamat_sekolah" class="form-label"><b>2. Alamat Sekolah</b></label>
                        <input type="text" class="form-control" id="alamat_sekolah"
                            placeholder="Masukkan Alamat Sekolah Anda" name="alamat_sekolah">
                    </div>
                    <div class="mb-3">
                        <label for="nama_pembimbing" class="form-label"><b>3. Nama Lengkap Pembimbing</b></label>
                        <div><small>*Lengkap berikut Gelar</small></div>
                        <input type="text" class="form-control" id="nama_pembimbing"
                            placeholder="Masukkan Nama Lengkap Pembimbing Anda" name="nama_pembimbing">
                    </div>
                    <div class="mb-3">
                        <label for="nomorhp_pembimbing" class="form-label"><b>4. Nomor WA/HP Pembimbing</b></label>
                        <div><small>*No WA Aktif</small></div>
                        <input type="number" class="form-control" id="nomorhp_pembimbing"
                            placeholder="Masukkan Nomor HP/WA Pembimbing Anda" name="no_pembimbing">
                    </div>
                    <div class="mb-3">
                        <label for="email_pembimbing" class="form-label"><b>5. Email Pembimbing</b></label>
                        <input type="email" class="form-control" id="nama_pembimbing"
                            placeholder="Masukkan Email Pembimbing Anda" name="email_pembimbing">
                    </div>
                    <div class="mb-3">
                        <label for="nama_lengkap_ketua" class="form-label"><b>6. Nama Lengkap Peserta</b></label>
                        <div>
                            <p>(Ketua)/KELAS</p>
                        </div>
                        <div><small>Contoh : Muhammad Adam/ IX B</small></div>
                        <input type="text" class="form-control" id="nama_ketua" placeholder="Masukkan Nama Lengkap Anda"
                            name="nama_ketua">
                    </div>
                    <div class="mb-3">
                        <label for="nama_anggota1" class="form-label"><b>7. Nama Lengkap Peserta</b></label>
                        <div>
                            <p>(Anggota 1)/KELAS</p>
                        </div>
                        <input type="text" class="form-control" id="nama_anggota1"
                            placeholder="Masukkan Nama Anggota Anda" name="nama_anggota1">
                    </div>
                    <div class="mb-3">
                        <label for="nama_anggota2" class="form-label"><b>8. Nama Lengkap Peserta</b></label>
                        <div>
                            <p>(Anggota 2)/KELAS</p>
                        </div>
                        <input type="text" class="form-control" id="nama_anggota2"
                            placeholder="Masukkan Nama Anggota Anda" name="nama_anggota2">
                    </div>
                    <input type="hidden" name="bidang_lomba" value="Cerdas Cermat">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>

            <div class="col-lg-6 col-12">
                <h3>Form Input Lomba Debat Bahasa Inggris</h3>

                <form action="">
                    <div class="mb-3">
                        <label for="nama_sekolah" class="form-label"><b>1. Nama Sekolah (SMP)</b></label>
                        <input type="text" class="form-control" id="nama_sekolah"
                            placeholder="Masukkan Nama Sekolah Anda" name="nama_sekolah">
                    </div>
                    <div class="mb-3">
                        <label for="alamat_sekolah" class="form-label"><b>2. Alamat Sekolah</b></label>
                        <input type="text" class="form-control" id="alamat_sekolah"
                            placeholder="Masukkan Alamat Sekolah Anda" name="alamat_sekolah">
                    </div>
                    <div class="mb-3">
                        <label for="nama_pembimbing" class="form-label"><b>3. Nama Lengkap Pembimbing</b></label>
                        <div><small>*Lengkap berikut Gelar</small></div>
                        <input type="text" class="form-control" id="nama_pembimbing"
                            placeholder="Masukkan Nama Lengkap Pembimbing Anda" name="nama_pembimbing">
                    </div>
                    <div class="mb-3">
                        <label for="nomorhp_pembimbing" class="form-label"><b>4. Nomor WA/HP Pembimbing</b></label>
                        <div><small>*No WA Aktif</small></div>
                        <input type="number" class="form-control" id="nomorhp_pembimbing"
                            placeholder="Masukkan Nomor HP/WA Pembimbing Anda" name="no_pembimbing">
                    </div>
                    <div class="mb-3">
                        <label for="email_pembimbing" class="form-label"><b>5. Email Pembimbing</b></label>
                        <input type="email" class="form-control" id="nama_pembimbing"
                            placeholder="Masukkan Email Pembimbing Anda" name="email_pembimbing">
                    </div>

                    <div class="mb-3">
                        <label for="nama_lengkap_ketua" class="form-label"><b>6. Nama Lengkap Peserta</b></label>
                        <input type="text" class="form-control" id="nama_ketua"
                            placeholder="Masukkan Nama Lengkap Anda" name="nama_lengkap">
                    </div>
                    <div class="mb-3">
                        <label for="nama_anggota1" class="form-label"><b>7. Kelas</b></label>
                        <input type="number" class="form-control" id="nama_anggota1"
                            placeholder="Masukkan Nama Lengkap Anda" name="kelas">
                    </div>
                    <div class="mb-3">
                        <label for="nama_anggota2" class="form-label"><b>8. Nomor WA/HP Peserta</b></label>
                        <input type="number" class="form-control" id="nama_anggota2"
                            placeholder="Masukkan Nama Lengkap Anda" name="no_peserta">
                    </div>

                    <input type="hidden" name="bidang_lomba" value="Debat Bahasa Inggris">



                    <button type="submit" class="btn btn-primary">Tambah</button>


                </form>
            </div>
        </div>
        <hr>
        <h2>Form Input Cosplay/CosWalk</h2>


        <div class="row">
            <div class="col-lg-6 col-12">
                <h3>Smp</h3>
                <form action="">
                    <input type="hidden" name="kategori_peserta" value="smp">
                    <div class="mb-3">
                        <label for="nama-smp" class="form-label"><b>1. Nama Sekolah</b></label>
                        <input type="text" id="nama-smp" class="form-control" name="nama_sekolah"
                            placeholder="Masukkan Nama Sekolah Anda">
                    </div>

                    <div class="mb-3">
                        <label for="alamat-smp" class="form-label"><b>2. Alamat Sekolah</b></label>
                        <input type="text" id="alamat-smp" class="form-control" name="alamat_sekolah"
                            placeholder="Masukkan Alamat Sekolah Anda">
                    </div>

                    <div class="mb-3">
                        <label for="nama-peserta-smp" class="form-label"><b>3. Nama Lengkap Peserta</b></label>
                        <input type="text" id="nama-peserta-smp" class="form-control" name="nama_lengkap"
                            placeholder="Masukkan Nama Peserta">
                    </div>

                    <div class="mb-3">
                        <label for="nomor-peserta-smp" class="form-label"><b>4. Nomor WA/HP Peserta</b></label>
                        <input type="text" id="nomor-peserta-smp" class="form-control" name="no_peserta"
                            placeholder="Masukkan Nomor WA Peserta">
                    </div>

                    <div class="mb-3">
                        <label for="nomor-identitas-smp" class="form-label"><b>5. Nomor Kartu Identitas
                                (KTP/SIM/NIK/Kartu Pelajar)</b></label>
                        <input type="text" id="nomor-identitas-smp" class="form-control" name="no_kartu_identitas"
                            placeholder="Masukkan Nomor Identitas Peserta">
                    </div>

                    <div class="mb-3">
                        <label for="alamat-smp" class="form-label"><b>6. Alamat Peserta</b></label>
                        <input type="text" id="alamat-smp" class="form-control" name="alamat_peserta"
                            placeholder="Masukkan Alamat Peserta">
                    </div>

                    <div class="mb-3">
                        <label for="email-smp" class="form-label"><b>7. Email Peserta</b></label>
                        <input type="email" id="email-smp" class="form-control" name="email_peserta"
                            placeholder="Masukkan Alamat Peserta">
                    </div>

                    <div class="mb-3">
                        <label for="usia-smp" class="form-label"><b>8. Usia : ......... tahun</b></label>
                        <input type="text" id="usia-smp" class="form-control" name="umur"
                            placeholder="Masukkan Usia Peserta">
                    </div>

                    <div class="mb-3">
                        <label for="nama-chara-smp" class="form-label"><b>9. Nama Chara dan
                                Anime/Game/Movie</b></label>
                        <div><small><b>Contoh : </b>Gojo Satoru (Jujutsu Kaisen)</small></div>
                        <input type="text" id="nama-chara-smp" class="form-control" name="chara_anime"
                            placeholder="Masukkan Nama Chara dan Anime/Game/Movie">
                    </div>

                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>

            <div class="col-lg-6 col-12">
                <h3>Sma</h3>

                <form action="">
                    <input type="hidden" name="kategori_peserta" value="sma">
                    <div class="mb-3">
                        <label for="nama-smp" class="form-label"><b>1. Nama Sekolah</b></label>
                        <input type="text" id="nama-smp" class="form-control" name="nama_sekolah"
                            placeholder="Masukkan Nama Sekolah Anda">
                    </div>

                    <div class="mb-3">
                        <label for="alamat-smp" class="form-label"><b>2. Alamat Sekolah</b></label>
                        <input type="text" id="alamat-smp" class="form-control" name="alamat_sekolah"
                            placeholder="Masukkan Alamat Sekolah Anda">
                    </div>

                    <div class="mb-3">
                        <label for="nama-peserta-smp" class="form-label"><b>3. Nama Lengkap Peserta</b></label>
                        <input type="text" id="nama-peserta-smp" class="form-control" name="nama_lengkap"
                            placeholder="Masukkan Nama Peserta">
                    </div>

                    <div class="mb-3">
                        <label for="nomor-peserta-smp" class="form-label"><b>4. Nomor WA/HP Peserta</b></label>
                        <input type="text" id="nomor-peserta-smp" class="form-control" name="no_peserta"
                            placeholder="Masukkan Nomor WA Peserta">
                    </div>

                    <div class="mb-3">
                        <label for="nomor-identitas-smp" class="form-label"><b>5. Nomor Kartu Identitas
                                (KTP/SIM/NIK/Kartu Pelajar)</b></label>
                        <input type="text" id="nomor-identitas-smp" class="form-control" name="no_kartu_identitas"
                            placeholder="Masukkan Nomor Identitas Peserta">
                    </div>

                    <div class="mb-3">
                        <label for="alamat-smp" class="form-label"><b>6. Alamat Peserta</b></label>
                        <input type="text" id="alamat-smp" class="form-control" name="alamat_peserta"
                            placeholder="Masukkan Alamat Peserta">
                    </div>

                    <div class="mb-3">
                        <label for="email-smp" class="form-label"><b>7. Email Peserta</b></label>
                        <input type="email" id="email-smp" class="form-control" name="email_peserta"
                            placeholder="Masukkan Alamat Peserta">
                    </div>

                    <div class="mb-3">
                        <label for="usia-smp" class="form-label"><b>8. Usia : ......... tahun</b></label>
                        <input type="text" id="usia-smp" class="form-control" name="umur"
                            placeholder="Masukkan Usia Peserta">
                    </div>

                    <div class="mb-3">
                        <label for="nama-chara-smp" class="form-label"><b>9. Nama Chara dan
                                Anime/Game/Movie</b></label>
                        <div><small><b>Contoh : </b>Gojo Satoru (Jujutsu Kaisen)</small></div>
                        <input type="text" id="nama-chara-smp" class="form-control" name="chara_anime"
                            placeholder="Masukkan Nama Chara dan Anime/Game/Movie">
                    </div>

                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>

            <div class="col-lg-6 col-12">
                <h3>Umum</h3>
                <form action="">
                    <input type="hidden" name="kategori_peserta" value="umum">

                    <label for="pilihan-cosplay" class="form-label"><b>Mendafar Sebagai</b></label>
                    <div class="mb-3">
                        <select name="daftar_sebagai" class="form-control" id="">
                            <option disabled selected>--Pilih--</option>
                            <option value="Peserta Cosplay">Peserta COSPLAY (Tanpa mengikuti lomba COSWalk)
                            </option>
                            <option value="Peserta Coswalk">Peserta Lomba COSWalk</option>
                        </select>

                    </div>


                    <div class="mb-3">
                        <label for="nama-peserta-umum" class="form-label"><b>1. Nama Lengkap Peserta</b></label>
                        <input type="text" id="nama-peserta-umum" class="form-control" name="nama_lengkap"
                            placeholder="Masukkan Nama Peserta">
                    </div>

                    <div class="mb-3">
                        <label for="nomor-peserta-umum" class="form-label"><b>2. Nomor WA/HP Peserta</b></label>
                        <input type="text" id="nomor-peserta-umum" class="form-control" name="no_peserta"
                            placeholder="Masukkan Nomor WA Peserta">
                    </div>

                    <div class="mb-3">
                        <label for="nomor-identitas-umum" class="form-label"><b>3. Nomor Kartu Identitas
                                (KTP/SIM/NIK/Kartu Pelajar)</b></label>
                        <input type="text" id="nomor-identitas-umum" class="form-control" name="no_kartu_identitas"
                            placeholder="Masukkan Nomor Identitas Peserta">
                    </div>

                    <div class="mb-3">
                        <label for="alamat-umum" class="form-label"><b>4. Alamat Peserta</b></label>
                        <input type="text" id="alamat-umum" class="form-control" name="alamat_peserta"
                            placeholder="Masukkan Alamat Peserta">
                    </div>

                    <div class="mb-3">
                        <label for="email-umum" class="form-label"><b>5. Email Peserta</b></label>
                        <input type="email" id="email-umum" class="form-control" name="email_peserta"
                            placeholder="Masukkan Email Peserta">
                    </div>

                    <div class="mb-3">
                        <label for="usia-umum" class="form-label"><b>6. Usia : ......... tahun</b></label>
                        <input type="text" id="usia-umum" class="form-control" name="umur"
                            placeholder="Masukkan Usia Peserta">
                    </div>

                    <div class="mb-3">
                        <label for="nama-chara-umum" class="form-label"><b>7. Nama Chara dan
                                Anime/Game/Movie</b></label>
                        <div><small><b>Contoh : </b>Gojo Satoru (Jujutsu Kaisen)</small></div>
                        <input type="text" id="nama-chara-umum" class="form-control" name="chara_anime"
                            placeholder="Masukkan Nama Chara dan Anime/Game/Movie">
                    </div>

                    <button type="submit" class="btn btn-primary">Tambah</button>

                </form>
            </div>

            <div class="col-lg-6 col-12">

                <h3>Alumni</h3>

                <form action="">
                    <div class="mb-3">
                        <label for="lulusan-alumni" class="form-label"><b>Jurusan dan Lulusan Tahun</b></label>
                        <div><small><b>Contoh : </b>Geomatika (2020)</small></div>
                        <input type="text" id="lulusan-alumni" class="form-control" name="jurusan_alumni"
                            placeholder="Masukkan Jurusan dan Lulusan Tahun">
                    </div>

                    <input type="hidden" name="kategori_peserta" value="alumni">

                    <label for="pilihan-cosplay" class="form-label"><b>Mendafar Sebagai</b></label>
                    <div class="mb-3">
                        <select name="daftar_sebagai" class="form-control" id="">
                            <option disabled selected>--Pilih--</option>
                            <option value="Peserta Cosplay">Peserta COSPLAY (Tanpa mengikuti lomba COSWalk)
                            </option>
                            <option value="Peserta Coswalk">Peserta Lomba COSWalk</option>
                        </select>

                    </div>


                    <div class="mb-3">
                        <label for="nama-peserta-umum" class="form-label"><b>1. Nama Lengkap Peserta</b></label>
                        <input type="text" id="nama-peserta-umum" class="form-control" name="nama_lengkap"
                            placeholder="Masukkan Nama Peserta">
                    </div>

                    <div class="mb-3">
                        <label for="nomor-peserta-umum" class="form-label"><b>2. Nomor WA/HP Peserta</b></label>
                        <input type="text" id="nomor-peserta-umum" class="form-control" name="no_peserta"
                            placeholder="Masukkan Nomor WA Peserta">
                    </div>

                    <div class="mb-3">
                        <label for="nomor-identitas-umum" class="form-label"><b>3. Nomor Kartu Identitas
                                (KTP/SIM/NIK/Kartu Pelajar)</b></label>
                        <input type="text" id="nomor-identitas-umum" class="form-control" name="no_kartu_identitas"
                            placeholder="Masukkan Nomor Identitas Peserta">
                    </div>

                    <div class="mb-3">
                        <label for="alamat-umum" class="form-label"><b>4. Alamat Peserta</b></label>
                        <input type="text" id="alamat-umum" class="form-control" name="alamat_peserta"
                            placeholder="Masukkan Alamat Peserta">
                    </div>

                    <div class="mb-3">
                        <label for="email-umum" class="form-label"><b>5. Email Peserta</b></label>
                        <input type="email" id="email-umum" class="form-control" name="email_peserta"
                            placeholder="Masukkan Email Peserta">
                    </div>

                    <div class="mb-3">
                        <label for="usia-umum" class="form-label"><b>6. Usia : ......... tahun</b></label>
                        <input type="text" id="usia-umum" class="form-control" name="umur"
                            placeholder="Masukkan Usia Peserta">
                    </div>

                    <div class="mb-3">
                        <label for="nama-chara-umum" class="form-label"><b>7. Nama Chara dan
                                Anime/Game/Movie</b></label>
                        <div><small><b>Contoh : </b>Gojo Satoru (Jujutsu Kaisen)</small></div>
                        <input type="text" id="nama-chara-umum" class="form-control" name="chara_anime"
                            placeholder="Masukkan Nama Chara dan Anime/Game/Movie">
                    </div>

                    <button type="submit" class="btn btn-primary">Tambah</button>

                </form>
            </div>
        </div>
    </div>
@endsection
