<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Peminjaman</title>
    <style type="text/css">
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 5px;
            text-align: left;
            font-size: 10pt;
            /* Ukuran font diperkecil */
        }
    </style>
</head>

<body>
    <div class="text-center">
        <h5 class="card-header" style="text-align: center;">Laporan Data Peminjaman</h5>

        <table>
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nomor Anggota</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach ($peminjamans as $peminjaman)
                    <tr class="text-center">
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="table-cell">
                            @if ($peminjaman->user)
                                {{ $peminjaman->user->nama }}
                            @else
                                nama tidak ditemukan
                            @endif
                        </td>
                        <td class="table-cell">
                            @if ($peminjaman->user)
                                {{ $peminjaman->user->noanggota }}
                            @else
                                nosim tidak ditemukan
                            @endif
                        </td>
                        <td class="table-cell">
                            @if ($peminjaman->buku)
                                {{ $peminjaman->buku->judul }}
                            @else
                                merk tidak ditemukan
                            @endif
                        </td>
                        <td class="table-cell">
                            @if ($peminjaman->buku)
                                {{ $peminjaman->buku->penulis }}
                            @else
                                noplat tidak ditemukan
                            @endif
                        </td>
                        <td class="table-cell">
                            {{ \Carbon\Carbon::parse($peminjaman->tgl_mulai)->isoFormat('DD MMMM YYYY') }}
                            -
                            {{ \Carbon\Carbon::parse($peminjaman->tgl_akhir)->isoFormat('DD MMMM YYYY') }}</td>
                        <td>{{ $peminjaman->status_kembali !== 0 ? 'Selesai' : 'Proses!' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>
