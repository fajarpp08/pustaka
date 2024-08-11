@extends('user.layout.main')
@section('content')
    <!-- main content -->
    <main class="main">
        <div class="container">
            <div class="row">
                <!-- breadcrumb -->
                <div class="col-12">
                    <ul class="breadcrumbs">
                        <li class="breadcrumbs__item"><a href="index.html">Home</a></li>
                        <li class="breadcrumbs__item breadcrumbs__item--active">Informasi</li>
                    </ul>
                </div>
                <!-- end breadcrumb -->

                <!-- title -->
                <div class="col-12">
                    <div class="main__title main__title--page">
                        <h1>Informasi Perpustakaan</h1>
                    </div>
                </div>
                <!-- end title -->

                <!-- tabs nav -->
                <div class="col-12">
                    <ul class="nav nav-tabs main__tabs main__tabs--page" id="main__tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="active" data-bs-toggle="tab" data-bs-target="#tab-1" type="button"
                                role="tab" aria-controls="tab-1" aria-selected="true">Pengumuman</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button data-bs-toggle="tab" data-bs-target="#tab-2" type="button" role="tab"
                                aria-controls="tab-2" aria-selected="false">Galeri</button>
                        </li>
                    </ul>
                </div>
                <!-- end tabs nav -->
            </div>

            <div class="tab-content">

                {{-- Pengumuman --}}
                <div class="tab-pane fade show active" id="tab-1" role="tabpanel">
                    <div class="row">
                        <!-- post -->
                        @foreach ($pengumumans as $pengumuman)
                            <div class="col-12 col-md-6 col-xl-4">
                                <div class="post">
                                    <a href="{{ route('pengumuman.detail', ['slug' => $pengumuman->slug]) }}"
                                        class="post__img">
                                        <img src="{{ asset('storage/pengumuman/' . $pengumuman->gambar_pengumuman) }}"
                                            alt="" style="height: 400px; object-fit: cover;">
                                    </a>
                                    <div class="post__content">
                                        <h4 class="post__title" style="margin-bottom: 0px"><a
                                                href="{{ route('pengumuman.detail', ['slug' => $pengumuman->slug]) }}">{{ $pengumuman->judul_pengumuman }}</a>
                                        </h4>
                                        <div class="post__meta">
                                            <span class="post__date"><svg xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M15,11H13V7a1,1,0,0,0-2,0v5a1,1,0,0,0,1,1h3a1,1,0,0,0,0-2ZM12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.00917,8.00917,0,0,1,12,20Z" />
                                                </svg>{{ \Carbon\Carbon::parse($pengumuman->tanggal_pengumuman)->isoFormat('DD MMMM YYYY') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- end post -->
                    </div>
                </div>
                {{-- End Pengumuman --}}


                {{-- Galeri --}}
                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                    <div class="row">
                        <!-- post -->
                        @foreach ($galeris as $galeri)
                            <div class="col-12 col-md-6 col-xl-4">
                                <div class="post">
                                    <a href="#" class="post__img">
                                        <img src="{{ asset('storage/galeri/' . $galeri->gambar_galeri) }}" alt=""
                                            style="height: 400px; object-fit: cover;">
                                    </a>

                                    <div class="post__content">
                                        <h4 class="post__title" style="margin-bottom: 0px">
                                            <a>{{ $galeri->judul_galeri }}</a>
                                        </h4>
                                        <div class="post__meta">
                                            <span class="post__date"><svg xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M15,11H13V7a1,1,0,0,0-2,0v5a1,1,0,0,0,1,1h3a1,1,0,0,0,0-2ZM12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.00917,8.00917,0,0,1,12,20Z" />
                                                </svg>{{ \Carbon\Carbon::parse($galeri->tanggal_galeri)->isoFormat('DD MMMM YYYY') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- end post -->
                    </div>
                </div>
                {{-- End Galeri --}}

            </div>
        </div>
    </main>
    <!-- end main content -->
@endsection
