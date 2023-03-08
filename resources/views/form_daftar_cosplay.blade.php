@extends('layouts/app')

@section('content')
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="/" class="logo d-flex align-items-center">
                <img src="{{ asset('image/logo-adiexpo.png') }}" alt="Logo AdiEXPO">

            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="/">Home</a></li>

                    <li><a class="nav-link scrollto" href="/#jadwal">Jadwal</a></li>
                    <li><a class="nav-link scrollto" href="/#lokasi-event">Venue</a></li>

                    <li style="margin-right: 100px;"><a class="nav-link scrollto"
                            href="hompage.html #contact">Kontak</a></li>
                    <li><a class="getstarted scrollto" href="/">Kembali</a></li>
                </ul>
                <i class="bi bi-list d-lg-none fs-4" style="cursor: pointer;" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    {{-- menu mobile --}}

    <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
        id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
            <img src="{{ asset('image/logo-adiexpo.png') }}" width="100px" height="auto" alt="">

            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="text-center ps-0">
                {{-- <a class="nav-link scrollto" href="#" >Home</a></>
                <a class="nav-link scrollto  @if (count($tamus) < 1) d-none @endif"
                        href="#values">Bintang Tamu</a>
                <a class="nav-link scrollto" href="#jadwal">Jadwal</a> --}}


                <a class="nav-link scrollto" href="/#" data-bs-dismiss="offcanvas" aria-label="Close">
                    <button type="button" class="bg-transparent border-0" data-bs-dismiss="offcanvas"
                        aria-label="Close">Home</button>
                </a>

                <a class="nav-link scrollto @if (count($tamus) < 1) d-none @endif" href="/#values" data-bs-dismiss="offcanvas" aria-label="Close">
                    <button type="button"
                        class="bg-transparent border-0"
                        data-bs-dismiss="offcanvas" aria-label="Close">Bintang Tamu</button>
                </a>

                <a class="nav-link scrollto" href="/#jadwal" data-bs-dismiss="offcanvas" aria-label="Close">
                    <button type="button" class="bg-transparent border-0" data-bs-dismiss="offcanvas"
                        aria-label="Close">Jadwal</button>
                </a>

                <a class="nav-link scrollto" href="/#lokasi-event" data-bs-dismiss="offcanvas" aria-label="Close">
                    <button type="button" class="bg-transparent border-0" data-bs-dismiss="offcanvas"
                        aria-label="Close">Lokasi</button>
                </a>

                <a class="nav-link scrollto @if (count($sponsors) < 1) d-none @endif" href="/#clients" data-bs-dismiss="offcanvas" aria-label="Close">
                    <button type="button"
                        class="bg-transparent border-0"
                        data-bs-dismiss="offcanvas" aria-label="Close">Sponsor</button>
                </a>

                <a class="nav-link scrollto" href="/#contact" data-bs-dismiss="offcanvas" aria-label="Close">
                    <button type="button" class="bg-transparent border-0" data-bs-dismiss="offcanvas"
                        aria-label="Close">Kontak</button>
                </a>
                {{-- <a class="nav-link scrollto @if (count($sponsors) < 1) d-none @endif"
                        href="#clients">Sponsor</a>
                <a class="nav-link scrollto mb-3" href="#contact">Kontak</a> --}}
                <a class="getstarted scrollto" href="/daftar"><button class="btn-registrasi">Daftar
                        Disini</button></a>
            </ul>
        </div>
    </div>


    <section class="form-registrasi-utama">
        <div class="container">

            <div class="keterangan-singkat mb-5">
                <h1>FORMULIR PENDAFTARAN LOMBA ADI-EXPO 2023</h1>
                <p class="mb-5">*Wajib diisi !</p>
                <h2><b>LOMBA COSPLAY - COSWALK</b></h2>
                <h6 style="font-size: 18px;"><b>Pendaftaran s/d tanggal 3 Maret 2023 Biaya Pendaftaran : Rp.
                        25.000/Orang</b></h6>
                <p>Pendaftaran Online - Pembayaran via Transfer : No. Rekening Bank BNI : 0456429010 An. Yayasan Adi
                    Sanggoro</p>
                <p><b>Untuk Peserta SMP/SMA/SMK/sederajat : Format Berita : LCO NamaSekolah</b></p>
                <br>
                <p><b>Untuk Peserta Umum</b></p>
                <p>Format Berita : <br>1. COWALK NamaPeserta Karakter (bagi Peserta yang ikut lomba COWALK) <br>2.
                    COS NamaPeserta Karakter (bagi Peserta COSPLAY , tanpa mengikuti lomba COWALK)</p>
                <a href="https://goo.gl/maps/sjTebDQyQLb28uAv8">
                    <h6 style="font-size: 18px; color: var(--color-red);">Lokasi : Klik disini !</h6>
                </a>
            </div>

            <div class="mb-3">
                <label for="kategori" class="form-label"><b>Kategori Peserta</b></label>
                <select class="form-select" id="kategori" onchange="showInput()">
                    <option value="">Pilih kategori peserta</option>
                    <option value="smp">SMP</option>
                    <option value="sma">SMA</option>
                    <option value="umum">Umum</option>
                    <option value="alumni">Alumni Sekolah</option>
                </select>

                @if ($errors->any())

                    @foreach ($errors->all() as $err)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $err }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endforeach

                @endif

                <!-- FORM INPUTAN SMP -->
                <div id="smp-input" style="display:none;" class="mt-3">

                    <form action="{{ route('daftar.cosplay.smp') }}" method="POST">
                        @csrf
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
                            <input type="text" id="nomor-identitas-smp" class="form-control"
                                name="no_kartu_identitas" placeholder="Masukkan Nomor Identitas Peserta">
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

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-6">
                                <a href="/daftar"><button type="button" class="btn-kembali"><i
                                            class="bi bi-arrow-left"></i>
                                        Kembali</button></a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <a><button type="submit" class="btn-registrasi">Kirim</button></a>
                            </div>
                        </div>
                    </form>

                </div>


                <!-- FORM INPUTAN SMA -->
                <div id="sma-input" style="display:none;" class="mt-3">

                    <form action="{{ route('daftar.cosplay.sma') }}" method="POST">
                        @csrf
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
                            <input type="text" id="nomor-identitas-smp" class="form-control"
                                name="no_kartu_identitas" placeholder="Masukkan Nomor Identitas Peserta">
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

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-6">
                                <a href="/daftar"><button type="button" class="btn-kembali"><i
                                            class="bi bi-arrow-left"></i>
                                        Kembali</button></a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <a><button type="submit" class="btn-registrasi">Kirim</button></a>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- FORM INPUTAN UMUM -->
                <div id="umum-input" style="display:none;" class="mt-3">

                    <form action="{{ route('daftar.cosplay.Umum') }}" method="POST">
                        @csrf
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
                            <input type="text" id="nomor-identitas-umum" class="form-control"
                                name="no_kartu_identitas" placeholder="Masukkan Nomor Identitas Peserta">
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

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-6">
                                <a href="/daftar"><button type="button" class="btn-kembali"><i
                                            class="bi bi-arrow-left"></i>
                                        Kembali</button></a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <a><button type="submit" class="btn-registrasi">Kirim</button></a>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- FORM INPUTAN ALUMNI -->
                <div id="alumni-input" style="display:none;" class="mt-3">

                    <form action="{{ route('daftar.cosplay.Alumni') }}" method="POST">
                        @csrf
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
                            <input type="text" id="nomor-identitas-umum" class="form-control"
                                name="no_kartu_identitas" placeholder="Masukkan Nomor Identitas Peserta">
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

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-6">
                                <a href="/daftar"><button type="button" class="btn-kembali"><i
                                            class="bi bi-arrow-left"></i>
                                        Kembali</button></a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <a><button type="submit" class="btn-registrasi">Kirim</button></a>
                            </div>
                        </div>
                    </form>

                </div>


            </div>



        </div>
    </section>
   @endsection