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
                    <p class="text-header">
                        <?= $interface2 ?>
                    </p>
                    <br>
                    <div>
                        <div class="text-traffic" id="RX"> <a id="SFP2"></a>
                        </div>
                    </div>
                    <!-- /.INTERFACE -->
                    <div class="card bg-secondary m-5">
                        <div id="container" style="width:100%; height:400px;">
                            <canvas id="chartRx" style="width:100%; height:400px; color: white"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    // TRAFFIC SFP 1
    setInterval("SFP2();", 5000)
    function SFP2() {
        $('#SFP2').load('<?= site_url('traffic/trafficSFP2') ?>')
    }

    // CHART JS
    var data = {
        labels: [0],
        datasets: [
            {
                label: 'RX',
                data: [0],
                borderColor: 'rgb(182, 186, 186)',
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
        var value = document.getElementById('valueRXSFP2').innerHTML

        if (data.datasets[0].data.length >= 20) {
            data.labels.shift()
            data.datasets[0].data.shift()
        }

        now = now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds()
        data.labels.push(now)
        data.datasets[0].data.push(value)
        myChart.update()
    }
</script>