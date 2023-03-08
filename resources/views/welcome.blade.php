@extends('layouts/app')

@section('content')
@php
use Carbon\Carbon;
@endphp
    @if (session()->has('daftarS'))
        <script>
            showAlert()

            function showAlert() {
                Swal.fire({
                    title: 'Trimakasih!',
                    text: 'Pendaftaran anda Berhasil Bukti Pendaftaran Akan Di Kirimkan Ke Email Pembimbing',
                    icon: 'success',
                    confirmButtonText: 'OK'
                })
            }
        </script>
    @endif

    @if (session()->has('daftarSumum'))
        <script>
            showAlert()

            function showAlert() {
                Swal.fire({
                    title: 'Trimakasih!',
                    text: 'Pendaftaran anda Berhasil Bukti Pendaftaran Akan Di Kirimkan Ke Email Anda',
                    icon: 'success',
                    confirmButtonText: 'OK'
                })
            }
        </script>
    @endif

    @if (session()->has('gagalS'))
        <script>
            showAlert()

            function showAlert() {
                Swal.fire({
                    title: 'Warning !',
                    text: 'Data Gagal Mungkin Email Yang Anda Masukan Salah',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
            }
        </script>
    @endif


    <!-- ======= Header ======= -->



    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="/" class="logo d-flex align-items-center">
                <img src="{{ asset('image/logo-adiexpo.png') }}" width="auto" height="auto" alt="">

            </a>

            <nav id="navbar" class="navbar" style="z-index: 100">
                <ul>
                    <li><a class="nav-link scrollto" href="#">Home</a></li>
                    <li><a class="nav-link scrollto  @if (count($tamus) < 1) d-none @endif" href="#values">Bintang
                            Tamu</a></li>
                    <li><a class="nav-link scrollto" href="#jadwal">Jadwal</a></li>
                    <li><a class="nav-link scrollto" href="#lokasi-event">Venue</a></li>
                    <li><a class="nav-link scrollto @if (count($sponsors) < 1) d-none @endif"
                            href="#clients">Sponsor</a></li>
                    <li style="margin-right: 100px;"><a class="nav-link scrollto" href="#contact">Kontak</a></li>
                    <li><a class="getstarted scrollto" href="/daftar">Daftar Disini</a></li>
                    <i class="bi bi-list mobile-nav-toggle"></i>
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


                <a class="nav-link scrollto" href="#" data-bs-dismiss="offcanvas" aria-label="Close">
                    <button type="button" class="bg-transparent border-0" data-bs-dismiss="offcanvas"
                        aria-label="Close">Home</button>
                </a>

                <a class="nav-link scrollto @if (count($tamus) < 1) d-none @endif" href="#values"
                    data-bs-dismiss="offcanvas" aria-label="Close">
                    <button type="button" class="bg-transparent border-0" data-bs-dismiss="offcanvas"
                        aria-label="Close">Bintang Tamu</button>
                </a>

                <a class="nav-link scrollto" href="#jadwal" data-bs-dismiss="offcanvas" aria-label="Close">
                    <button type="button" class="bg-transparent border-0" data-bs-dismiss="offcanvas"
                        aria-label="Close">Jadwal</button>
                </a>

                <a class="nav-link scrollto" href="#lokasi-event" data-bs-dismiss="offcanvas" aria-label="Close">
                    <button type="button" class="bg-transparent border-0" data-bs-dismiss="offcanvas"
                        aria-label="Close">Lokasi</button>
                </a>

                <a class="nav-link scrollto @if (count($sponsors) < 1) d-none @endif" href="#clients"
                    data-bs-dismiss="offcanvas" aria-label="Close">
                    <button type="button" class="bg-transparent border-0" data-bs-dismiss="offcanvas"
                        aria-label="Close">Sponsor</button>
                </a>

                <a class="nav-link scrollto" href="#contact" data-bs-dismiss="offcanvas" aria-label="Close">
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




    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">


        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">ADI-EXPO 2023 Event,Perlombaan,dan Cosplayers!</h1>
                    <h5 data-aos="fade-up" data-aos-delay="400">Yuk guys ! Gabung bersama kami di Event pada
                        tanggal 14-17 Maret 2023 !</h5>

                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('image/adiexpo.png') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= Values Section ======= -->
        <section id="values" class="values @if (count($tamus) < 1) d-none @endif">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Our Guest Star</h2>
                    <p>Bintang Tamu AdiEXPO 2023</p>
                </header>



                <div class="row gy-4">

                    @foreach ($tamus as $tamu)
                        <div class="col-lg-4 mb-5">
                            <div class="card">
                                <img src="{{ asset('storage/image/tamu/' . $tamu->image) }}" class="card-img-top"
                                    alt="...">
                                <div class="card-body">
                                    <p class="card-text">{{ $tamu->deskripsi }}</p>
                                </div>
                            </div>
                    @endforeach


                </div>

                <div class="button-view text-center">
                    <button type="button" class="btn-red">Lihat Selengkapnya</button>
                </div>


            </div>

        </section><!-- End Values Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team @if (count($mcs) < 1) d-none @endif">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>OUR MC</h2>
                    <p>Master Of Ceremony</p>
                </header>

                <div class="row gy-4">

                    @foreach ($mcs as $mc)
                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                            data-aos-delay="100">
                            <div class="member">
                                <div class="member-img pb-1">
                                    <img src="{{ asset('storage/image/mc/' . $mc->image) }}" class="img-fluid"
                                        alt="">
                                    <div class="social">
                                        <a href=""><i class="bi bi-twitter"></i></a>
                                        <a href=""><i class="bi bi-facebook"></i></a>
                                        <a href=""><i class="bi bi-instagram"></i></a>
                                        <a href=""><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                                <div class="member-info">
                                    <h4>{{ $mc->nama }}</h4>
                                    <span>{{ $mc->jabatan }}</span>
                                    <p>{{ $mc->deskripsi }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>

        </section>



        <section class="ftco-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <header class="section-header">

                            <h2 class="heading-section mb-5">Event Schedule</h2>
                            <p>Kegiatan Acara</p>
                        </header>
                    </div>
                    <div class="col-md-12">
                        <div class="featured-carousel owl-carousel">
                            @foreach ($kegiatans as $kegiatan)
                                <div class="item">
                                    <div class="work">
                                        <div class="img d-flex align-items-end justify-content-center"
                                            style="background-image: url({{ asset('storage/image/kegiatan/' . $kegiatan->image) }});">
                                            <div class="text w-100">
                                                <div class="dropup">
                                                    <a class="link-light d-inline" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false" href="#">
                                                        <h4 class="text-light">{{ $kegiatan->nama_kegiatan }}</h4>
                                                    </a>

                                                    <div class="dropdown-menu bg-dark p-4 text-muted"
                                                        style="max-width: 290px; min-width: 290px; max-height: 300px; overflow: auto;">
                                                        {{ $kegiatan->deskripsi }}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section id="jadwal" class="hero2 h-100" style="background-image: url({{ asset('image/bocilAs.png') }})">
            <div class="container">
                <div class="timeline">
                    @foreach ($lombas as $lomba)
                        <?php 
                        $waktu = $time = new Carbon($lomba->tgl_mulai);
                        ?>
                        <div class="timeline-row">
                            <div class="timeline-time">
                                {{ $waktu->format('g:iA') }}<small>{{ $waktu->format('M d') }}</small>
                            </div>
                            <div class="timeline-content">
                                <i class="icon-attachment"></i>
                                <h4>{{ $lomba->nama_lomba }}</h4>
                                <p>{{ $lomba->deskripsi }}</p>

                               
                            </div>
                        </div>
                    @endforeach



                    <div class="timeline-row">
                        <div class="timeline-content">
                            <p class="m-0">Selesai</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>






        <!-- ======= Lokasi Event Section ======= -->
        <section id="lokasi-event"class="lokasi-event">
            <div class="container">

                <header class="section-header">
                    <h2>Lokasi Acara</h2>
                    <p>Lokasi Acara</p>
                </header>

                <div class="row">
                    <div class="col-lg-8 col-md-6 mb-3" data-aos="fade-up">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.7483739638287!2d106.72661811384364!3d-6.553418465885071!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c4acdb7c8f87%3A0x896b8d47807a8489!2sSMK%20Adi%20Sanggoro!5e0!3m2!1sid!2sid!4v1676375829473!5m2!1sid!2sid"
                            width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up">
                        <div class="card p-0">
                            <img src="{{ asset('image/qr.jpeg') }}" class="w-100" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- ======= Sponsor Section ======= -->
        <section id="clients" class="clients @if (count($sponsors) < 1) d-none @endif">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Our Sponsor</h2>
                    <p>Sponsor Kami</p>
                </header>

                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">

                        @foreach ($sponsors as $sponsor)
                            <div class="swiper-slide"><img src="{{ asset('storage/image/sponsor/' . $sponsor->image) }}"
                                    class="img-fluid" alt=""></div>
                        @endforeach

                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

        </section><!-- End Clients Section -->

        <!-- ======= Biaya Pendapftaran Section ======= -->
        <section id="biaya-pendaftaran" class="biaya-pendaftaran">
            <div class="container">

                <header class="section-header">

                    <p>Biaya Pendaftaran</p>
                </header>

                <div class="row">

                    @foreach ($lombas as $lomba)
                        <div class="col-lg-4 col-md-4" data-aos="fade-up">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $lomba->nama_lomba }} </h3>
                                    <p class="card-text">Rp. {{ number_format($lomba->harga, 2, ',', '.') }}</p>
                                    <a href="/daftar"><button class="btn-view">Daftar Sekarang !</button></a>
                                    @if ($lomba->harga == '250000')
                                    <p class="text-danger">*Peserta Jalur Undangan Pendaftaran Rp.200.000,00</p>
                                        
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>

            </div>
        </section>

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Kontak</h2>
                    <p>Kontak Kami</p>
                </header>

                <div class="row gy-4">

                    <div class="col-lg-12 text-center">

                        <div class="row gy-4">
                            <div class="col-md-4">
                                <div class="info-box">
                                    <i class="bi bi-geo-alt"></i>
                                    <h3>Address</h3>
                                    <p>Jl. Sengked No. 1 Kampus IPB Dramaga </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info-box">
                                    <i class="bi bi-telephone"></i>
                                    <h3>Call Us</h3>
                                    <p>Fariz [0857-8085-4331] </p>
                                    <p>Saeful [0851-5960-1171] </p>
                                    <p>Umar [0857-1131-0461] </p>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info-box">
                                    <i class="bi bi-envelope"></i>
                                    <h3>Email Us</h3>
                                    <p>adi-expo@adinggoro.sch.id</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
@endsection
