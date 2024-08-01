@extends('admin.layout.main')
@section('menuDashboardAdmin', 'active')

@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="single_element">
                        <div class="quick_activity">
                            <div class="row">
                                <div class="col-12">
                                    <div class="quick_activity_wrap">
                                        <a class="single_quick_activity d-flex" href="/data-buku">
                                            <div class="icon">
                                                <img src="../assets-admin/img/icon/books.png" alt>
                                            </div>
                                            <div class="count_content">
                                                <h3><span class="counter">{{ @count($bukus) }}</span> </h3>
                                                <p>Data Buku</p>
                                            </div>
                                        </a>
                                        <a class="single_quick_activity d-flex" href="/data-peminjaman">
                                            <div class="icon">
                                                <img src="../assets-admin/img/icon/car-rental.png" alt>
                                            </div>
                                            <div class="count_content">
                                                <h3><span class="counter">{{ @count($peminjamans) }}</span> </h3>
                                                <p>Data Peminjaman</p>
                                            </div>
                                        </a>
                                        <a class="single_quick_activity d-flex" href="/data-pengembalian">
                                            <div class="icon">
                                                <img src="../assets-admin/img/icon/recycle.png" alt>
                                            </div>
                                            <div class="count_content">
                                                <h3><span class="counter">{{ @count($pengembalians) }}</span> </h3>
                                                <p>Data Pengembalian</p>
                                            </div>
                                        </a>
                                        <a class="single_quick_activity d-flex" href="/data-user">
                                            <div class="icon">
                                                <img src="../assets-admin/img/icon/user.png" alt>
                                            </div>
                                            <div class="count_content">
                                                <h3><span class="counter">{{ @count($users) }}</span> </h3>
                                                <p>Data User</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="white_box card_height_100">
                        <div class="box_header border_bottom_1px  ">
                            <div class="main-title">
                                <h3 class="mb_25">Our Books!</h3>
                            </div>
                        </div>
                        <div class="staf_list_wrapper sraf_active owl-carousel">
                            @foreach ($bukuData->sortByDesc('created_at') as $buku)
                                <div class="single_staf">
                                    <div class="staf_thumb">
                                        @if ($buku->gambar_buku)
                                            <img src="{{ asset('storage/buku/' . $buku->gambar_buku) }}" alt>
                                        @else
                                            <img src="{{ asset('assets-admin/img/profile_user.png') }}" alt="buku"
                                                class="img-fluid rounded-circle" width="80">
                                        @endif
                                        {{-- <img src="{{ asset('storage/buku/' . $buku->gambar_buku) }}" alt> --}}
                                    </div>
                                    <h4>{{ $buku->judul }}</h4>
                                    <p>{{ $buku->penulis }}</p>
                                    <p>Stok tersedia : {{ $buku->stok }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
