<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 mt-5 text-gray-800">Form Penentuan</h1>

    <div class="row">
        <div class="col-md-6">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('user/penentuan'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="form-group">
                    <label for="place_name">Nama Tempat</label>
                    <input name="place_name" id="place_name" class="form-control"></input>
                </div>

                <div class="form-group">
                    <label for="panjang">Panjang Lahan / Satuan Meter</label>
                    <input name="panjang" id="panjang" class="form-control"></input>
                </div>

                <div class="form-group">
                    <label for="lebar">Lebar Lahan / Satuan Meter</label>
                    <input name="lebar" id="lebar" class="form-control"></input>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Analisis</button>
                </div>
            </form>
        </div>
        <div class="col-md-6 text-center">
            <h3>Rekomendasi Pemberian Kapur</h3>
            <?php if (!empty($rekomendasi['score'])) : ?>
                <label class="btn btn-success"><?= $rekomendasi['score']; ?></label>
            <?php else : ?>
                <label>0</label>
            <?php endif; ?>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->