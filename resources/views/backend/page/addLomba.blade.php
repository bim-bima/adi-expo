@extends('layouts/appAdmin')
@section('content_admin')
    <section>

        <div class="container ps-5 pe-5">
            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $err }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert">X</button>
                    </div>
                @endforeach
            @endif
            <form action="{{ route('addLomba') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Lomba</label>
                    <input type="text" name="nama_lomba" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                   
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>

                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Harga</label>
                    <input type="text" name="harga" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                   
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tgl Mulai</label>
                    <input type="datetime-local" name="tgl_mulai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                   
                </div>
                
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tgl Selesai</label>
                    <input type="datetime-local" name="tgl_selesai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                   
                </div>


                <button type="submit" class="btn btn-primary float-end">Add</button>
                <a href="/admin/lomba" class="btn btn-secondary float-end me-2">Close</a>
            </form>
        </div>
    </section>

   
@endsection
