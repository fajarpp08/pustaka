<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rental Mobil</title>
    <link rel="icon" href="{{ asset('assets-user/img/logo-sekolah.png') }}" type="image/png">

    <style id="" media="all">
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://colorlib.com/fonts.gstatic.com/s/montserrat/v26/JTUHjIg1_i6t8kCHKm4532VJOt5-QNFgpCtr6Hw5aX8.ttf) format('truetype');
        }

        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(https://colorlib.com/fonts.gstatic.com/s/montserrat/v26/JTUHjIg1_i6t8kCHKm4532VJOt5-QNFgpCuM73w5aX8.ttf) format('truetype');
        }
    </style>
    <link type="text/css" rel="stylesheet" href="{{ asset('assets-forms/css/bootstrap.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets-forms/css/style.css') }}" />
    <meta name="robots" content="noindex, follow">
</head>

<body>
    <div id="booking" class="section">
        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-md-push-5">
                        <div class="booking-cta">
                            <h1>Perpustakaan </h1>
                            <h1> MTsN 4 Kota Padang</h1>
                            <p>Sistem Informasi Perpustakaan MTsN 4 Kota Padang
                            </p>
                            <p>Memudahkan siswa dalam melakukan peminjaman pada semua jenis buku yang ada pada
                                perpustakaan.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-pull-7">
                        <div class="booking-form">
                            <form action="/pinjam/create" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <span class="form-title">Form Peminjaman</span>
                                </div>
                                <input type="hidden" name="buku_id" value="{{ $bukus->id }}">

                                <div class="form-group">
                                    <span class="form-label">Nama</span>
                                    <input class="form-control" type="text" value="{{ $users }}"
                                        name="user_id" readonly>
                                </div>
                                <div class="form-group">
                                    <span class="form-label">Nomor Anggota</span>
                                    <input class="form-control" type="text" value="{{ $nama }}"
                                        name="user_id" readonly>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="form-label">Tanggal Mulai</span>
                                            <input class="form-control sign__input" type="date" placeholder="Date"
                                                id="tgl_mulai" name="tgl_mulai"
                                                min="{{ \Carbon\Carbon::now()->toDateString() }}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="form-label">Tanggal Selesai</span>
                                            <input class="form-control sign__input" type="date" name="tgl_akhir"
                                                placeholder="Date" id="tgl_akhir" e1
                                                min="{{ \Carbon\Carbon::now()->toDateString() }}" required>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <span class="form-label">Total Harga</span>
                                    <input class="form-control sign__input" type="text" id="total_harga"
                                        name="total_harga" placeholder="Total Harga" data-harga="{{ $mobils->harga }}"
                                        readonly>
                                </div> --}}
                                <div class="form-btn">
                                    <a href="/dashboarduser" type="button" class="go-back-btn">Kembali</a>
                                    <button type="submit" name="submit" class="submit-btn">Pesan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
