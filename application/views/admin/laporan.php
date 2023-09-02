<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title; ?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a target="_blank" href="<?= base_url('admin/generate_laporan') ?>" class="btn btn-primary">Preview or Download</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
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
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->