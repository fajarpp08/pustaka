@extends('admin.layout.main')
@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="QA_section">
                        <div class="white_box_tittle list_header">
                            <h4>Laporan Data Pengembalian</h4>
                        </div>
                        <form action="{{ route('cetak_laporanpengembalian') }}" method="post">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-lg-3">
                                    <div class="white_box mb_30">
                                        <div class="input_wrap common_date_picker mb_20">
                                            <label class="form-label" for="tgl_mulai">Tanggal Mulai</label>
                                            <input class="input_form" id="start_datepicker" name="tgl_mulai"
                                                placeholder="Pilih tanggal mulai" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="white_box mb_30">
                                        <div class="input_wrap common_date_picker mb_20">
                                            <label class="form-label" for="tgl_akhir">Tanggal Akhir</label>
                                            <input class="input_form" id="end_datepicker" name="tgl_akhir"
                                                placeholder="Pilih tanggal akhir" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 d-flex justify-content-center align-items-center mb-6">
                                    <button class="btn_1" type="submit">Export</but>
                                </div>
                            </div>
                        </form>

                        <div class="QA_table mb_30">
                            <table class="table lms_table_active" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Nomor Anggota</th>
                                        <th scope="col">Judul Buku</th>
                                        <th scope="col">Tanggal Kembali</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengembalians as $pengembalian)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if ($pengembalian->peminjaman && $pengembalian->peminjaman->user)
                                                    {{ $pengembalian->peminjaman->user->nama }}
                                                @else
                                                    Data tidak ditemukan
                                                @endif
                                            </td>
                                            <td>
                                                @if ($pengembalian->peminjaman && $pengembalian->peminjaman->user)
                                                    {{ $pengembalian->peminjaman->user->noanggota }}
                                                @else
                                                    Data tidak ditemukan
                                                @endif
                                            </td>
                                            <td>
                                                @if ($pengembalian->peminjaman && $pengembalian->peminjaman->buku)
                                                    {{ $pengembalian->peminjaman->buku->judul }}
                                                @else
                                                    Data tidak ditemukan
                                                @endif
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($pengembalian->tgl_kembali)->isoFormat('DD MMMM YYYY') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
