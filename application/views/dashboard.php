<div class="content-wrapper">
    <div class="content-header">

        <!-- CCR1036-8G-2S+ -->
        <div class="container-fluid mt-3">
            <div class="device-title">
                <span class="device">DEVICE NAME</span>
                <span class="device">
                    <?= $systemName ?>
                </span>
            </div>
            <!-- HEAD INFO -->
            <div class="row mt-4">
                <!-- CPU LOAD -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">CPU LOAD</span>
                            <span class="info-box-number">
                                <div id="cpuLoad">
                                </div>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- /.CPU LOAD -->

                <!-- FREE MEMORY -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-memory"></i></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">FREE MEMORY</span>
                            <span class="info-box-number">
                                <div id="memoryLoad"></div>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- /.FREE MEMORY -->

                <!-- USER ACTIVE -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">USER PPP ACTIVE</span>
                            <span class="info-box-number">
                                <div id="activeUser"></div>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- /.USER ACTIVE -->

                <!-- UPTIME -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fa fa-power-off"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">UP-TIME</span>
                            <span class="info-box-number">
                                <?= $uptime ?>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- /.UPTIME -->
            </div>
            <!-- /.HEAD INFO -->
        </div>
        <!-- CCR1036-8G-2S+ END -->



        <!-- CCR1009-7G-1C-1S+ -->
        <br>
        <div class="container-fluid mt-5">
            <div class="device-title">
                <span class="device">DEVICE NAME</span>
                <span class="device">
                    <?= $systemName1009 ?>
                </span>
            </div>
            <!-- HEAD INFO -->
            <div class="row mt-4">
                <!-- CPU LOAD -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">CPU LOAD</span>
                            <span class="info-box-number">
                                <div id="cpuLoad1009">
                                </div>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- /.CPU LOAD -->

                <!-- FREE MEMORY -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-memory"></i></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">FREE MEMORY</span>
                            <span class="info-box-number">
                                <div id="memoryLoad"></div>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- /.FREE MEMORY -->

                <!-- USER ACTIVE -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">USER PPP ACTIVE</span>
                            <span class="info-box-number">
                                <div id="activeUser"></div>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- /.USER ACTIVE -->

                <!-- UPTIME -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fa fa-power-off"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">UP-TIME</span>
                            <span class="info-box-number">
                                <?= $uptime ?>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- /.UPTIME -->
            </div>
            <!-- /.HEAD INFO -->
        </div>
        <!-- CCR1009-7G-1C-1S+ END -->
    </div>
</div>

<script>
    // CPU RELOAD
    setInterval("cpuLoad();", 5000)
    function cpuLoad() {
        $('#cpuLoad').load('<?= site_url('dashboard/cpuLoad') ?>')
    }

    setInterval("cpuLoad1009();", 5000)
    function cpuLoad1009() {
        $('#cpuLoad1009').load('<?= site_url('dashboard/cpuLoad1009') ?>')
    }

    // MEMORY RELOAD
    setInterval("memoryLoad();", 1000)
    function memoryLoad() {
        $('#memoryLoad').load('<?= site_url('dashboard/memoryLoad') ?>')
    }

    // ACTIVE USER RELOAD
    setInterval("activeUser();", 10000)
    function activeUser() {
        $('#activeUser').load('<?= site_url('dashboard/activeUser') ?>')
    }

</script>