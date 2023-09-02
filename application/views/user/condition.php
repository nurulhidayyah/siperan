<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIPERAN | <?= $title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- Profile Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                            <?= $user['name']; ?>
                        </span>
                        <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" width="30" height="30">
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            My Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal" class="dropdown-item">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url('setting'); ?>" class="brand-link">
                <i class="fas fa-tractor ml-3"></i>
                <span class="brand-text font-weight-light mx-3">SIPERAN APP</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class=" elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $user['name']; ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <!-- QUERY MENU -->
                        <?php
                        $role_id = $this->session->userdata('role_id');
                        $queryMenu = "SELECT `user_menu`.`id`, `menu`
                            FROM `user_menu` JOIN `user_access_menu`
                              ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                           WHERE `user_access_menu`.`role_id` = $role_id
                        ORDER BY `user_access_menu`.`menu_id` ASC
                        ";
                        $menu = $this->db->query($queryMenu)->result_array();
                        ?>

                        <!-- LOOPING MENU -->
                        <?php foreach ($menu as $m) : ?>
                            <div class="user-panel">
                                <li class="nav-header"><?= $m['menu']; ?></li>

                                <!-- SIAPKAN SUB-MENU SESUAI MENU -->
                                <?php
                                $menuId = $m['id'];
                                $querySubMenu = "SELECT *
                                        FROM `user_sub_menu` JOIN `user_menu` 
                                            ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                                        WHERE `user_sub_menu`.`menu_id` = $menuId
                                            AND `user_sub_menu`.`is_active` = 1
                                                ";
                                $subMenu = $this->db->query($querySubMenu)->result_array();
                                ?>

                                <?php foreach ($subMenu as $sm) : ?>

                                    <li class="nav-item">
                                        <?php if ($title == $sm['title']) : ?>
                                            <a href="<?= base_url($sm['url']); ?>" class="nav-link active">
                                            <?php else : ?>
                                                <a href="<?= base_url($sm['url']); ?>" class="nav-link">
                                                <?php endif; ?>
                                                <i class="<?= $sm['icon']; ?>"></i>
                                                <p>
                                                    <?= $sm['title']; ?>
                                                </p>
                                                </a>
                                    </li>
                                <?php endforeach; ?>

                                <!-- <hr class="sidebar-divider mt-3"> -->
                            </div>

                        <?php endforeach; ?>
                        <li class="nav-item mb-5">
                            <a class="nav-link" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-fw fa-sign-out-alt"></i>
                                <span>Logout</span></a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
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

    <!-- grafik pH -->
    <script src="<?= base_url('assets/js/cdn.jsdelivr.net_npm_chart.js'); ?>" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>

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

    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/'); ?>dist/js/adminlte.min.js"></script>

</body>

</html>