<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Rata-rata pH dalam perbulan</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Content Row -->
            <div class="row">
                <div class="col-sm-8 mb-4">
                    <section class="graph">
                        <!-- Di sini akan ditampilkan grafik pH tanah -->
                        <canvas id="pHChart"></canvas>
                    </section>
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?= $totalPengapuran; ?></h3>

                                    <p>Total Pengapuran</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-balance-scale fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?= $totalLuasLahan; ?></h3>

                                    <p>Total Luas Lahan</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-ruler fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?= $kadarKeasaman; ?></h3>

                                    <p>Rata-rata Kadar Keasaman</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-chart-bar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->