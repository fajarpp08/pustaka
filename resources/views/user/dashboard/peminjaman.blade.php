@extends('user.layout.main')
@section('content')
    {{-- dd($completedPinjamans); --}}
    <!-- main content -->
    <main class="main">
        <div class="container">
            {{-- DAFTAR PEMINJAMAN  --}}
            <!-- title -->
            <div class="col-12">
                <div class="main__title main__title--page">
                    <h1>Daftar Peminjaman</h1>
                </div>
            </div>
            <!-- end title -->

            {{-- content --}}
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

                                                    @php
                                                        $pinjamExist = false;
                                                    @endphp

                                                    @forelse ($ongoingPinjamans as $daftarPinjaman)
                                                        @if (!$daftarPinjaman->status_kembali)
                                                            <!-- Tampilkan card hanya jika mobil belum dikembalikan -->
                                                            @php
                                                                $pinjamExist = true;
                                                            @endphp
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
                                                                    {{-- <td>Rp. {{ $daftarPinjaman->total_harga }}</td> --}}
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
                                                                    {{-- <form action="{{ route('kembalikan', ['peminjaman' => $peminjaman->id]) }}" method="post">
                                                                        @csrf
                                                                        <button type="submit" class="btn btn-danger py-2 mt-1" onclick="return confirm('Apakah Anda yakin untuk dikembalikan?')">Kembalikan</button>
                                                                    </form> --}}
                                                                </tr>
                                                            </tbody>
                                                        @endif
                                                    @empty
                                                        {{-- <div class="col-md-12">
                                                            <p>Anda belum pernah melakukan penyewaan, mulai penyewaan.</p>
                                                        </div> --}}
                                                    @endforelse

                                                    @if (!$pinjamExist)
                                                        <div class="col-md-12">
                                                            <p style="color: black;">Anda belum melakukan peminjaman buku
                                                                saat ini,
                                                                mari melakukan peminjaman lagi.</p>
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
                                                    @php
                                                        $pinjamExist = false;
                                                    @endphp

                                                    @forelse ($completedPinjamans as $riwayatPinjaman)
                                                        {{-- @if (!$riwayatPinjaman->status_kembali) --}}
                                                        <!-- Tampilkan card hanya jika mobil belum dikembalikan -->
                                                        @php
                                                            $pinjamExist = true;
                                                        @endphp
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

                                                                {{-- <td>
                                                        <a class="{{ $riwayatPinjaman->status_kembali ? 'status_btn' : 'status_btn red_btn' }}">
                                                            {{ $riwayatPinjaman->status_kembali ? 'Selesai' : 'Proses!' }}
                                                        </a>
                                                    </td> --}}
                                                            </tr>
                                                        </tbody>
                                                        {{-- @endif --}}
                                                    @empty
                                                        <div class="col-md-12">
                                                            <p>Anda belum pernah melakukan peminjaman buku, mulai
                                                                peminjaman.</p>
                                                            <a href="/buku" type="button"
                                                                class="btn btn-primary btn-sm">Mulai pinjam</a>
                                                        </div>
                                                    @endforelse

                                                    {{-- @if (!$pinjamExist)
                                                        <div class="col-md-12">
                                                            <p style="color: black;">Anda belum melakukan penyewaan buku
                                                                saat ini,
                                                                mari melakukan penyewaan lagi.</p>
                                                        </div>

                                                    @endif --}}
                                                </table>
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
