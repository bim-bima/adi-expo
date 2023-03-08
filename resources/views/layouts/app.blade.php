<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>AdiEXPO Event</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('image/icon.png') }}" rel="icon">
    <link href="{{ asset('image/icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('frontend/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    <!-- =======================================================
  * Template Name: FlexStart - v1.12.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<style>
    .hero {
        background-image: url({{ asset('image/BACKGROUND.png') }});
    }


    /* Untuk semua scrollbar */
    ::-webkit-scrollbar {
        width: 6px;
        /* lebar scrollbar */
    }

    /* Untuk bagian yang dapat digulir */
    ::-webkit-scrollbar-thumb {
        background-color: #ffff00;
        /* warna latar belakang thumb */
    }

    /* Untuk bagian yang tidak dapat digulir */
    ::-webkit-scrollbar-track {
        background-color: #d4d4d400;
        /* warna latar belakang track */
    }
</style>

<body>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    @yield('content')


    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-5 col-md-12 footer-info">
                        <a href="index.html" class="logo d-flex align-items-center">
                            <h3>ADI-EXPO</h3>
                        </a>
                        <p>ADI-EXPO Adalah Event Yang di selenggarakan oleh
                            Smk Adi Sanggoro Setahun Sekali Menampilkan Berbagai macam Lomba Seperti Pameran, Galasin,
                            Congklak, Cerdas Cermat, Debat Bahasa Inggris Dan Lain-lain.<br>
                            Tunggu Apa lagi Ayo Daftar Sekarang !</p>
                        <div class="social-links mt-3">
                            {{-- <a href="#" class="twitter"><i class="bi bi-twitter"></i></a> --}}
                            <a href="https://www.facebook.com/smkadisanggoro" class="facebook" target="_blank"><i
                                    class="bi bi-facebook"></i></a>
                            <a href="https://www.instagram.com/smkadisanggoro_official/" class="instagram"
                                target="_blank"><i class="bi bi-instagram"></i></a>
                            {{-- <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a> --}}
                        </div>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Link Alternatif</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Tentang</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Jadwal</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Lokasi Acara</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Sponsor</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="/daftar">Daftar</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-5 col-md-12 footer-contact text-center text-md-start">
                        <h4> SMK ADI SANGGORO</h4>
                        <img src="{{ asset('image/logo-as.png') }}" class="w-50" alt="">
                        <div class="copyright">
                            &copy; Copyright <strong><span>AdiEXPO</span></strong>. All Rights Reserved
                        </div>

                        </p>
                    </div>

                </div>

            </div>
        </div>

    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

            <style>
                #loading-container {
          display: flex;
          justify-content: center;
          align-items: center;
          position: fixed;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          z-index: 9999;
        }
        
        #loading-spinner {
          width: 50px;
          height: 50px;
          border-radius: 50%;
          border: 5px solid #757575;
          border-top-color: #18054d;
          animation: spin 0.70s linear infinite;
        }
        
        @keyframes spin {
          0% { transform: rotate(0deg); }
          100% { transform: rotate(360deg); }
        }
        
        #blur-background {
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background-color: rgba(0, 0, 0, 0.322);
          backdrop-filter: blur(10px);
          z-index: 9998;
        }
        
            </style>
                <div id="blur-background">
                </div>
            <div id="loading-container">
                <br>
                <div id="loading-spinner"></div>
            </div>
        
            <script>
                window.onload = function() {
          var loadingContainer = document.getElementById('loading-container');
          var blurBackground = document.getElementById('blur-background');
        
          loadingContainer.style.display = 'none';
          blurBackground.style.display = 'none';
        };
        
        window.onbeforeunload = function() {
          var loadingContainer = document.getElementById('loading-container');
          var blurBackground = document.getElementById('blur-background');
        
          loadingContainer.style.display = 'flex';
          blurBackground.style.display = 'block';
        };
        
            </script>
        
          
             <script src="{{ asset('js/jquery.min.js') }}"></script>
             {{-- <script src="{{ asset('js/popper.js') }}"></script> --}}
             <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
             <script src="{{ asset('js/main.js') }}"></script>
         
         
             {{-- <script src="{{ asset('frontend/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script> --}}
             <script src="{{ asset('frontend/assets/vendor/aos/aos.js') }}"></script>
             <script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
             <script src="{{ asset('frontend/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
             <script src="{{ asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
             <script src="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
             <script src="{{ asset('frontend/assets/vendor/php-email-form/validate.js') }}"></script>
         
         
           
             <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
     
</body>

</html>
