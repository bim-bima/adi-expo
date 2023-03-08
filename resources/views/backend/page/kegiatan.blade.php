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
                                    <h6>Table Kegiatan</h6>

                                </div>
                                <div class="col-6">
                                    <a href="/admin/kegiatan/add" class="btn btn-primary float-end btn-sm">Add</a>

                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Image</th>
                                                
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Nama Kegiatan</th>

                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Date</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($kegiatans as $kegiatan)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="{{ asset('storage/image/kegiatan/' . $kegiatan->image) }}"
                                                                class="avatar avatar-sm ms-2" alt="hallo">
                                                        </div>

                                                    </div>
                                                </td>
                                                <td>

                                                    <p class="text-xs text-secondary mb-0">{{ $kegiatan->nama_kegiatan }}</p>
                                                </td>

                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $kegiatan->created_at->format('D M Y') }}</span>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="/admin/kegiatan/edit/{{ $kegiatan->id }}"
                                                        class="text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        Edit
                                                    </a>

                                                    <form action="/admin/kegiatan/delete/{{ $kegiatan->id }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button onclick="return confirm('Yakin Ingin Menghapus ?')"
                                                            class="border-0 bg-transparent text-secondary font-weight-bold text-xs">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if (count($kegiatans) < 1)
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
