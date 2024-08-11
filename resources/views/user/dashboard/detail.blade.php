@extends('user.layout.main')

@section('content')
    <!-- main content -->
    <main class="main">
        {{-- call pesan error --}}
        @if ($errors->any())
            <div class="alert alert-danger" id="error-alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{-- end call pesan error --}}
        <div class="container">
            <section class="row">
                <!-- breadcrumb -->
                <div class="col-12">
                    <ul class="breadcrumbs">
                        <li class="breadcrumbs__item"><a href="index.html">Home</a></li>
                        <li class="breadcrumbs__item"><a href="cars.html">Explore cars</a></li>
                        <li class="breadcrumbs__item breadcrumbs__item--active">{{ $bukus->judul }}</li>
                    </ul>
                </div>
                <!-- end breadcrumb -->

                <!-- title -->
                <div class="col-12">
                    <div class="main__title main__title--page">
                        <h1>{{ $bukus->judul }} - {{ $bukus->penulis }}</h1>
                    </div>
                </div>
                <!-- end title -->

                <!-- details -->
                <div class="col-12 col-lg-7">
                    <div class="details">
                        <div class="splide splide--details details__slider">
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
                                        <img src="{{ asset('storage/buku/' . $bukus->gambar_buku) }}" alt=""
                                            style="height: 700px; object-fit: cover;">
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <ul id="thumbnails" class="thumbnails">
                            <li class="thumbnail">
                                <img src="{{ asset('storage/buku/' . $bukus->foto) }}" alt="">
                            </li>
                            <li class="thumbnail">
                                <img src="{{ asset('storage/buku/' . $bukus->foto) }}" alt="">
                            </li>
                            <li class="thumbnail">
                                <img src="{{ asset('storage/buku/' . $bukus->foto) }}" alt="">
                            </li>
                            <li class="thumbnail">
                                <img src="{{ asset('storage/buku/' . $bukus->foto) }}" alt="">
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- end details -->

                <!-- offer -->
                <div class="col-12 col-lg-5">
                    <div class="offer">
                        <span class="offer__title">Detail buku</span>
                        <div class="offer__wrap">
                            <span class="offer__price">{{ $bukus->judul }}</span>
                            <a href="{{ route('pinjam.form', ['buku_id' => $bukus->id]) }}" type="button"
                                class="offer__rent"><span>Pinjam</span></a>
                        </div>

                        {{-- <span class="offer__title">Detail Mobil</span> --}}
                        <ul class="offer__list">
                            <li>
                                <span class="offer__list-name">Stok tersedia</span>
                                <span class="offer__list-value">{{ $bukus->stok }}</span>
                            </li>
                            <li>
                                <span class="offer__list-name">Judul</span>
                                <span class="offer__list-value">{{ $bukus->judul }}</span>
                            </li>
                            <li>
                                <span class="offer__list-name">Penulis</span>
                                <span class="offer__list-value">{{ $bukus->penulis }}</span>
                            </li>
                            <li>
                                <span class="offer__list-name">Sinopsis</span>
                            </li>
                            <li>
                                <span class="offer__list-value">{{ $bukus->sinopsis }} </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- end offer -->

            </section>
        </div>

        {{-- other book --}}
        <div class="container">
            <!-- book -->
            <section class="row">
                <!-- title -->
                <div class="col-12">
                    <div class="main__title">
                        <h2>You may also like</h2>

                        <a href="/buku" class="main__link">View more <svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24">
                                <path
                                    d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z" />
                            </svg></a>
                    </div>
                </div>
                <!-- end title -->

                @foreach ($bukusAll as $bukusAll)
                    <!-- car -->
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
                                            <img src="{{ asset('storage/buku/' . $bukusAll->gambar_buku) }}" alt=""
                                                style="height: 500px; object-fit: cover;">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="car__title">
                                <h3 class="car__name"><a
                                        href="{{ route('buku.detail', ['slug' => $bukusAll->id]) }}">{{ $bukusAll->judul }}</a>
                                </h3>
                                <span class="car__year">{{ $bukusAll->stok }}</span>
                            </div>
                            <div class="car__footer">
                                <span class="car__price">{{ $bukusAll->penulis }}</span>
                                <a href="{{ route('buku.detail', ['slug' => $bukusAll->id]) }}"
                                    class="car__detail"><span>Detail</span></a>
                                <a href="{{ route('pinjam.form', ['buku_id' => $bukusAll->id]) }}"
                                    class="car__more"><span>Pinjam</span></a>
                            </div>
                        </div>
                    </div>
                    <!-- end book -->
                @endforeach

            </section>
            <!-- end book -->
        </div>
    </main>
    <!-- end main content -->

@endsection
