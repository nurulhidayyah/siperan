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
                <div class="col-md-6">
                    <!-- Page Heading -->
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>

                    <?= $this->session->flashdata('message'); ?>

                    <?php if (!empty($device)) : ?>
                        <?php if ($user['device_id'] === NULL) : ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Basic Card Example -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Belum Terhubung Dengan Perangkat</h6>
                                        </div>
                                        <div class="card-body text-center">
                                            <a href="#" class="btn btn-success mb-3 d-inline-block" data-toggle="modal" data-target="#newData">Ubah Perangkat</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Basic Card Example -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary"><?= $device['token']; ?></h6>
                                        </div>
                                        <div class="card-body text-center">
                                            <p><?= date('d M Y H:i:s', $device['date']); ?></p>
                                            <a href="#" class="btn btn-success mb-3 d-inline-block" data-toggle="modal" data-target="#newData">Ubah Perangkat</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php else : ?>
                        <p>Belum ada perangkat yang tersedia</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<!-- Modal Edit-->
<div class="modal fade" id="newData" tabindex="-1" role="dialog" aria-labelledby="newDataLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newDataLabel">Ubah Peangkat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('user/mydevice'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <select name="token" id="token" class="form-control">
                            <option value="">Select Token</option>
                            <?php foreach ($devices as $d) : ?>
                                <option value="<?= $d['id']; ?>"><?= $d['token']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>