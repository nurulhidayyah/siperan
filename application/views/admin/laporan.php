<!-- Begin Page Content -->
<div class="container-fluid">

    <?php if (!empty($laporan)) : ?>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
            <div class="card-body">
                <a target="_blank" href="<?= base_url('admin/generate_laporan') ?>" class="btn btn-primary mt-2">Preview or Download</a>
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
                </div>
            </div>
        </div>

    <?php else : ?>
        <p class="text-center">Belum ada data</p>
    <?php endif; ?>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->