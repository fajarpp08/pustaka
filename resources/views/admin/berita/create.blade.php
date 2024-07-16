@extends('admin.layout.main')
@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_box mb_30">
                        <div class="box_header ">
                            <div class="main-title">
                                <h3 class="mb-0">Add Data Berita</h3>
                            </div>
                        </div>
                        <form class="needs-validation" action ="/data-berita" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Judul Berita</label>
                                <input type="text" id="exampleFormControlInput1" placeholder="Masukkan judul berita"
                                    class="form-control @error('judul_berita') is-invalid @enderror"
                                    value="{{ old('judul_berita') }}" name="judul_berita">
                                @error('judul_berita')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Tanggal Berita</label>
                                <input type="date" id="exampleFormControlInput1" placeholder="Masukkan Tanggal Berita"
                                    class="form-control @error('tanggal_berita') is-invalid @enderror"
                                    value="{{ old('tanggal_berita') }}" name="tanggal_berita">
                                @error('tanggal_berita')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Deskripsi Berita</label>
                                <input type="text" id="exampleFormControlInput1" placeholder="Masukkan Deskripsi Berita"
                                    class="form-control @error('deskripsi_berita') is-invalid @enderror"
                                    value="{{ old('deskripsi_berita') }}" name="deskripsi_berita">
                                @error('deskripsi_berita')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label input-group mb-3" for="inputGroupFile02">Gambar</label>
                                <input type="file" class="form-control" value="{{ old('gambar_berita') }}"
                                    name="gambar_berita" id="inputGroupFile02">
                                @error('gambar_berita')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="container mt-3">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="/data-berita" class="btn btn-secondary btn-lg">Back</a>
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
