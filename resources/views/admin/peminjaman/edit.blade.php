@extends('admin.layout.main')
@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_box mb_30">
                        <div class="box_header ">
                            <div class="main-title">
                                <h3 class="mb-0">Edit Data Peminjaman</h3>
                            </div>
                        </div>
                        <form class="needs-validation" action ="/data-peminjaman/{{ $peminjamans->id }}" method="post"
                            enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlSelect1">Nama</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="user_id">
                                    @foreach ($users as $user)
                                        @if (old('user_id', $peminjamans->user_id) == $user->id)
                                            <option value="{{ $user->id }}" selected>{{ $user->nama }}</option>
                                        @else
                                            <option value="{{ $user->id }}">{{ $user->nama }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlSelect1">Buku</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="buku_id">
                                    @foreach ($bukus as $buku)
                                        @if (old('buku_id', $peminjamans->buku_id) == $buku->id)
                                            <option value="{{ $buku->id }}" selected>{{ $buku->judul }}</option>
                                        @else
                                            <option value="{{ $buku->id }}">{{ $buku->judul }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Tanggal Mulai</label>
                                <input type="date" id="exampleFormControlInput1" placeholder="Masukkan tanggal mulai"
                                    class="form-control @error('tgl_mulai') is-invalid @enderror"
                                    value="{{ old('tgl_mulai', $peminjamans->tgl_mulai) }}" name="tgl_mulai">
                                @error('tgl_mulai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Tanggal Akhir</label>
                                <input type="date" id="exampleFormControlInput1" placeholder="Masukkan tanggal akhir"
                                    class="form-control @error('tgl_akhir') is-invalid @enderror"
                                    value="{{ old('tgl_akhir', $peminjamans->tgl_akhir) }}" name="tgl_akhir">
                                @error('tgl_akhir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="container mt-3">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="/data-peminjaman" class="btn btn-secondary btn-lg">Back</a>
                                    </div>
                                    <div class="col text-end">
                                        <button class="btn btn-primary btn-lg" type="submit" name="submit">Update</button>
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
