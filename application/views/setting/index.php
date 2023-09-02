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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <div style="overflow: hidden; height: 100px;">
                                    <img class="profile-user-img img-fluid" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="User profile picture" width="100">
                                </div>
                            </div>

                            <h3 class="profile-username text-center"><?= $user['name']; ?></h3>

                            <strong><i class="fas fa-envelope"></i> Email</strong>

                            <p class="text-muted">
                                <?= $user['email']; ?><br>
                                registered since <?= date('d F Y', $user['date_created']); ?>
                            </p>

                            <hr>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->