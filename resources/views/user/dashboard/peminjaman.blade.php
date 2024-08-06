@extends('user.layout.main')
@section('content')
    <!-- main content -->
    <main class="main">
        <div class="container">
            {{-- DAFTAR PEMINJAMAN  --}}

            {{-- content --}}
            <div class="row">
                <!-- breadcrumb -->
                <div class="col-12">
                    <ul class="breadcrumbs">
                        <li class="breadcrumbs__item"><a href="index.html">Home</a></li>
                        <li class="breadcrumbs__item breadcrumbs__item--active">Peminjaman</li>
                    </ul>
                </div>
                <!-- end breadcrumb -->
                <!-- title -->
                <div class="col-12">
                    <div class="main__title main__title--page">
                        <h1>Daftar Peminjaman</h1>
                    </div>
                </div>
                <!-- end title -->
                <div class="col-12">

                    <!-- Data Peminjaman OnGoing -->
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

                                                    @forelse ($ongoingPinjamans as $daftarPinjaman)
                                                        @if (!$daftarPinjaman->status_kembali)
                                                            <!-- Tampilkan card hanya jika mobil belum dikembalikan -->
                                                            @php
                                                                $pinjamExist = true;
                                                            @endphp
                                                            <tbody id="card{{ $daftarPinjaman->id }}">
                                                                <tr>
                                                                    <td>
                                                                        <div class="cart__img">
                                                                            <img src="{{ asset('storage/buku/' . $daftarPinjaman->buku->gambar_buku) }}"
                                                                                class="img-fluid rounded img-zoomin w-100"
                                                                                alt=""
                                                                                style="height: 200px; object-fit: cover;">
                                                                        </div>
                                                                    </td>
                                                                    <td><a
                                                                            href="car.html">{{ $daftarPinjaman->buku->judul }}</a>
                                                                    </td>
                                                                    <td>{{ $daftarPinjaman->buku->penulis }}</td>
                                                                    <td>{{ $daftarPinjaman->buku->sinopsis }}</td>
                                                                    <td><span
                                                                            class="cart__price">{{ \Carbon\Carbon::parse($daftarPinjaman->tgl_mulai)->isoFormat('DD MMMM YYYY') }}
                                                                            -
                                                                            {{ \Carbon\Carbon::parse($daftarPinjaman->tgl_akhir)->isoFormat('DD MMMM YYYY') }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <form
                                                                            action="{{ route('kembalikan', ['pinjam' => $daftarPinjaman->id]) }}"
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
                                                                </tr>
                                                            </tbody>
                                                        @endif
                                                    @empty
                                                    @endforelse


                                                </table>
                                                @if (!$pinjamExist)
                                                    <div class="col-md-12">
                                                        <p style="color: black;">
                                                            Saat ini anda belum melakukan peminjaman buku,
                                                            mari melakukan peminjaman lagi.</p>
                                                    </div>
                                                    <a href="/buku" type="button" class="btn btn-primary btn-sm">Mulai
                                                        pinjam</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end cart -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Data Peminjaman OnGoing -->
                </div>
            </div>
            {{-- end content --}}

            {{-- END DAFTAR PEMINJAMAN  --}}


            {{-- RIWAYAT PEMINJAMAN  --}}

            <!-- title -->
            <div class="col-12">
                <div class="main__title main__title--page">
                    <h1>Riwayat Peminjaman</h1>
                </div>
            </div>
            <!-- end title -->

            {{-- content --}}
            <div class="row">
                <div class="col-12">

                    <!-- Data Riwayat Peminjaman-->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel" tabindex="0">
                            <div class="row">
                                <div class="col-12">
                                    <!-- cart -->
                                    <div class="cart">
                                        <div class="cart__table-wrap">
                                            <div class="cart__table-scroll">

                                                <table class="cart__table">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>Judul</th>
                                                            <th>Penulis</th>
                                                            <th>Sinopsis</th>
                                                            <th>Tanggal pinjam</th>
                                                            <th>Status</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>

                                                    @php
                                                        $pinjamExist = false;
                                                    @endphp

                                                    @forelse ($completedPinjamans as $riwayatPinjaman)
                                                        <!-- Tampilkan card hanya jika buku belum dikembalikan -->
                                                        @php
                                                            $pinjamExist = true;
                                                        @endphp

                                                        <tbody id="card{{ $riwayatPinjaman->id }}">
                                                            <tr>
                                                                <td>
                                                                    <div class="cart__img">
                                                                        <img src="{{ asset('storage/buku/' . $riwayatPinjaman->buku->gambar_buku) }}"
                                                                            class="img-fluid rounded img-zoomin w-100"
                                                                            alt=""
                                                                            style="height: 200px; object-fit: cover;">
                                                                    </div>
                                                                </td>
                                                                <td><a
                                                                        href="car.html">{{ $riwayatPinjaman->buku->judul }}</a>
                                                                </td>
                                                                <td>{{ $riwayatPinjaman->buku->penulis }}</td>
                                                                <td>{{ $riwayatPinjaman->buku->sinopsis }}</td>
                                                                <td><span
                                                                        class="cart__price">{{ \Carbon\Carbon::parse($riwayatPinjaman->tgl_mulai)->isoFormat('DD MMMM YYYY') }}
                                                                        -
                                                                        {{ \Carbon\Carbon::parse($riwayatPinjaman->tgl_akhir)->isoFormat('DD MMMM YYYY') }}</span>
                                                                </td>
                                                                <td><a
                                                                        class="{{ $riwayatPinjaman->status_kembali !== 0 ? 'status_btn' : 'status_btn red_btn' }}">
                                                                        {{ $riwayatPinjaman->status_kembali !== 0 ? 'Selesai' : 'Proses!' }}</a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    @empty
                                                    @endforelse


                                                </table>
                                                @if (!$pinjamExist)
                                                    <div class="col-md-12">
                                                        <p style="color: black;">Anda belum pernah melakukan peminjaman
                                                            buku,
                                                            mari melakukan peminjaman.</p>
                                                    </div>
                                                    <a href="/buku" type="button" class="btn btn-primary btn-sm">Mulai
                                                        pinjam</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end cart -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Data Riwayat Peminjaman -->
                </div>
            </div>
            {{-- end content --}}

            {{-- END RIWAYAT PEMINJAMAN  --}}

        </div>
    </main>
    <script>
        function pengembalianBuku(id) {
            // Menghilangkan tampilan card berdasarkan id
            document.getElementById('card' + id).style.display = 'none';
        }
    </script>
    <!-- end main content -->
@endsection
