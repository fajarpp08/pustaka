@extends('user.layout.main')

@section('content')
    <div class="container" style="margin-bottom: 50px; margin-top: 80px;">
        <div class="row">
            <!-- breadcrumb -->
            <div class="col-12 col-xl-10 offset-xl-1">
                <ul class="breadcrumbs">
                    <li class="breadcrumbs__item"><a href="index.html">Home</a></li>
                    <li class="breadcrumbs__item"><a href="blog.html">Informasi</a></li>
                    <li class="breadcrumbs__item breadcrumbs__item--active">Detail Pengumuman</li>
                </ul>
            </div>
            <!-- end breadcrumb -->
            <!-- title -->
            <div class="col-24">
                <div class="main__title main__title--page" style="margin-left: 100px">
                    <h1>Detail Pengumuman</h1>
                </div>
            </div>
            <!-- end title -->
            <div class="col-12 col-xl-10 offset-xl-1">
                <div class="article">
                    <!-- article content -->
                    <div class="article__content">
                        {{-- @foreach ($pengumumans as $pengumuman) --}}
                        <img src="{{ asset('storage/pengumuman/' . $pengumumans->gambar_pengumuman) }}" alt=""
                            style="height: 600px; object-fit: cover;">

                        <div class="article__meta">
                            <span class="article__date">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M15,11H13V7a1,1,0,0,0-2,0v5a1,1,0,0,0,1,1h3a1,1,0,0,0,0-2ZM12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.00917,8.00917,0,0,1,12,20Z" />
                                </svg>{{ \Carbon\Carbon::parse($pengumumans->tanggal_pengumumans)->isoFormat('DD MMMM YYYY') }}</span>
                        </div>

                        <h3>{{ $pengumumans->judul_pengumuman }}</h3>
                        <p>{{ $pengumumans->deskripsi_pengumuman }}</p>
                    </div>
                    {{-- @endforeach --}}
                    <!-- end article content -->
                </div>
            </div>
        </div>
    </div>
@endsection
