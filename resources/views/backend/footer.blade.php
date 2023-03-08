<footer class="footer pt-3  ">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">

                    {{-- copy --}}
                </div>
            </div>

            <!-- <div class="col-lg-6">
    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
        <li class="nav-item">
            <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
        </li>
    </ul>
</div> -->

        </div>
    </div>
</footer>
</div>
</main>
<div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg ">
        <div class="card-header pb-0 pt-3 ">
            <div class="float-start">
                <h5 class="mt-3 mb-0">Ubah Suasana Tampilan</h5>
                <p>Opsi merubah suasana dashboard</p>
            </div>
            <div class="float-end mt-4">
                <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                    <i class="fa fa-close"></i>
                </button>
            </div>

        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0">

            <div>
                <h6 class="mb-0">Warna Sidebar</h6>
            </div>
            <a href="javascript:void(0)" class="switch-trigger background-color">
                <div class="badge-colors my-2 text-start">
                    <span class="badge filter bg-gradient-primary active" data-color="primary"
                        onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-success" data-color="success"
                        onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-warning" data-color="warning"
                        onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-danger" data-color="danger"
                        onclick="sidebarColor(this)"></span>
                </div>
            </a>

            <div class="mt-3">
                <h6 class="mb-0">Sidebar Type</h6>
                <p class="text-sm">Pilih antara 2 type sidebar berikut</p>
            </div>
            <div class="d-flex">
                <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent"
                    onclick="sidebarType(this)">Transparan</button>
                <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white"
                    onclick="sidebarType(this)">Putih</button>
            </div>
            <p class="text-sm d-xl-none d-block mt-2">Kamu hanya dapat merubah suasana Dahboard di Dekstop saja</p>

            <div class="mt-3">
                <h6 class="mb-0">Pin Navbar</h6>
            </div>
            <div class="form-check form-switch ps-0">
                <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
                    onclick="navbarFixed(this)">
            </div>
            <hr class="horizontal dark my-sm-4">

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button>Logout</button>
            </form>

        </div>
    </div>
</div>

{{-- <script src="{{ asset('template/assets/js/core/popper.min.js') }}"></script> --}}
<script src="{{ asset('template/assets/js/core/bootstrap.min.js') }}"></script>
{{-- <script src="{{ asset('template/assets/js/plugins/perfect-scrollbar.min.js') }}"></script> --}}
{{-- <script src="{{ asset('template/assets/js/plugins/smooth-scrollbar.min.js') }}"></script> --}}
{{-- <script src="{{ asset('template/assets/js/plugins/chartjs.min.js') }}"></script> --}}


<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>

<script async defer src="https://buttons.github.io/buttons.js"></script>

<script src="{{ asset('template/assets/js/soft-ui-dashboard.min.js?v=1.0.7') }}"></script>

