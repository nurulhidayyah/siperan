<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-md-6">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 mt-3 text-gray-800">Perangkat Saya</h1>
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <!-- <div class="table-responsive">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Token</th>
                            <th scope="col">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <tr>
                            <th scope=" row" id="number"><?= $i; ?></th>
                            <td id="token"><?= $device['token']; ?></td>
                            <td id="date"><?= date('d M Y H:i:s', $device['date']); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div> -->
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
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

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