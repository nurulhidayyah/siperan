<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <style>
        body {
            margin-top: 20px;
            background-color: #f7f7ff;
        }

        #invoice {
            padding: 0px;
        }

        .invoice {
            position: relative;
            background-color: #FFF;
            min-height: 680px;
            padding: 15px
        }

        .invoice header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #0d6efd
        }

        .invoice .company-details {
            text-align: right
        }

        .invoice .company-details .name {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .contacts {
            margin-bottom: 20px
        }

        .invoice .invoice-to {
            text-align: left
        }

        .invoice .invoice-to .to {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .invoice-details {
            text-align: right
        }

        .invoice .invoice-details .invoice-id {
            margin-top: 0;
            color: #0d6efd
        }

        .invoice main {
            padding-bottom: 50px
        }

        .invoice main .thanks {
            margin-top: -100px;
            font-size: 2em;
            margin-bottom: 50px
        }

        .invoice main .notices {
            padding-left: 6px;
            border-left: 6px solid #0d6efd;
            background: #e7f2ff;
            padding: 10px;
        }

        .invoice main .notices .notice {
            font-size: 1.2em
        }

        .invoice table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px
        }

        .invoice table td,
        .invoice table th {
            padding: 15px;
            background: #eee;
            border-bottom: 1px solid #fff
        }

        .invoice table th {
            white-space: nowrap;
            font-weight: 400;
            font-size: 16px
        }

        .invoice table td h3 {
            margin: 0;
            font-weight: 400;
            color: #0d6efd;
            font-size: 1.2em
        }

        .invoice table .qty,
        .invoice table .total,
        .invoice table .unit {
            text-align: right;
            font-size: 1.2em
        }

        .invoice table .no {
            color: #fff;
            font-size: 1.6em;
            background: #0d6efd
        }

        .invoice table .unit {
            background: #ddd
        }

        .invoice table .total {
            background: #0d6efd;
            color: #fff
        }

        .invoice table tbody tr:last-child td {
            border: none
        }

        .invoice table tfoot td {
            background: 0 0;
            border-bottom: none;
            white-space: nowrap;
            text-align: right;
            padding: 10px 20px;
            font-size: 1.2em;
            border-top: 1px solid #aaa
        }

        .invoice table tfoot tr:first-child td {
            border-top: none
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0px solid rgba(0, 0, 0, 0);
            border-radius: .25rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
        }

        .invoice table tfoot tr:last-child td {
            color: #0d6efd;
            font-size: 1.4em;
            border-top: 1px solid #0d6efd
        }

        .invoice table tfoot tr td:first-child {
            border: none
        }

        .invoice footer {
            width: 100%;
            text-align: center;
            color: #777;
            border-top: 1px solid #aaa;
            padding: 8px 0
        }

        @media print {
            .invoice {
                font-size: 11px !important;
                overflow: hidden !important
            }

            .invoice footer {
                position: absolute;
                bottom: 10px;
                page-break-after: always
            }

            .invoice>div:last-child {
                page-break-before: always
            }
        }

        .invoice main .notices {
            padding-left: 6px;
            border-left: 6px solid #0d6efd;
            background: #e7f2ff;
            padding: 10px;
        }
    </style>

</head>

<body id="page-top">

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div id="invoice">
                    <div class="invoice overflow-auto">
                        <div style="min-width: 600px">
                            <main>
                                <table style="border-bottom: 5px solid #000; border-style: outset;">
                                    <tr>
                                        <td colspan="2" width="150" style="padding-left: 100px;">
                                            <center><img src="<?= base_url('assets'); ?>/img/logo.png" width="100" alt=""></center>
                                        </td>
                                        <!-- <td></td> -->
                                        <td colspan="10" width="500" style="padding-right: 100px;">
                                            <center>
                                                <font style="font-size: 22px; font-weight: bold;">PEMERINTAH PROVINSI BANTEN</font><br>
                                                <font style="font-size: 25px; font-weight: bold;">DINAS PERTANIAN</font><br>
                                                <font style="font-size: 22px; font-weight: bold;">UPTD BENIH DAN PERLINDUNGAN TANAMAN PANGAN HORTIKULTURA DAN PERKEBUNAN</font> <br>
                                                <font style="font-size: 13px;">Alamat : Jl. SawahLuhur Pos Km. 07 Kelurahan SawahLuhur Kasemen Kota Serang Provinsi Banten</font>
                                            </center>
                                        </td>
                                    </tr>
                                </table>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th align="text-right">Nama Tempat</th>
                                            <th align="text-right">Luas Lahan</th>
                                            <th align="text-right">Kadar Keasaman</th>
                                            <th align="text-right">Jumlah Pengapuran</th>
                                            <th align="text-right">Bulan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($laporan as $l) : ?>
                                            <tr>
                                                <th scope=" row" id="number"><?= $i; ?></th>
                                                <td><?= $l['place_name']; ?></td>
                                                <td><?= $l['surfac_area']; ?></td>
                                                <td><?= $l['ph']; ?></td>
                                                <td><?= $l['score']; ?></td>
                                                <td><?= date('d-m-Y', strtotime($l['created_at'])); ?></td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </main>

                        </div>
                        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table style="text-align: left">
        <tr>
            <th align="text-left">Keterangan</th>
        </tr>
        <tr>
            <td>Kadar Keasaman</td>
            <td>:</td>
            <td>Nilai yang dihasilkan alat sensor pH</td>
        </tr>
        <tr>
            <td>Jumlah Pengapuran</td>
            <td>:</td>
            <td>Hasil dari penentuan kapur pertanian yang harus diberikan</td>
        </tr>
    </table>