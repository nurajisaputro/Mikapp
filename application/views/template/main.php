<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>dist/css/adminlte.min.css">
    <!-- STYLE -->
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>assets/test.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>assets/dashboard.css">
    <!-- Chart Js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= site_url('/dashboard') ?>" class="nav-link">Home</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <p class="nav-link" id="date">
                    </p>
                </li>
                <li class="nav-item">
                    <p class="nav-link" id="clock">
                    </p>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('/auth') ?>" class="nav-link">
                        LOG OUT
                        <i class="fa-solid fa-right-from-bracket nav-icon ml-1"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= site_url('/dashboard') ?>" class="brand-link">
                <span class="brand-text font-weight-light">Admin Dashboard</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <i class="fa-solid fa-user-tie mt-2"></i>
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">NUR AJI</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <p class="form-control form-control-sidebar">MENU</p>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <div class="mt-2 d-flex">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item mt-2">
                            <a href="<?= site_url('/dashboard') ?>" class="nav-link hover">
                                <i class="nav-icon fa-solid fa-house"></i>
                                <p>
                                    Dashboard

                                </p>
                            </a>
                        </li>


                        <!-- INTERFACE -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    INTERFACE
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="<?= site_url('/Traffic/SFP1') ?>" class="nav-link hover">
                                        <i class="fa-solid fa-chart-line nav-icon"></i>
                                        <p>Sfp Plus 1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('/Traffic/SFP2') ?>" class="nav-link hover">
                                        <i class="fa-solid fa-chart-line nav-icon"></i>
                                        <p>Sfp Plus 2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('/Traffic/ETH2') ?>" class="nav-link hover">
                                        <i class="fa-solid fa-chart-line nav-icon"></i>
                                        <p>Ether 2</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- PPPOE MENU -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    PPPOE
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <!-- DROPDOWN -->
                            <ul class="nav nav-treeview" style="display: none;">
                                <!-- PPP ACTIVE -->
                                <li class="nav-item">
                                    <a href="<?= site_url('/ppp/users') ?>" class="nav-link">
                                        <i class="fa fa-users nav-icon"></i>
                                        <p>PPPOE ACTIVE</p>
                                    </a>
                                </li>
                                <!-- /.PPPACTIVE -->
                                
                                <!-- PPPPOE LOG -->
                                <li class="nav-item">
                                    <a href="<?= site_url('/log/pppLog') ?>" class="nav-link">
                                        <i class="fa-solid fa-scroll nav-icon"></i>
                                        <p>PPPOE LOG</p>
                                    </a>
                                </li>
                                <!-- /.PPPOE LOG -->
                            </ul>
                        </li>
                        <!-- /. PPPOE MENU -->

                        <!-- TOOLS -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-solid fa-gear"></i>
                                <p>
                                    TOOLS
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <!-- DROPDOWN -->
                            <ul class="nav nav-treeview" style="display: none;">
                                <!-- Ping -->
                                <li class="nav-item">
                                    <a href="<?= site_url('/ping/ping') ?>" class="nav-link">
                                        <i class="fa-solid fa-network-wired nav-icon"></i>
                                        <p>Ping</p>
                                    </a>
                                </li>
                                <!-- /.Ping -->

                                <!-- ALL LOG -->
                                <li class="nav-item">
                                    <a href="<?= site_url('/log/log') ?>" class="nav-link">
                                        <i class="fa-solid fa-scroll nav-icon"></i>
                                        <p>ALL LOG</p>
                                    </a>
                                </li>
                                <!-- /.ALL LOG -->
                            </ul>
                        </li>
                        <!-- /. PPPOE MENU -->

                        <!-- SYSTEM -->
                        <hr>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-solid fa-gear"></i>
                                <p>
                                    SYSTEM
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <!-- DROPDOWN -->
                            <ul class="nav nav-treeview" style="display: none;">
                                <!-- App User -->
                                <li class="nav-item">
                                    <a href="<?= site_url('/appUser/users') ?>" class="nav-link">
                                        <i class="fa-solid fa-network-wired nav-icon"></i>
                                        <p>APP USERS</p>
                                    </a>
                                </li>
                                <!-- /.App User -->

                                <!-- # -->
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fa-solid fa-scroll nav-icon"></i>
                                        <p>#</p>
                                    </a>
                                </li>
                                <!-- /.# -->

                                <!-- # -->
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fa-solid fa-scroll nav-icon"></i>
                                        <p>#</p>
                                    </a>
                                </li>
                                <!-- /.# -->
                            </ul>
                        </li>
                        <hr>
                    </ul>
                </div>
            </div>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="">
            <!-- Main Footer -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2024 NUR AJI.</strong>
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 1.2
                </div>
            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="<?= base_url('assets/template/') ?>plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url('assets/template/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="<?= base_url('assets/template/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url('assets/template/') ?>dist/js/adminlte.js"></script>

        <!-- PAGE PLUGINS -->
        <!-- jQuery Mapael -->
        <script src="<?= base_url('assets/template/') ?>plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
        <script src="<?= base_url('assets/template/') ?>plugins/raphael/raphael.min.js"></script>
        <script src="<?= base_url('assets/template/') ?>plugins/jquery-mapael/jquery.mapael.min.js"></script>
        <script src="<?= base_url('assets/template/') ?>plugins/jquery-mapael/maps/usa_states.min.js"></script>
        <!-- ChartJS -->
        <script src="<?= base_url('assets/template/') ?>plugins/chart.js/Chart.min.js"></script>

        <!-- DataTables  & Plugins -->
        <script src="<?= base_url('assets/template/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url('assets/template/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?= base_url('assets/template/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?= base_url('assets/template/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <!-- JS LOAD -->
        <script src="<?= base_url('assets/template/') ?>assets/script.js"></script>

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
</body>

</html>