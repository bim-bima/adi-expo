@extends('layouts/appAdmin')
@section('content_admin')
    <section>

        <div class="container ps-5 pe-5">
            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $err }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" >X</button>
                    </div>
                @endforeach
            @endif
            <form action="/admin/kegiatan/edit/{{ $kegiatan->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Kegiatan</label>
                    <input type="text" name="nama_kegiatan" class="form-control" id="exampleInputEmail1" value="{{ $kegiatan->nama_kegiatan }}" aria-describedby="emailHelp">
                   
                </div>
                
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Deskripsi :</label>
                    <textarea class="form-control" name="deskripsi" id="exampleInputEmail1" aria-describedby="emailHelp">{{ $kegiatan->deskripsi }}</textarea>

                </div>
                <div class="mb-3">
                    <label for="image">
                        <span>
                            <p class="form-label">Upload SVG <span class="text-danger">(Max width & Height 576px)</span> :</p>
                            <i class="fa-solid fa-upload fs-3"></i>
                        </span>
                    </label>
                    <input type="file" name="image" class="d-none" id="image" onchange="previewImage()">
                    <img id="preview" class="w-25">
                </div>

                <input type="hidden" name="imageLama" value="{{ $kegiatan->image }}">
                
                <button type="submit" class="btn btn-warning float-end">Save</button>
                <a href="/admin/kegiatan" class="btn btn-secondary float-end me-2">Close</a>
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
