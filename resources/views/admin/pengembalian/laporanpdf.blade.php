<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Pengembalian</title>
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
        <h5 class="card-header" style="text-align: center;">Laporan Data Pengembalian</h5>

        <table>
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nomor Anggota</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Kembali</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach ($pengembalians as $pengembalian)
                    <tr class="text-center">
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="table-cell">
                            @if ($pengembalian->peminjaman && $pengembalian->peminjaman->user)
                                {{ $pengembalian->peminjaman->user->nama }}
                            @else
                                Data tidak ditemukan
                            @endif
                        </td>
                        <td class="table-cell">
                            @if ($pengembalian->peminjaman && $pengembalian->peminjaman->user)
                                {{ $pengembalian->peminjaman->user->noanggota }}
                            @else
                                Data tidak ditemukan
                            @endif
                        </td>
                        <td class="table-cell">
                            @if ($pengembalian->peminjaman && $pengembalian->peminjaman->buku)
                                {{ $pengembalian->peminjaman->buku->judul }}
                            @else
                                Data tidak ditemukan
                            @endif
                        </td>
                        <td class="table-cell">
                            {{ \Carbon\Carbon::parse($pengembalian->tgl_kembali)->isoFormat('DD MMMM YYYY') }}</td>
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
