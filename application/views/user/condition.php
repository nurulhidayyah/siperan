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

<script>
    $(document).ready(function() {
        // atur interval waktu untuk realtime

        setInterval(function() {
            fetch("<?= base_url('user/getDataFromLand'); ?>")
                .then(response => {
                    if (response.ok) {
                        return response.json();
                    }
                })
                .then(data => {
                    // console.log(data.kondisi);
                    data.kondisi.forEach(phData => {
                        const ph = document.getElementById("ph");
                        const token = document.getElementById("token");
                        const date = document.getElementById("date");

                        const unixTimestamp = parseInt(phData.date); // Replace with your Unix timestamp

                        // Convert Unix timestamp to milliseconds
                        const milliseconds = unixTimestamp * 1000;

                        // Create a Date object using the milliseconds
                        const dateObject = new Date(milliseconds);

                        const day = dateObject.toLocaleString('default', {
                            day: '2-digit'
                        });
                        const month = dateObject.toLocaleString('default', {
                            month: 'short'
                        });
                        const year = dateObject.getFullYear();
                        const hour = dateObject.getHours();
                        const minute = dateObject.getMinutes();
                        const second = dateObject.getSeconds().toString().padStart(2, '0');

                        // Format the components as a string
                        const formattedDateTime = day + ' ' + month + ' ' + year + ' ' + hour + ':' + minute + ':' + second;


                        ph.innerHTML = phData.ph;
                        token.innerHTML = phData.token;
                        date.innerHTML = formattedDateTime;
                    });
                })
                .catch(error => {
                    console.log(error)
                })

            // $('#cekph').load("<?php echo site_url('user/getDataFromLand') ?>");
        }, 1000); //untuk satu detik
    });
</script>