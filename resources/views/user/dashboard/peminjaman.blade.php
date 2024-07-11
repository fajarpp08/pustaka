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
                        <li class="breadcrumbs__item breadcrumbs__item--active">Data Peminjaman</li>
                    </ul>
                </div>
                <!-- end breadcrumb -->

                <!-- title -->
                <div class="col-12">
                    <div class="main__title main__title--page">
                        <h1>Daftar buku yang dipinjam</h1>
                    </div>
                </div>
                <!-- end title -->
            </div>

            <div class="row">
                <div class="col-12">
                    {{-- <div class="profile">
                        <!-- tabs nav -->
                        <ul class="nav nav-tabs profile__tabs" id="profile__tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="active" data-bs-toggle="tab" data-bs-target="#tab-1" type="button"
                                    role="tab" aria-controls="tab-1" aria-selected="true">Data</button>
                            </li>
                        </ul>
                        <!-- end tabs nav -->
                    </div> --}}

                    <!-- content tabs -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel" tabindex="0">
                            <div class="row">
                                <div class="col-12">
                                    <!-- cart -->
                                    <div class="cart">
                                        <div class="cart__table-wrap">
                                            <div class="cart__table-scroll">
                                                <table class="cart__table">
                                                    {{-- dd($pinjamanUser); --}}
                                                    <thead>
                                                        <tr>
                                                            <th></th> 
                                                            <th>Judul</th> 
                                                            <th>Penulis</th>
                                                            <th>Sinopsis</th>
                                                            <th>Tanggal pinjam</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    @php
                                                        $pinjamExist = false;
                                                    @endphp

                                                    @forelse ($pinjamanUser as $pinjam)
                                                        @if (!$pinjam->status_kembali)
                                                            <!-- Tampilkan card hanya jika mobil belum dikembalikan -->
                                                            @php
                                                                $pinjamExist = true;
                                                            @endphp
                                                            <tbody id="card{{ $pinjam->id }}">
                                                                <tr>
                                                                    <td>
                                                                        <div class="cart__img">
                                                                            <img src="{{ asset('storage/buku/' . $pinjam->buku->gambar_buku) }}"
                                                                                alt="">
                                                                        </div>
                                                                    </td>
                                                                    <td><a href="car.html">{{ $pinjam->buku->judul }}</a>
                                                                    </td>
                                                                    <td>{{ $pinjam->buku->penulis }}</td>
                                                                    <td>{{ $pinjam->buku->sinopsis }}</td>
                                                                    <td><span
                                                                            class="cart__price">{{ \Carbon\Carbon::parse($pinjam->tgl_mulai)->isoFormat('DD MMMM YYYY') }}
                                                                            -
                                                                            {{ \Carbon\Carbon::parse($pinjam->tgl_akhir)->isoFormat('DD MMMM YYYY') }}</span>
                                                                    </td>
                                                                    {{-- <td>Rp. {{ $pinjam->total_harga }}</td> --}}
                                                                    <td>
                                                                        <form
                                                                            action="{{ route('kembalikan', ['pinjam' => $pinjam->id]) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <button class="cart__delete" type="submit"
                                                                                onclick="return confirm('Apakah Anda yakin untuk kembalikan buku?')"
                                                                                aria-label="Delete"><svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    viewBox="0 0 24 24">
                                                                                    <path
                                                                                        d="M13.41,12l6.3-6.29a1,1,0,1,0-1.42-1.42L12,10.59,5.71,4.29A1,1,0,0,0,4.29,5.71L10.59,12l-6.3,6.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l6.29,6.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z">
                                                                                    </path>
                                                                                </svg>
                                                                            </button>
                                                                        </form>
                                                                    </td>
                                                                    {{-- <form action="{{ route('kembalikan', ['peminjaman' => $peminjaman->id]) }}" method="post">
                                                                        @csrf
                                                                        <button type="submit" class="btn btn-danger py-2 mt-1" onclick="return confirm('Apakah Anda yakin untuk dikembalikan?')">Kembalikan</button>
                                                                    </form> --}}
                                                                </tr>
                                                            </tbody>
                                                        @endif
                                                    @empty
                                                        <div class="col-md-12">
                                                            <p>Anda belum pernah melakukan penyewaan, mulai penyewaan.</p>
                                                        </div>
                                                    @endforelse

                                                    @if (!$pinjamExist)
                                                        <div class="col-md-12">
                                                            <p style="color: black;">Anda belum melakukan penyewaan mobil
                                                                saat ini,
                                                                mari melakukan penyewaan lagi.</p>
                                                        </div>
                                                        <a href="/buku" type="button"
                                                            class="btn btn-primary btn-sm">Mulai pinjam</a>
                                                    @endif
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end cart -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end content tabs -->
                </div>
            </div>
        </div>
    </main>
    <script>
        function pengembalianMobil(id) {
            // Menghilangkan tampilan card berdasarkan id
            document.getElementById('card' + id).style.display = 'none';
        }
    </script>
    <!-- end main content -->
@endsection
