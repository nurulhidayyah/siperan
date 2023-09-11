<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Latih</h1>
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>

                    <?= $this->session->flashdata('message'); ?>
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
                            <div class="row">
                                <div class="col-md-8">
                                    <a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#newData">Tambah Data Latih</a>
                                    <table>
                                        <tr>
                                            <th>Keterangan</th>
                                        </tr>
                                        <tr>
                                            <th>pH min</th>
                                            <td>: Nilai yang dihasilkan alat sensor pH</td>
                                        </tr>
                                        <tr>
                                            <th>pH max</th>
                                            <td>: Nilai yang tercapai setelah melakukan pengapuran</td>
                                        </tr>
                                        <tr>
                                            <th>Pengapuran</th>
                                            <td>: Jumlah pengapuran untuk menaikan satu angka pH</td>
                                        </tr>
                                        <tr>
                                            <th>Total Pengapuran</th>
                                            <td>: Jumlah pengapuran setelah dikalikan dengan selisih pH, persatuan meter persegi</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-4 text-right">
                                    <a href="<?= base_url('admin/generate_datalatih') ?>" target="blank" class="btn btn-primary">Generate Data Latih</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>pH Min</th>
                                        <th>pH Max</th>
                                        <th>Pengapuran</th>
                                        <th>Total Pengapuran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($latih as $l) : ?>
                                        <tr>
                                            <th scope=" row" id="number"><?= $i; ?></th>
                                            <td><?= $l['ph_min']; ?></td>
                                            <td><?= $l['ph_max']; ?></td>
                                            <td><?= $l['calcification']; ?></td>
                                            <td><?= $l['total']; ?></td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#updateData<?= $l['id']; ?>" class="badge badge-success">edit</a>
                                                <a href="#" data-toggle="modal" data-target="#delete<?= $l['id']; ?>" class="badge badge-danger">delete</a>
                                            </td>
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

<!-- Modal -->
<!-- Modal Tambah-->
<div class="modal fade" id="newData" tabindex="-1" role="dialog" aria-labelledby="newDataLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newDataLabel">Data Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/learning'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="ph_min" name="ph_min" placeholder="pH Min">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="ph_max" name="ph_max" placeholder="pH Max">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="calcification" name="calcification" placeholder="Jumlah Pengapuran">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit-->
<?php foreach ($latih as $l) : ?>
    <div class="modal fade" id="updateData<?= $l['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateDataLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateDataLabel">Update Users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/learnEdit/' . $l['id']); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="ph_min" name="ph_min" value="<?= $l['ph_min']; ?>" placeholder="pH Min" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="ph_max" name="ph_max" value="<?= $l['ph_max']; ?>" placeholder="pH Max">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="calcification" name="calcification" value="<?= $l['calcification']; ?>" placeholder="Jumlah Pengapuran">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal Hapus-->
<?php foreach ($latih as $l) : ?>
    <div class="modal fade" id="delete<?= $l['id']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Data Latih</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h5>Apakah Anda Yakin Ingin Menghapus Data Ini...??</h5>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('admin/learnDelete/' . $l['id']) ?>" class="btn btn-danger">Delete</a>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach; ?>