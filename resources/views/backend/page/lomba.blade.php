@extends('layouts/appAdmin')
@section('content_admin')
    <section class="">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show animate__animated animate__bounce"
                                    role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close">X</button>
                                </div>
                            @elseif (session()->has('danger'))
                                <div class="alert alert-danger alert-dismissible fade show animate__animated animate__bounce"
                                    role="alert">
                                    {{ session('danger') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close">X</button>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-6">
                                    <h6>Table Lomba</h6>

                                </div>
                                <div class="col-6">
                                    <a href="/admin/lomba/add" class="btn btn-primary float-end btn-sm">Add</a>

                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nama Lomba</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Harga</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                                Tgl Mulai</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Tgl Selesai</th>


                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($lombas as $lomba)
                                            <tr>

                                                <td>

                                                    <p class="text-xs text-secondary mb-0">{{ $lomba->nama_lomba }}</p>
                                                </td>
                                                <td>

                                                    <p class="text-xs text-secondary mb-0">{{ $lomba->harga }}</p>
                                                </td>
                                                <td>

                                                    <p class="text-xs text-secondary mb-0">{{ $lomba->tgl_mulai }}</p>
                                                </td>
                                                <td>

                                                    <p class="text-xs text-secondary mb-0">{{ $lomba->tgl_selesai }}</p>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="/admin/lomba/edit/{{ $lomba->id_lomba }}"
                                                        class="text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        Edit
                                                    </a>

                                                    <form action="/admin/lomba/delete/{{ $lomba->id_lomba }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button onclick="return confirm('Yakin Ingin Menghapus ?')"
                                                            class="border-0 bg-transparent text-secondary font-weight-bold text-xs">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if (count($lombas) < 1)
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
@endsection
