<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page | Dashboard</title>

    <link rel="icon" href="<?= base_url('assets/template/') ?>assets/img/logo.png">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>assets/login.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>assets/login.js">
</head>

<body class="hold-transition login-page bg-dark">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-secondary">
            <div class="card-header text-center bg-dark">
                <p class="h1 text-white"><b>Login Dashboard</b></p>
            </div>
            <div class="card-body bg-dark">
                <p class="login-box-msg">Login To Access Dashboard</p>

                <form method="post" action="<?= base_url('auth'); ?>">
                    <!-- username -->
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Username" name="username" value="<?= set_value('username') ?>">
                    </div>
                    <?= form_error('username',  '<small class="text-danger">', '</small>') ?>
                    <!-- password login -->
                    <div class="input-group mb-1 mt-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" value="<?= set_value('password') ?>">
                    </div>
                    <?= form_error('password',  '<small class="text-danger">', '</small>') ?>
                    <div class="row mt-3">
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block mt-2">
                                Sign In
                            </button>
                        </div>
                    </div>
                    <div class="add_alert" id="alert_login">
                        <?= $this->session->set_flashdata('message'); ?>
                        <div class="alert alert-danger mt-4" role="alert">
                            <h5 class="alert-heading">Login Gagal</h5>
                            <p>
                                Silakan cek ulang password
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url('assets/template/') ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/template/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/template/') ?>dist/js/adminlte.min.js"></script>
</body>

</html>