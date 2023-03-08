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
            <form action="{{ route('addKegiatan') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Kegiatan</label>
                    <input type="text" name="nama_kegiatan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                   
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>

                </div>
                <div class="mb-3">
                    <label for="image">
                        <span>
                            <p class="form-label">Upload Gambar</p>
                            <i class="fa-solid fa-upload fs-3"></i>
                        </span>
                    </label>
                    <input type="file" name="image" class="d-none" id="image" onchange="previewImage()">
                    <img id="preview" class="w-25">
                </div>

                <button type="submit" class="btn btn-primary float-end">Add</button>
                <a href="/admin/tamu" class="btn btn-secondary float-end me-2">Close</a>
            </form>
        </div>
    </section>

    <script>
        function previewImage() {
            var preview = document.querySelector('#preview');
            var file = document.querySelector('#image').files[0];
            var reader = new FileReader();

            reader.addEventListener("load", function() {
                preview.src = reader.result;
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
