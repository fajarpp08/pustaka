<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Delisa Delicious</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('sb2/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('sb2/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <style>
        * {
            color: black;
        }

        #t3 td {
            padding: 10px 0;
        }

        #alamat p {
            margin-bottom: -3px;
        }
    </style>

</head>

<body id="page-top">

    <header class="mt-5">
        <div class="row" style="width: 95%;">
            <div class="col-4">
                <img src="<?= base_url('logo.png') ?>" width="100" class=" ml-5" alt="">
            </div>
            <div id="alamat" class="col-8">
                <p style="text-align: end;">CV DELISA DELICIOUS</p>
                <p class="" style="text-align: end;">Gg. Rusa II No.34, Nagri Kidul, Kec. Purwakarta, Kabupaten
                </p>
                <p style="text-align: end;">PURWAKARTA, JAWA BARAT 411111</p>
            </div>
        </div>
    </header>

    <div class="mx-auto" style="width: 95%;">
        <hr>
        <hr>
    </div>
    <section style="">
        <h2 class="text-center">Faktur Permintaan</h2>

        <div class="p-3 mx-5">

            <table>
                <tr>
                    <td width="10%">No Permintaan</td>
                    <td class="text-center">:</td>
                    <td width="85%"><?= $kode['kode_permintaan'] ?></td>
                </tr>
                <tr>
                    <td width="10%">Nama Cabang</td>
                    <td class="text-center">:</td>
                    <td width="85%"><?= $kode['id_cabang'] ?></td>
                </tr>
                <tr>
                    <td width="10%">Tanggal</td>
                    <td class="text-center">:</td>
                    <td width="85%"><?= $kode['tanggal'] ?></td>
                </tr>
            </table>

            <table class="table table-bordered">
                <tr>
                    <th>Kode Product</th>
                    <th>Nama Product</th>
                    <th>Jumlah </th>
                    <th>catatan</th>
                </tr>
                <?php 
                    foreach ($datas as $data) :
                ?>
                <tr>
                    <td><?= $data['id_produk'] ?></td>
                    <td><?= $data['nama_produk'] ?></td>
                    <td><?= $data['jumlah'] ?></td>
                    <td><?= $data['catatan'] ?></td>
                </tr>
                <?php 
                    endforeach;
                ?>
            </table>


            <div class="row mx-auto text-center">
                <p class="col-3">Purchasing</p>
                <p class="col-6"> </p>
                <p class="col-3">Supervisor Outlet</p>
            </div>
            <div class="row mt-5 mx-auto text-center">
                <p class="col-3">...................</p>
                <p class="col-6"> </p>
                <p class="col-3">...................</p>
            </div>
        </div>
    </section>

    <script>
        window.print();
    </script>
</body>

</html>
