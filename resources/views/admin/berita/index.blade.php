@extends('admin.layout.main')
@section('content')
    {{-- @if (session()->has('pesan'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <i class="fas fa-check"></i> {{ session('pesan') }}
        </div>
    @endif --}}
    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="QA_section">
                        <div class="white_box_tittle list_header">
                            <h4>Data Berita</h4>
                            <div class="box_right d-flex lms_block">
                                {{-- search --}}
                                {{-- <div class="serach_field_2">
                                    <div class="search_inner">
                                        <form action="{{ route('mobils.searchname') }}" method="get">
                                            <div class="search_field">
                                                <input type="text" name="keyword"
                                                    value="{{ isset($keyword) ? $keyword : '' }}"   
                                                    placeholder="Search content here...">
                                            </div>
                                            <button type="submit"> <i class="ti-search"></i> </button>
                                        </form>
                                    </div>
                                </div> --}}
                                {{-- end search --}}
                                <div class="add_button ms-2">
                                    <a href="/data-berita/create" class="btn_1">Add New</a>
                                </div>
                            </div>
                        </div>
                        <div class="QA_table mb_30">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul Berita</th>
                                        <th scope="col">Deskripsi Berita</th>
                                        <th scope="col">Tanggal Berita</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($beritas->sortByDesc('created_at') as $berita)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $berita->judul_berita }}</td>
                                            <td>{{ $berita->deskripsi_berita }}</td>
                                            <td>{{ $berita->tanggal_berita }}</td>
                                            <td>
                                                @if ($berita->gambar_berita)
                                                    <img src="{{ asset('storage/berita/' . $berita->gambar_berita) }}"
                                                        alt="berita" class="img-fluid" width="150">
                                                @else
                                                    <img src="{{ asset('assets-admin/img/profile_user.png') }}"
                                                        alt="berita" class="img-fluid rounded-circle" width="80">
                                                @endif
                                            </td>
                                            <td>
                                                <ul class="list-inline m-0">
                                                    <a href="/data-berita/{{ $berita->id }}/edit"
                                                        class="list-inline-item mb-1">
                                                        <button class="btn btn-success btn-sm rounded-0" type="button"
                                                            data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                                class="fa fa-edit"></i></button>
                                                    </a>
                                                    <form action="/data-berita/{{ $berita->id }}" method="post"
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
                        {{-- pagination --}}
                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 mt-2 px-4">
                            @if (isset($beritas) && $beritas instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                {{ $beritas->links('pagination::bootstrap-5') }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
