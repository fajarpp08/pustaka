@extends('admin.layout.main')
@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_box mb_30">
                        <div class="box_header ">
                            <div class="main-title">
                                <h3 class="mb-0">Edit Data Galeri</h3>
                            </div>
                        </div>
                        <form class="needs-validation" action ="/data-galeri/{{ $galeris->id }}" method="post"
                            enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Judul Galeri</label>
                                <input type="text" id="exampleFormControlInput1" placeholder="Masukkan judul galeri"
                                    class="form-control @error('judul_galeri') is-invalid @enderror"
                                    value="{{ old('judul_galeri', $galeris->judul_galeri) }}" name="judul_galeri">
                                @error('judul_galeri')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Deskripsi Galeri</label>
                                <input type="text" id="exampleFormControlInput1" placeholder="Masukkan deskripsi galeri"
                                    class="form-control @error('deskripsi_galeri') is-invalid @enderror"
                                    value="{{ old('deskripsi_galeri', $galeris->deskripsi_galeri) }}"
                                    name="deskripsi_galeri">
                                @error('deskripsi_galeri')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label input-group mb-3" for="inputGroupFile02">Gambar berita</label>
                                <input type="file" class="form-control"
                                    value="{{ old('gambar_galeri', $galeris->gambar_galeri) }}" name="gambar_galeri"
                                    id="inputGroupFile02">
                                @error('gambar_galeri')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="container mt-3">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="/data-galeri" class="btn btn-secondary btn-lg">Back</a>
                                    </div>
                                    <div class="col text-end">
                                        <button class="btn btn-primary btn-lg" type="submit" name="submit">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
