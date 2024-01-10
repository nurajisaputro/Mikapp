<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>assets/login.css">
</head>

<body class="hold-transition login-page bg-dark">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-secondary">
            <div class="card-header text-center bg-dark">
                <p class="h1 text-white"><b>Registration</b></p>
            </div>
            <div class="card-body bg-dark">
                <p class="login-box-msg">Registration New Username</p>

                <form method="post">
                    <!-- username -->
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Create username" name="username" value="<?= set_value('username') ?>">
                    </div>
                    <?= form_error('username',  '<small class="text-danger">', '</small>') ?>

                    <!-- password1 -->
                    <div class="input-group mb-1 mt-3">
                        <input type="password" class="form-control" placeholder="Create Password" name="password1" value="<?= set_value('password1') ?>">
                    </div>
                    <?= form_error('password1',  '<small class="text-danger">', '</small>') ?>

                    <!-- password2 -->
                    <div class="input-group mb-1 mt-3">
                        <input type="password" class="form-control" placeholder="Confirm Password" name="password2" value="<?= set_value('password2') ?>">
                    </div>
                    <?= form_error('password2',  '<small class="text-danger">', '</small>') ?>

                    <!-- Submit -->
                    <div class="row mt-3">
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block mt-2" onclick="TEST()">
                                Submit
                            </button>
                        </div>
                    </div>
                    <div class="add_alert" id="alert">
                        <div class="alert alert-success mt-4" role="alert">
                            <h5 class="alert-heading">Berhasil</h5>
                            <p>
                                Username Berhasil di tambahkan
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