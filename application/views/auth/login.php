<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?= base_url('assets/'); ?>img/logo_small.png">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/login.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/register.css?v=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/all.css">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;700&family=Montserrat:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

    <title>SIATPENDUK - LOGIN</title>
</head>

<body>

    <!-- Navbar -->

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark py-2">
        <div class="container">
            <a class="navbar-brand mr-0" href="/">
                <img src="<?= base_url('assets/'); ?>img/padi.png" width="60" class="d-inline-block align-top" alt="SIPERAN APP">

            </a><span class="navbar-brand mr-auto">SIPERAN APP</span>
        </div>
    </nav>
    <!-- End of Navbar -->
    <!-- End of Navbar -->

    <section class="my-login">
        <div class="container">
            <div class="row justify-content-center">
                <div class="card-wrapper">
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Login <span class="text-core">SIATPENDUK</span></h4>
                            <?= $this->session->flashdata('message'); ?>

                            <form method="post" action="<?= base_url('auth'); ?>">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Ketikkan Email" autofocus required value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-core btn-block">
                                        MASUK AKUN
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="footer">
                        Copyright &copy; 2023 &mdash; SIPERAN
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- JS -->
    <script src="<?= base_url('assets/'); ?>js/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/popper.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/bootstrap.js"></script>
    <script src="<?= base_url('assets/'); ?>js/all.js"></script>
    <script src="<?= base_url('assets/'); ?>js/script.js"></script>

</body>

</html>