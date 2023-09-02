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
                <div class="col-lg-3 mb-4">

                    <?php foreach ($kondisi as $k) : ?>
                        <!-- Project Card Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Kadar Keasaman (Saat ini)</h6>
                                <h6 class="m-0 font-weight-bold text-primary" id="token"><?= $k['token']; ?></h6>
                            </div>
                            <div class="card-body">
                                <h4 class="font-weight-bold text-center display-2" id="ph"><?= $k['ph']; ?></h4>
                                <div class="mb-3">
                                    <h4 class="small font-weight-bold" id="date"><?= date('d M Y H:i:s', $k['date']); ?></h4>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->