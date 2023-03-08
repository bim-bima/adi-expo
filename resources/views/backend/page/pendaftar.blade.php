@extends('layouts/appAdmin')
@section('content_admin')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session()->has('success'))
        <script>
            function showAlertSuccess() {
                Swal.fire({
                    title: 'Success',
                    text: 'User Verified',
                    icon: 'success',
                    confirmButtonText: 'OK',
                    
                })
            }
            showAlertSuccess()
        </script>
    @elseif (session()->has('danger'))
        <div class="alert alert-danger alert-dismissible fade show animate__animated animate__bounce" role="alert">
            {{ session('danger') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
        </div>
    @endif


    <section class="">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="float-end">
                    <a href="{{ route('exel') }}" class="btn btn-success">Export Excel</a>
                </div>
                <div class="col-12">
                    <div class="card mb-4 p-3">
                        <div class="card-header pb-0">

                            <div class="row">
                                <div class="col-6">
                                    <h6>Data Pendaftaran Cosplay Smp</h6>

                                </div>

                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="table-datatables">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nama Sekolah</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Alamat Sekolah</th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Nama Lengkap</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                No Telepon</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                No Kartu Identitas</th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Alamat</th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Email</th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Umur</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Jenis Lomba</th>


                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Date</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($dataCosplaySmp as $cosplaySmp)
                                            <tr>

                                                <td>
                                                    <p class="text-xs text-secondary mb-0">{{ $cosplaySmp->nama_sekolah }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">{{ $cosplaySmp->alamat_sekolah }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">{{ $cosplaySmp->nama_lengkap }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">{{ $cosplaySmp->no_peserta }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $cosplaySmp->no_kartu_identitas }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">{{ $cosplaySmp->alamat_peserta }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">{{ $cosplaySmp->email_peserta }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">{{ $cosplaySmp->umur }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">{{ $cosplaySmp->bidang_lomba }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $cosplaySmp->created_at }}</p>
                                                </td>
                                                <td>
                                                    <p
                                                        class="text-xs text-secondary mb-0 @if ($cosplaySmp->status == 'unverified') text-danger @else text-success @endif">
                                                        {{ $cosplaySmp->status }}
                                                    </p>
                                                </td>



                                                <td class="align-middle  @if ($cosplaySmp->status == 'verified' || $cosplaySmp->status == 'pending') d-none @endif">
                                                    <form action="/admin/verifikasi/{{ $cosplaySmp->id_daftar }}"
                                                        method="POST">
                                                        @csrf
                                                        <button class="btn btn-success badge">verified</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if (count($dataCosplaySmp) < 1)
                                            <center>
                                                <img src="{{ asset('image/datakosong.png') }}" alt=""
                                                    class="w-25 ">
                                            </center>
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
    </section>



    <section class="">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4 p-3">
                        <div class="card-header pb-0">

                            <div class="row">
                                <div class="col-6">
                                    <h6>Data Pendaftaran Cosplay Sma</h6>

                                </div>

                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="table-datatables2">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nama Sekolah</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Alamat Sekolah</th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Nama Lengkap</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                No Telepon</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                No Kartu Identitas</th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Alamat</th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Email</th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Umur</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Jenis Lomba</th>


                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Date</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($dataCosplaySma as $cosplaySma)
                                            <tr>

                                                <td>
                                                    <p class="text-xs text-secondary mb-0">{{ $cosplaySma->nama_sekolah }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $cosplaySma->alamat_sekolah }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">{{ $cosplaySma->nama_lengkap }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">{{ $cosplaySma->no_peserta }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $cosplaySma->no_kartu_identitas }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $cosplaySma->alamat_peserta }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">{{ $cosplaySma->email_peserta }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">{{ $cosplaySma->umur }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">{{ $cosplaySma->bidang_lomba }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $cosplaySma->created_at }}</p>
                                                </td>
                                                <td>
                                                    <p
                                                        class="text-xs text-secondary mb-0 @if ($cosplaySma->status == 'unverified') text-danger @else text-success @endif">
                                                        {{ $cosplaySma->status }}
                                                    </p>
                                                </td>



                                                <td class="align-middle  @if ($cosplaySma->status == 'verified' || $cosplaySma->status == 'pending') d-none @endif">
                                                    <form action="/admin/verifikasi/{{ $cosplaySma->id_daftar }}"
                                                        method="POST">
                                                        @csrf
                                                        <button class="btn btn-success badge">verified</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if (count($dataCosplaySma) < 1)
                                            <center>
                                                <img src="{{ asset('image/datakosong.png') }}" alt=""
                                                    class="w-25 ">
                                            </center>
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
    </section>



    <section class="">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4 p-3">
                        <div class="card-header pb-0">

                            <div class="row">
                                <div class="col-6">
                                    <h6>Data Pendaftaran Cosplay Umum</h6>

                                </div>

                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="table-datatables3">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Daftar Sebagai</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Nama Lengkap</th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                No Telepon</th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                No Kartu Identitas</th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Alamat</th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Email</th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Umur</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Nama Karakter</th>


                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Date</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($dataCosplayUmum as $cosplayUmum)
                                            <tr>

                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $cosplayUmum->daftar_sebagai }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $cosplayUmum->nama_lengkap }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">{{ $cosplayUmum->no_peserta }}
                                                    </p>
                                                </td>

                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $cosplayUmum->no_kartu_identitas }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $cosplayUmum->alamat_peserta }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $cosplayUmum->email_peserta }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">{{ $cosplayUmum->umur }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">{{ $cosplayUmum->chara_anime }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $cosplayUmum->created_at }}</p>
                                                </td>
                                                <td>
                                                    <p
                                                        class="text-xs text-secondary mb-0 @if ($cosplayUmum->status == 'unverified') text-danger @else text-success @endif">
                                                        {{ $cosplayUmum->status }}
                                                    </p>
                                                </td>



                                                <td class="align-middle  @if ($cosplayUmum->status == 'verified' || $cosplayUmum->status == 'pending') d-none @endif">
                                                    <form action="/admin/verifikasi/{{ $cosplayUmum->id_daftar }}"
                                                        method="POST">
                                                        @csrf
                                                        <button class="btn btn-success badge">verified</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if (count($dataCosplayUmum) < 1)
                                            <center>
                                                <img src="{{ asset('image/datakosong.png') }}" alt=""
                                                    class="w-25 ">
                                            </center>
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
    </section>



    <section class="">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4 p-3">
                        <div class="card-header pb-0">

                            <div class="row">
                                <div class="col-6">
                                    <h6>Data Pendaftaran Cosplay Alumni</h6>

                                </div>

                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="table-datatables4">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Daftar Sebagai</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Nama Lengkap</th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                No Telepon</th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                No Kartu Identitas</th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Alamat</th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Email</th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Umur</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Nama Karakter</th>


                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Date</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($dataCosplayAlumni as $cosplayAlumni)
                                            <tr>

                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $cosplayAlumni->daftar_sebagai }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $cosplayAlumni->nama_lengkap }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $cosplayAlumni->no_peserta }}
                                                    </p>
                                                </td>

                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $cosplayAlumni->no_kartu_identitas }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $cosplayAlumni->alamat_peserta }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $cosplayAlumni->email_peserta }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">{{ $cosplayAlumni->umur }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $cosplayAlumni->chara_anime }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $cosplayAlumni->created_at }}</p>
                                                </td>
                                                <td>
                                                    <p
                                                        class="text-xs text-secondary mb-0 @if ($cosplayAlumni->status == 'unverified') text-danger @else text-success @endif">
                                                        {{ $cosplayAlumni->status }}
                                                    </p>
                                                </td>



                                                <td class="align-middle  @if ($cosplayAlumni->status == 'verified' || $cosplayAlumni->status == 'pending') d-none @endif">
                                                    <form action="/admin/verifikasi/{{ $cosplayAlumni->id_daftar }}"
                                                        method="POST">
                                                        @csrf
                                                        <button class="btn btn-success badge">verified</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if (count($dataCosplayAlumni) < 1)
                                            <center>
                                                <img src="{{ asset('image/datakosong.png') }}" alt=""
                                                    class="w-25 ">
                                            </center>
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
    </section>



    <section class="">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4 p-3">
                        <div class="card-header pb-0">

                            <div class="row">
                                <div class="col-6">
                                    <h6>Data Pendaftaran Lomba Cerdas Cermat</h6>

                                </div>

                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="table-datatables5">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Nama Sekolah</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Alamat Sekolah</th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Nama Lengkap Pembimbing</th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                No Telepon Pembimbing</th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Email Pembimbing</th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Nama (ketua)</th>


                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Nama (Anggota 1)</th>


                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Nama (Anggota 2)</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Status</th>
                                            <th class="text-secondary opacity-7">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($dataLombaCerdasCermat as $dataCerdasCermat)
                                            <tr>

                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $dataCerdasCermat->nama_sekolah }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $dataCerdasCermat->alamat_sekolah }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $dataCerdasCermat->nama_pembimbing }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $dataCerdasCermat->no_pembimbing }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $dataCerdasCermat->email_pembimbing }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $dataCerdasCermat->nama_ketua }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $dataCerdasCermat->nama_anggota1 }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $dataCerdasCermat->nama_anggota2 }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $dataCerdasCermat->status }}
                                                    </p>
                                                </td>


                                                <td
                                                    class="text-xs text-secondary mb-0  @if ($dataCerdasCermat->status == 'verified' || $dataCerdasCermat->status == 'pending') d-none @endif">
                                                    <form action="/admin/verifikasi/{{ $dataCerdasCermat->id_daftar }}"
                                                        method="POST">
                                                        @csrf
                                                        <button class="btn btn-success badge">verified</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if (count($dataLombaCerdasCermat) < 1)
                                            <center>
                                                <img src="{{ asset('image/datakosong.png') }}" alt=""
                                                    class="w-25 ">
                                            </center>
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

    </section>



    <section class="">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4 p-3">
                        <div class="card-header pb-0">

                            <div class="row">
                                <div class="col-6">
                                    <h6>Data Pendaftaran Lomba Cerdas Debat Bahasa Inggris</h6>

                                </div>

                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="table-datatables6">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Nama Sekolah</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Alamat Sekolah</th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Nama Lengkap Pembimbing</th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                No Telepon Pembimbing</th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Email Pembimbing</th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Nama Lengkap</th>


                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Kelas</th>


                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                No Telepon</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Status</th>
                                            <th class="text-secondary opacity-7">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($dataLombaDebatBahasaInggris as $dataDebat)
                                            <tr>

                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $dataDebat->nama_sekolah }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $dataDebat->alamat_sekolah }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $dataDebat->nama_pembimbing }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $dataDebat->no_pembimbing }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $dataDebat->email_pembimbing }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $dataDebat->nama_lengkap }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $dataDebat->kelas }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $dataDebat->no_peserta }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $dataDebat->status }}
                                                    </p>
                                                </td>


                                                <td
                                                    class="text-xs text-secondary mb-0  @if ($dataDebat->status == 'verified' || $dataDebat->status == 'pending') d-none @endif">
                                                    <form action="/admin/verifikasi/{{ $dataDebat->id_daftar }}"
                                                        method="POST">
                                                        @csrf
                                                        <button class="btn btn-success badge">verified</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if (count($dataLombaDebatBahasaInggris) < 1)
                                            <center>
                                                <img src="{{ asset('image/datakosong.png') }}" alt=""
                                                    class="w-25 ">
                                            </center>
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

    </section>



    <script type="text/javascript">
        $(document).ready(function() {
            $('#table-datatables').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });
            $('#table-datatables2').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });
            $('#table-datatables3').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });
            $('#table-datatables4').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });
            $('#table-datatables5').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });
            $('#table-datatables6').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });
        });
    </script>
@endsection
