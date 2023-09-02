<footer class="main-footer text-center">
    <strong>Copyright &copy; 2023 <a href="#">SIPERAN</a>.</strong>
    All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>


<!-- jQuery -->
<script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>dist/js/adminlte.min.js"></script>

<!-- grafik pH -->
<script src="<?= base_url('assets/js/cdn.jsdelivr.net_npm_chart.js'); ?>" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $.ajax({
            url: '<?= base_url('grafik/getAverage'); ?>',
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

<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });



    $('.form-check-input1').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        });

    });
</script>

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
                    console.log(data);
                })
                .catch(error => {
                    console.log(error)
                })

            // $('#cekph').load("<?php echo site_url('user/getDataFromLand') ?>");
        }, 1000); //untuk satu detik
    });
</script>

</body>

</html>