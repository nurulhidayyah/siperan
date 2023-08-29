<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 mt-5 text-gray-800">Data Latih</h1>

    <div class="row">
        <div class="col-md-6">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>
            <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newData">Tambah Data Latih</a>
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">pH Min</th>
                            <th scope="col">pH Max</th>
                            <th scope="col">Pengapuran</th>
                            <th scope="col">Total</th>
                            <th scope="col">Aksi</th>
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
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

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
                        <input type="text" class="form-control" id="ph_max" name="ph_max" placeholder="pH Min">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="calcification" name="calcification" placeholder="Pengapuran">
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
                            <input type="text" class="form-control" id="calcification" name="calcification" value="<?= $l['calcification']; ?>" placeholder="calcification">
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