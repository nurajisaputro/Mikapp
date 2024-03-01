<?php

// LIST IP
$iplist = array
(
    array("1", "192.168.2.101", "UBUNTU SERVER", ""),
    array("2", "10.10.124.1", "METRO HSP", ""),
    array("3", "103.189.249.11", "METRO ICON", ""),
    array("4", "192.168.3.1", "CCR 1036", ""),
    array("5", "10.10.101.1", "CCR 1009", ""),
    array("6", "192.168.60.2", "RB750", ""),
    array("7", "192.168.155.1", "RB750Gr3", ""),
    array("8", "192.168.2.253", "RB2011", ""),
);

$replay = 0;
$i = count($iplist);
$results = [];
$replay = 0;

for ($j = 0; $j < $i; $j++) {
    $ip = $iplist[$j][1];
    $ping = exec("ping -n 1 $ip", $output, $status);
    $results[] = $status;
}
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">STATUS</h3>
                    </div>
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="DataTable" class="table table-bordered dataTable dtr-inline"
                                        aria-describedby="example1_info">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NAME</th>
                                                <th>Status</th>
                                                <th>History</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            foreach ($results as $item => $k) {
                                                ?>
                                                <tr>
                                                    <th>
                                                        <?= $iplist[$item][0]; ?>
                                                    </th>
                                                    <th>
                                                        <?= $iplist[$item][2]; ?>
                                                    </th>
                                                    <th>
                                                        <?php if ($results[$item] == $replay) {
                                                            echo '<a class="text-success">ONLINE</a>';
                                                            echo '<i class="fa-solid fa-cloud text-success" style=margin-left:10px;></i>';
                                                        } else {
                                                            echo '<a class="text-danger">OFFLINE</a>';
                                                            echo '<i class="fa-solid fa-triangle-exclamation text-danger" style=margin-left:10px;></i>';
                                                        }
                                                        ?>
                                                    </th>
                                                    <th>
                                                        <a href="http://192.168.2.101/smokeping/" class="hover ml-1">
                                                            <i class="fa-solid fa-clock-rotate-left"></i>
                                                        </a>
                                                    </th>
                                                    <?php
                                                    echo header("refresh: 300");
                                            } ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>