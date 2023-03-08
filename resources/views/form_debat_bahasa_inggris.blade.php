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

                <a class="nav-link scrollto @if (count($tamus) < 1) d-none @endif" href="#values" data-bs-dismiss="offcanvas" aria-label="Close">
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
            <form action="{{ route('daftar.debat.bahasa.inggris') }}" method="POST">
                @csrf
                <div class="keterangan-singkat mb-5">
                    <h1>FORMULIR PENDAFTARAN LOMBA ADI-EXPO 2023</h1>
                    <p class="mb-5">*Wajib diisi !</p>
                    <h2><b>LOMBA DEBAT BAHASA INGGRIS</b></h2>
                    <h6 style="font-size: 18px;"><b>Pendaftaran s/d tanggal 3 Maret 2023 Biaya Pendaftaran : Rp.
                            100.000/Orang</b></h6>
                    <p>Pendaftaran Online - Pembayaran via Transfer : No. Rekening Bank BNI : 0456429010 An. Yayasan Adi
                        Sanggoro</p>
                    <p>Format Berita : LDI NamaSMP</p>
                    <a href="https://goo.gl/maps/sjTebDQyQLb28uAv8">
                        <h6 style="font-size: 18px; color: var(--color-red);">Lokasi : Klik disini !</h6>
                    </a>

                    @if ($errors->any())

                        @foreach ($errors->all() as $err)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $err }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endforeach

                    @endif
                </div>

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


                <div class="row">
                    <div class="col-lg-6 col-md-6 col-6">
                        <a href="/daftar"><button type="button" class="btn-kembali"><i
                                    class="bi bi-arrow-left"></i> Kembali</button></a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-6">
                        <a><button type="submit"
                                class="btn-registrasi">Kirim</button></a>
                    </div>
                </div>
            </form>

        </div>
    </section>
   @endsection