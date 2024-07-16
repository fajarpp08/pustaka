@extends('admin.layout.main')
@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_box mb_30">
                        <div class="box_header ">
                            <div class="main-title">
                                <h3 class="mb-0">Add Data Pengumuman</h3>
                            </div>
                        </div>
                        <form class="needs-validation" action ="/data-pengumuman" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Judul Pengumuman</label>
                                <input type="text" id="exampleFormControlInput1" placeholder="Masukkan judul pengumuman"
                                    class="form-control @error('judul_pengumuman') is-invalid @enderror"
                                    value="{{ old('judul_pengumuman') }}" name="judul_pengumuman">
                                @error('judul_pengumuman')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Tanggal Pengumuman</label>
                                <input type="date" id="exampleFormControlInput1" placeholder="Masukkan Tanggal pengumuman"
                                    class="form-control @error('tanggal_pengumuman') is-invalid @enderror"
                                    value="{{ old('tanggal_pengumuman') }}" name="tanggal_pengumuman">
                                @error('tanggal_pengumuman')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Deskripsi Pengumuman</label>
                                <input type="text" id="exampleFormControlInput1" placeholder="Masukkan Deskripsi pengumuman"
                                    class="form-control @error('deskripsi_pengumuman') is-invalid @enderror"
                                    value="{{ old('deskripsi_pengumuman') }}" name="deskripsi_pengumuman">
                                @error('deskripsi_pengumuman')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label input-group mb-3" for="inputGroupFile02">Gambar</label>
                                <input type="file" class="form-control" value="{{ old('gambar_pengumuman') }}"
                                    name="gambar_pengumuman" id="inputGroupFile02">
                                @error('gambar_pengumuman')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="container mt-3">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="/data-pengumuman" class="btn btn-secondary btn-lg">Back</a>
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
