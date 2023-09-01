<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Rata-rata pH dalam perbulan</h1>

    <!-- Content Row -->
    <div class="row" style="margin-bottom: 450px;">
        <div class="col-sm-8 mb-4">
            <section class="graph">
                <!-- Di sini akan ditampilkan grafik pH tanah -->
                <canvas id="pHChart"></canvas>
            </section>
        </div>
        <div class="col-sm-4">
            <div class="row">
                <div class="col mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pengapuran</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalPengapuran; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-balance-scale fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Luas Lahan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalLuasLahan; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-ruler fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Rata-rata Kadar Keasaman</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $kadarKeasaman; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-chart-bar fa-2x text-gray-300"></i>
                                </div>
                            </div>
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

<script>
    $(document).ready(function() {
        $.ajax({
            url: '<?= base_url('admin/getAverage'); ?>',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                var dataFromDatabase = response;
                var labels = [];
                var values = [];

                $.each(dataFromDatabase.average_jan, function(index, data) {
                    labels.push(data.month);
                    values.push(data.average);
                });

                $.each(dataFromDatabase.average_feb, function(index, data) {
                    labels.push(data.month);
                    values.push(data.average);
                });

                $.each(dataFromDatabase.average_mar, function(index, data) {
                    labels.push(data.month);
                    values.push(data.average);
                });

                $.each(dataFromDatabase.average_apr, function(index, data) {
                    labels.push(data.month);
                    values.push(data.average);
                });

                $.each(dataFromDatabase.average_mei, function(index, data) {
                    labels.push(data.month);
                    values.push(data.average);
                });

                $.each(dataFromDatabase.average_june, function(index, data) {
                    labels.push(data.month);
                    values.push(data.average);
                });

                $.each(dataFromDatabase.average_july, function(index, data) {
                    labels.push(data.month);
                    values.push(data.average);
                });

                $.each(dataFromDatabase.average_august, function(index, data) {
                    labels.push(data.month);
                    values.push(data.average);
                });

                $.each(dataFromDatabase.average_sept, function(index, data) {
                    labels.push(data.month);
                    values.push(data.average);
                });

                $.each(dataFromDatabase.average_okt, function(index, data) {
                    labels.push(data.month);
                    values.push(data.average);
                });

                $.each(dataFromDatabase.average_nov, function(index, data) {
                    labels.push(data.month);
                    values.push(data.average);
                });

                $.each(dataFromDatabase.average_des, function(index, data) {
                    labels.push(data.month);
                    values.push(data.average);
                });

                var pHData = {
                    labels: labels,
                    datasets: [{
                        label: "pH Tanah",
                        data: values,
                        backgroundColor: "rgba(52, 152, 219, 0.5)"
                    }]
                };

                var ctx = document.getElementById("pHChart").getContext("2d");
                var pHChart = new Chart(ctx, {
                    type: "line",
                    data: pHData
                });

                console.log(dataFromDatabase);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
</script>