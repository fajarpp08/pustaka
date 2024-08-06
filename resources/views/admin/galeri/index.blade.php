@extends('admin.layout.main')
@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="QA_section">
                        <div class="white_box_tittle list_header">
                            <h4>Data Galeri</h4>
                            <div class="box_right d-flex lms_block">
                                <div class="add_button ms-2">
                                    <a href="/data-galeri/create" class="btn_1">Add New</a>
                                </div>
                            </div>
                        </div>
                        <div class="QA_table mb_30">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul Galeri</th>
                                        <th scope="col">Deskripsi Galeri</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($galeris->sortByDesc('created_at') as $galeri)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $galeri->judul_galeri }}</td>
                                            <td>{{ $galeri->deskripsi_galeri }}</td>
                                            <td>
                                                @if ($galeri->gambar_galeri)
                                                    <img src="{{ asset('storage/galeri/' . $galeri->gambar_galeri) }}"
                                                        alt="galeri" class="img-fluid" width="150">
                                                @else
                                                    <img src="{{ asset('assets-admin/img/profile_user.png') }}"
                                                        alt="galeri" class="img-fluid rounded-circle" width="80">
                                                @endif
                                            </td>
                                            <td>
                                                <ul class="list-inline m-0">
                                                    <a href="/data-galeri/{{ $galeri->id }}/edit"
                                                        class="list-inline-item mb-1">
                                                        <button class="btn btn-success btn-sm rounded-0" type="button"
                                                            data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                                class="fa fa-edit"></i></button>
                                                    </a>
                                                    <form action="/data-galeri/{{ $galeri->id }}" method="post"
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
                            @if (isset($galeris) && $galeris instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                {{ $galeris->links('pagination::bootstrap-5') }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
