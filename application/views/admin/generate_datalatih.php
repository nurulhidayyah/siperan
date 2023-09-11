<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Data Latih</title>
    <style>
        #halaman {
            width: 700px;
            height: auto;
            position: absolute;
            margin-right: 40px;
        }

        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>
    <div id="halaman">
        <table style="border-bottom: 5px solid #000; border-style: outset; margin-bottom: 10px;">
            <tr>
                <td colspan="2" width="100">
                    <center><img src="<?= base_url('assets'); ?>/img/logo.png" width="100" alt=""></center>
                </td>
                <!-- <td></td> -->
                <td colspan="10" width="700">
                    <center>
                        <font style="font-size: 22px; font-weight: bold;">PEMERINTAH PROVINSI BANTEN</font><br>
                        <font style="font-size: 25px; font-weight: bold;">DINAS PERTANIAN</font><br>
                        <font style="font-size: 22px; font-weight: bold;">UPTD BENIH DAN PERLINDUNGAN TANAMAN PANGAN HORTIKULTURA DAN PERKEBUNAN</font> <br>
                        <font style="font-size: 14px;">Alamat : Jl. SawahLuhur Pos Km. 07 Kelurahan SawahLuhur Kasemen Kota Serang Provinsi Banten</font>
                    </center>
                </td>
            </tr>
        </table>
        <table id="customers">
            <thead>
                <tr>
                    <th>No</th>
                    <th>pH Min</th>
                    <th>pH Max</th>
                    <th>Pengapuran</th>
                    <th>Total Pengapuran</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($latih as $l) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $l['ph_min']; ?></td>
                        <td><?= $l['ph_max']; ?></td>
                        <td><?= $l['calcification']; ?></td>
                        <td><?= $l['total']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <table style="text-align: left">
            <tr>
                <th align="text-left">Keterangan</th>
            </tr>
            <tr>
                <td>pH min</td>
                <td>:</td>
                <td>Nilai yang dihasilkan alat sensor pH</td>
            </tr>
            <tr>
                <td>pH max</td>
                <td>:</td>
                <td>Nilai yang tercapai setelah melakukan pengapuran</td>
            </tr>
            <tr>
                <td>Pengapuran</td>
                <td>:</td>
                <td>Jumlah pengapuran untuk menaikan satu angka pH</td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;">Total Pengapuran</td>
                <td style="padding-bottom: 20px;">:</td>
                <td>Nilai pengapuran setelah dikalikan dengan selisih pH, persatuan meter persegi</td>
            </tr>
        </table>
    </div>
</body>