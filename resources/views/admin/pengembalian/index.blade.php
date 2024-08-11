@extends('admin.layout.main')
@section('content')
    <div class="main_content_iner ">
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
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="QA_section">
                        <div class="white_box_tittle list_header">
                            <h4>Data Pengembalian Buku</h4>
                        </div>
                        <div class="QA_table mb_30">
                            <table class="table lms_table_active" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Nomor Anggota</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Judul</th>
                                        {{-- <th scope="col">Penulis</th> --}}
                                        <th scope="col">Tanggal Kembali</th>
                                        {{-- <th scope="col">Status</th> --}}
                                        <th scope="col">Action</th>
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
                                                @if ($pengembalian->peminjaman->buku->gambar_buku)
                                                    <img src="{{ asset('storage/buku/' . $pengembalian->peminjaman->buku->gambar_buku) }}"
                                                        alt="buku" class="img-fluid" width="150">
                                                @else
                                                    <img src="{{ asset('images/foto-profile.png') }}" alt="buku"
                                                        class="img-fluid rounded-circle" width="80">
                                                @endif
                                            </td>
                                            <td>
                                                @if ($pengembalian->peminjaman && $pengembalian->peminjaman->buku)
                                                    {{ $pengembalian->peminjaman->buku->judul }}
                                                @else
                                                    Data tidak ditemukan
                                                @endif
                                            </td>
                                            {{-- <td>
                                                @if ($pengembalian->peminjaman && $pengembalian->peminjaman->buku)
                                                    {{ $pengembalian->peminjaman->buku->penulis }}
                                                @else
                                                    Data tidak ditemukan
                                                @endif
                                            </td> --}}
                                            <td>{{ \Carbon\Carbon::parse($pengembalian->tgl_kembali)->isoFormat('DD MMMM YYYY') }}
                                            </td>
                                            <td>
                                                <ul class="list-inline m-0">
                                                    <a href="/data-pengembalian/{{ $pengembalian->id }}/edit"
                                                        class="list-inline-item">
                                                        <button class="btn btn-success btn-sm rounded-0" type="button"
                                                            data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                                class="fa fa-edit"></i></button>
                                                    </a>
                                                    <form action="/data-pengembalian/{{ $pengembalian->id }}" method="post"
                                                        class="list-inline-item">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm rounded-0" type="submit"
                                                            data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                                onclick="return confirm('Yakin akan menghapus data?')"
                                                                class="fa fa-trash"></i></button>
                                                    </form>
                                                </ul>
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
