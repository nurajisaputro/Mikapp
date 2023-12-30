<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
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

                <!-- FREE MEMORY -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">FREE MEMORY</span>
                            <span class="info-box-number">
                                <div id="memoryLoad"></div>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- /.FREE MEMORY -->

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
        <div id="showSFP1">
            <div id="trafficSFP1"></div>
        </div>
        <div id="showSFP2">
            <div id="trafficSFP2"></div>
        </div>
        <div id="showEth2">
            <div id="trafficEth2"></div>
        </div>
    </div>
</div>

<script>
    // CPU RELOAD
    setInterval("cpuLoad();", 5000)
    function cpuLoad() {
        $('#cpuLoad').load('<?= site_url('dashboard/cpuLoad') ?>')
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

    // TRAFFIC SFP 1
    // setInterval("trafficSFP1();", 5000)
    // function trafficSFP1() {
    //     $('#trafficSFP1').load('<?= site_url('traffic/TrafficSFP1') ?>')
    // }

    // TRAFFIC SFP2
    // setInterval("trafficSFP2();", 5000)
    // function trafficSFP2() {
    //     $('#trafficSFP2').load('<?= site_url('traffic/trafficSFP2') ?>')
    // }

    // // TRAFFIC ETH2
    // setInterval("trafficEth2();", 5000)
    // function trafficEth2() {
    //     $('#trafficEth2').load('<?= site_url('traffic/trafficEth2') ?>')
    // }
</script>