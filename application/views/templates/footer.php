            <!-- Footer -->
            <footer class="sticky-footer bg-white" style="margin-top: 35%;">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto text-gray-600">
                        <span>Copyright &copy; SIPERAN <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

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

            <!-- grafik pH -->
            <script src="<?= base_url('assets/js/cdn.jsdelivr.net_npm_chart.js'); ?>" crossorigin="anonymous"></script>

            <script>
                $(document).ready(function() {
                    $.ajax({
                        url: '<?= base_url('user/getAverage'); ?>',
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

            <!-- Bootstrap core JavaScript-->
            <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
            <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

            <!-- Ajax untuk realtime -->
            <script src="<?= base_url('jquery/'); ?>jquery.min.js"></script>

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

            </body>

            </html>