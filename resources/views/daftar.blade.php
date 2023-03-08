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
                    <li><a class="nav-link scrollto" href="/#lokasi-event">Lokasi</a></li>

                    <li style="margin-right: 100px;"><a class="nav-link scrollto" href="hompage.html #contact">Kontak</a>
                    </li>
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


                <a class="nav-link scrollto" href="/" data-bs-dismiss="offcanvas" aria-label="Close">
                    <button type="button" class="bg-transparent border-0" data-bs-dismiss="offcanvas"
                        aria-label="Close">Home</button>
                </a>

                <a class="nav-link scrollto @if (count($tamus) < 1) d-none @endif" href="/#values"
                    data-bs-dismiss="offcanvas" aria-label="Close">
                    <button type="button" class="bg-transparent border-0" data-bs-dismiss="offcanvas"
                        aria-label="Close">Bintang Tamu</button>
                </a>

                <a class="nav-link scrollto" href="/#jadwal" data-bs-dismiss="offcanvas" aria-label="Close">
                    <button type="button" class="bg-transparent border-0" data-bs-dismiss="offcanvas"
                        aria-label="Close">Jadwal</button>
                </a>

                <a class="nav-link scrollto" href="/#lokasi-event" data-bs-dismiss="offcanvas" aria-label="Close">
                    <button type="button" class="bg-transparent border-0" data-bs-dismiss="offcanvas"
                        aria-label="Close">Lokasi</button>
                </a>

                <a class="nav-link scrollto @if (count($sponsors) < 1) d-none @endif" href="/#clients"
                    data-bs-dismiss="offcanvas" aria-label="Close">
                    <button type="button" class="bg-transparent border-0" data-bs-dismiss="offcanvas"
                        aria-label="Close">Sponsor</button>
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


    <section class="form-registrasi">
        <div class="container">
            <form action="bukti_pendaftaran.html">
                <h2><b>Form Pendaftaran Peserta AdiEXPO 2023</b></h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                <div class="dropdown">
                    <button class="btn-registrasi dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Pilih Bidang Lomba
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="/daftar-cerdas-cermat">Lomba Cerdas Cermat</a></li>
                        <li><a class="dropdown-item" href="/daftar-debat-bahasa-inggris">Lomba Debat Bahasa
                                Inggris</a></li>
                        <li><a class="dropdown-item" href="/daftar-cosplay-coswalk">Lomba Cosplay - Coswalk</a></li>
                        <li><a class="dropdown-item" href="ketentuan_umum_cosplay.html">Ketentuan Umum & Cosplay</a>
                        </li>
                    </ul>
                </div>
        </div>


        </form>

        </div>
    </section>
@endsection
