<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Riwayat Penentuan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th>Nama Tempat</th>
                            <th>Luas Lahan</th>
                            <th>Kadar Keasaman</th>
                            <th>Jumlah Pengapuran</th>
                            <th>Bulan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($result as $r) : ?>
                            <tr>
                                <th scope=" row" id="number"><?= $i; ?></th>
                                <td><?= $r['place_name']; ?></td>
                                <td><?= $r['surfac_area']; ?></td>
                                <td><?= $r['ph']; ?></td>
                                <td><?= $r['score']; ?></td>
                                <td><?= date('d-m-Y', strtotime($r['created_at'])); ?></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->