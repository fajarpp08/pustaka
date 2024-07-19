@extends('user.layout.main')

@section('content')
    <main class="main">
        <div class="container">
            <div class="row">
                <!-- breadcrumb -->
                <div class="col-12">
                    <ul class="breadcrumbs">
                        <li class="breadcrumbs__item"><a href="/dashboarduser">Home</a></li>
                        <li class="breadcrumbs__item breadcrumbs__item--active">Explore Book</li>
                    </ul>
                </div>
                <!-- end breadcrumb -->

                <!-- title -->
                <div class="col-12">
                    <div class="main__title main__title--page">
                        <h1>Pilih buku yang diinginkan</h1>
                    </div>
                </div>
                <!-- end title -->

                <!-- filter -->
                <div class="row justify-content-center">
                    <form class="home__search" action="{{ route('buku.searchdate') }}" method="GET">
                        <div class="home__group">
                            <label for="search1">Cari merek atau model mobil yang diinginkan</label>
                            <input type="text" id="search1" name="keyword"
                                value="{{ isset($keyword) ? $keyword : '' }}" placeholder="Masukkan judul buku">
                        </div>

                        <div class="home__group">
                            <label for="search2">Cari tanggal untuk cek ketersediaan mobil</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control"
                                placeholder="Masukkan tanggal" autocomplete="off"
                                value="{{ isset($tanggal) ? $tanggal : '' }}">
                                {{-- value="{{ old('tgl_mulai', $peminjamans->tgl_mulai) }}" name="tgl_mulai"> --}}
                        </div>
                        <button name="submit" type="submit"><span>Search</span></button>
                    </form>
                </div>
                <!-- end filter -->
            </div>

            <div class="row">
                <!-- car -->
                @foreach ($bukus as $buku)
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="car">
                            <div class="splide splide--card car__slider">
                                <div class="splide__arrows">
                                    <button class="splide__arrow splide__arrow--prev" type="button"><svg
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M17,11H9.41l3.3-3.29a1,1,0,1,0-1.42-1.42l-5,5a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l5,5a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L9.41,13H17a1,1,0,0,0,0-2Z">
                                            </path>
                                        </svg></button>
                                    <button class="splide__arrow splide__arrow--next" type="button"><svg
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z">
                                            </path>
                                        </svg></button>
                                </div>

                                <div class="splide__track">
                                    <ul class="splide__list">
                                        <li class="splide__slide">
                                            <img src="{{ asset('storage/buku/' . $buku->gambar_buku) }}" alt="">
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="car__title">
                                <h3 class="car__name"><a
                                        href="{{ route('buku.detail', ['id' => $buku->id]) }}">{{ $buku->judul }}</a>
                                </h3>
                                <span class="car__year">{{ $buku->stok }}</span>
                            </div>
                            <div class="car__footer">
                                <span class="car__price">{{ $buku->penulis }}</span>
                                <a href="{{ route('buku.detail', ['id' => $buku->id]) }}"
                                    class="car__detail"><span>Detail</span></a>
                                <a href="{{ route('pinjam.form', ['buku_id' => $buku->id]) }}"
                                    data-harga="{{ $buku->harga }}" class="car__more"><span>Pinjam</span></a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- end car -->
            </div>
        </div>
    </main>
    <!-- end main content -->
@endsection
