<style>
    ._device {
        margin-top: 20px;
        margin-left: 20px;
        font-size: 20px;
    }

    ._traffic {
        margin-top: 20px;
        margin-left: 30px;
        font-size: 18px;

    }
</style>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="device-title">
                <span class="device">DEVICE NAME</span>
                <span class="device">
                    <?= $deviceName ?>
                </span>
            </div>
            <div class="col-md-12" id="trafficSFP1">
                <div class="interface card">
                    <p class="_device text-center">
                        <?= $interface1 ?>
                    </p>
                    <br>
                    <div>
                        <div class="_traffic">
                            <p id="displayTraffic"></p>
                        </div>
                    </div>
                    <!-- /.INTERFACE -->
                    <div class="card bg-secondary m-3 mb-3">
                        <div id="container" style="width:100%; height:400px;">
                            <canvas id="chartRx" style="width:100%; height:400px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    // TRAFFIC SFP 1
    setInterval("SFP1();", 5000)

    function SFP1() {
        $('#displayTraffic').load('<?= site_url('traffic/trafficSFP1') ?>')
    }

    // CHART JS
    var data = {
        labels: [0],
        datasets: [{
                label: 'Download',
                data: [0],
                borderColor: 'rgb(241, 49, 53, 1)',
                lineTension: 0.3,
            },
            {
                label: 'Upload',
                data: [1],
                borderColor: 'rgb(5, 236, 14, 1)',
                lineTension: 0.3,
            }
        ]
    };

    var config = {
        type: 'line',
        data: data,
    }

    var myChart = new Chart(
        document.getElementById('chartRx'),
        config
    )

    window.setInterval(mycallback, 5100)


    function mycallback() {
        var now = new Date()
        var valueRX = document.getElementById('valueRXSFP1').innerHTML
        var valueTX = document.getElementById('valueTXSFP1').innerHTML


        if (data.datasets[0].data.length >= 20) {
            data.labels.shift()
            data.datasets[0].data.shift()
            data.datasets[1].data.shift()
        }

        now = now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds()
        data.labels.push(now)
        data.datasets[0].data.push(valueRX)
        data.datasets[1].data.push(valueTX)
        myChart.update()
    }
</script>