@extends('admin.layout.main')
@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_box mb_30">
                        <div class="box_header ">
                            <div class="main-title">
                                <h3 class="mb-0">Add Data Buku</h3>
                            </div>
                        </div>
                        <form class="needs-validation" action ="/data-buku/{{ $bukus->id }}" method="post"
                            enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Judul</label>
                                <input type="text" id="exampleFormControlInput1" placeholder="Masukkan judul buku"
                                    class="form-control @error('judul') is-invalid @enderror"
                                    value="{{ old('judul', $bukus->judul) }}" name="judul">
                                @error('judul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Penulis</label>
                                <input type="text" id="exampleFormControlInput1" placeholder="Masukkan penulis"
                                    class="form-control @error('penulis') is-invalid @enderror"
                                    value="{{ old('penulis', $bukus->penulis) }}" name="penulis">
                                @error('penulis')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Nomor Plat</label>
                                <input type="text" id="exampleFormControlInput1" placeholder="Masukkan nomor plat mobil"
                                    class="form-control @error('noplat') is-invalid @enderror"
                                    value="{{ old('noplat', $mobils->noplat) }}" name="noplat">
                                @error('noplat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Sinopsis</label>
                                <input type="text" id="exampleFormControlInput1" placeholder="Masukkan sinopsis"
                                    class="form-control @error('sinopsis') is-invalid @enderror"
                                    value="{{ old('sinopsis', $bukus->sinopsis) }}" name="sinopsis">
                                @error('sinopsis')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="kategori_id">Kategori</label>
                                <select class="form-control" type="text" id="kategori_id" placeholder="Pilih Kategori"
                                    name="kategori_id">
                                    <option selected disabled>- Pilih kategori -</option>
                                    @foreach ($kategoris as $kategori)
                                        @if (old('kategori_id', $kategori->kategori_id) == $kategori->id)
                                            <option value="{{ $kategori->id }}" selected>{{ $kategori->nama_kategori }}
                                            </option>
                                        @else
                                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Harga</label>
                                <input type="number" id="exampleFormControlInput1"
                                    placeholder="Masukkan harga sewa mobil per hari"
                                    class="form-control @error('harga') is-invalid @enderror"
                                    value="{{ old('harga', $mobils->harga) }}" name="harga">
                                @error('harga')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                            <div class="mb-3">
                                <label class="form-label input-group mb-3" for="inputGroupFile02">Gambar buku</label>
                                <input type="file" class="form-control"
                                    value="{{ old('gambar_buku', $bukus->gambar_buku) }}" name="gambar_buku"
                                    id="inputGroupFile02">
                                @error('gambar_buku')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="container mt-3">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="/data-buku" class="btn btn-secondary btn-lg">Back</a>
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
