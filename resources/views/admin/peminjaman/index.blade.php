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
                            <h4>Data Peminjaman</h4>
                        </div>
                        <div class="QA_table mb_30">
                            <table class="table lms_table_active" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Nomor Anggota</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Lama Peminjaman</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($peminjamans as $peminjaman)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if ($peminjaman->user)
                                                    {{ $peminjaman->user->nama }}
                                                @else
                                                    nama tidak ditemukan
                                                @endif
                                            </td>
                                            <td>
                                                @if ($peminjaman->user)
                                                    {{ $peminjaman->user->noanggota }}
                                                @else
                                                    nomor sim tidak ditemukan
                                                @endif
                                            </td>
                                            <td>
                                                @if ($peminjaman->user)
                                                    {{ $peminjaman->user->alamat }}
                                                @else
                                                    nomor sim tidak ditemukan
                                                @endif
                                            </td>
                                            <td>
                                                @if ($peminjaman->buku->gambar_buku)
                                                    <img src="{{ asset('storage/buku/' . $peminjaman->buku->gambar_buku) }}"
                                                        alt="buku" class="img-fluid" width="150">
                                                @else
                                                    <img src="{{ asset('images/foto-profile.png') }}" alt="buku"
                                                        class="img-fluid rounded-circle" width="80">
                                                @endif
                                            </td>
                                            <td>
                                                @if ($peminjaman->buku)
                                                    {{ $peminjaman->buku->judul }}
                                                @else
                                                    data buku tidak ditemukan
                                                @endif
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($peminjaman->tgl_mulai)->isoFormat('DD MMMM YYYY') }}
                                                -
                                                {{ \Carbon\Carbon::parse($peminjaman->tgl_akhir)->isoFormat('DD MMMM YYYY') }}
                                            </td>
                                            <td><a
                                                    class="{{ $peminjaman->status_kembali !== 0 ? 'status_btn' : 'status_btn red_btn' }}">
                                                    {{ $peminjaman->status_kembali !== 0 ? 'Selesai' : 'Proses!' }}</a>
                                            </td>
                                            <td>
                                                <ul class="list-inline m-0">
                                                    <a href="/data-peminjaman/{{ $peminjaman->id }}/edit"
                                                        class="list-inline-item">
                                                        <button class="btn btn-success btn-sm rounded-0" type="button"
                                                            data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                                class="fa fa-edit"></i></button>
                                                    </a>
                                                    <form action="/data-peminjaman/{{ $peminjaman->id }}" method="post"
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
                                            {{-- <td>
                                                @forelse ($peminjamans as $daftarPinjaman)
                                                    @if (!$daftarPinjaman->status_kembali)
                                                        <!-- Tampilkan card hanya jika mobil belum dikembalikan -->
                                                        @php
                                                            $pinjamExist = true;
                                                        @endphp

                                                        <form
                                                            action="{{ route('kembalikan', ['pinjam' => $daftarPinjaman->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            <a class="add_button ms-2">

                                                                <button class="btn_1" type="submit"
                                                                    onclick="return confirm('Apakah Anda yakin untuk kembalikan buku?')"
                                                                    aria-label="Delete">Kembalikan Buku!
                                                                </button>
                                                            </a>
                                                        </form>
                                                    @endif
                                                @empty
                                                @endforelse
                                            </td> --}}
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                        {{-- pagination --}}
                        {{-- <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 mt-2 px-4">
                            @if (isset($peminjamans) && $peminjamans instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                {{ $peminjamans->links('pagination::bootstrap-5') }}
                            @endif
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
