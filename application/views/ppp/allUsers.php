<style>
    .device-title {
        width: 100%;
        background-color: #343a40;
        margin: 10px 0 10px 0;
        border-radius: 3px;
    }

    .device {
        padding: 5px;
        font-size: 20px;
        text-align: center;
    }

    .button {
        justify-content: space-between;
        margin-left: 80%;
    }

</style>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="device-title">
                <span class="device">USER PPPOE</span>
            </div>
            <!-- HEAD INFO -->
            <div class="row mt-4">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">ALL PPPOE</h3>
                        <button class="btn btn-secondary button" onclick="location.reload()">Reload Pages</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="DataTable" class="table table-striped table-dark dataTable dtr-inline" aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%">
                                                <?= $countPpp ?> User
                                            </th>
                                            <th style="width: 20%">Username</th>
                                            <th style="width: 10%">Paket</th>
                                            <th style="width: 10%">Status</th>
                                            <th style="width: 10%">last Connected</th>
                                            <th style="width: 10%">Reason Disconnect</th>
                                            <th style="width: 10%">Router</th>
                                            <th style="width: 20%">Mark As Isolir</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        foreach ($userR1 as $data) {
                                            // NAME USER
                                            $name = str_replace('@backbone.net', '', $data['name']);
                                            $id = str_replace('*', '', $data['.id']);
                                        ?>
                                            <tr>
                                                <th>
                                                    <?= $data['.id'] ?>
                                                </th>
                                                <th>
                                                    <?= $name ?>
                                                </th>
                                                <th>
                                                    <?php
                                                    $profile = $data['profile'];

                                                    $paket1 = "Profile5M";
                                                    $paket2 = "Profile10M";
                                                    $paket3 = "Profile20M";
                                                    $paket4 = "Profile50M";
                                                    $paket5 = "Profile100M";
                                                    if ($profile == $paket1) {
                                                        echo "5 Mbps";
                                                    } else if ($profile == $paket2) {
                                                        echo "10Mbps";
                                                    } else if ($profile == $paket3) {
                                                        echo "20Mbps";
                                                    } else if ($profile == $paket4) {
                                                        echo "50Mbps";
                                                    } else if ($profile == $paket5) {
                                                        echo "100Mbps";
                                                    } else {
                                                        echo "Prio OR Disable";
                                                    }
                                                    ?>
                                                </th>
                                                <th>
                                                    <?php
                                                    $comment = $data['comment'];

                                                    if(!$comment){
                                                        echo "No Comment";
                                                    }else{
                                                        echo $comment;
                                                    }
                                                    ?>
                                                </th>
                                                <th>
                                                    <?= $data['last-logged-out']?>
                                                </th>
                                                <th>
                                                <?= $data['last-disconnect-reason']?>
                                                </th>
                                                <th>
                                                    <?= $R1 ?>
                                                </th>
                                                <th>
                                                    <a class="btn btn-warning" href="<?= site_url('ppp/markUser/' . $id); ?>" onclick="return confirm('Tandai User <?= $name ?> Sebagai Belum Bayar?')">
                                                        Tandai Belum Bayar
                                                    </a>
                                                </th>
                                                <?php
                                        }
                                        
                                        foreach ($userR2 as $data) {
                                            // NAME USER
                                            $name = str_replace('@backbone.net', '', $data['name']);
                                            $id = str_replace('*', '', $data['.id']);
                                        ?>
                                            <tr>
                                                <th>
                                                    <?= $data['.id'] ?>
                                                </th>
                                                <th>
                                                    <?= $name ?>
                                                </th>
                                                <th>
                                                    <?php
                                                    $profile = $data['profile'];

                                                    $paket1 = "Profile5M";
                                                    $paket2 = "Profile10M";
                                                    $paket3 = "Profile20M";
                                                    $paket4 = "Profile50M";
                                                    $paket5 = "Profile100M";
                                                    if ($profile == $paket1) {
                                                        echo "5 Mbps";
                                                    } else if ($profile == $paket2) {
                                                        echo "10Mbps";
                                                    } else if ($profile == $paket3) {
                                                        echo "20Mbps";
                                                    } else if ($profile == $paket4) {
                                                        echo "50Mbps";
                                                    } else if ($profile == $paket5) {
                                                        echo "100Mbps";
                                                    } else {
                                                        echo "Prio OR Disable";
                                                    }
                                                    ?>
                                                </th>
                                                <th>
                                                    <?php
                                                    $comment = $data['comment'];

                                                    if(!$comment){
                                                        echo "No Comment";
                                                    }else{
                                                        echo $comment;
                                                    }
                                                    ?>
                                                </th>
                                                <th>
                                                    <?= $data['last-logged-out']?>
                                                </th>
                                                <th>
                                                    -
                                                </th>
                                                <th>
                                                    <?= $R2?>
                                                </th>
                                                <th>
                                                    <a class="btn btn-warning" href="<?= site_url('ppp/markUser/' . $id); ?>" onclick="return confirm('Tandai User <?= $name ?> Sebagai Belum Bayar?')">
                                                        Tandai Belum Bayar
                                                    </a>
                                                </th>
                                            </tr>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <!-- Modal -->
                <div class=" modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">APAKAH ANDA YAKIN?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Yakin Untuk Menandai User <label id="name"></label> Sebagai Belum Bayar?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">NO</button>
                                <a href='' onclick="href()" type="button" class="btn btn-primary">YES</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Modal -->
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(document).on('click', '#modal', function() {
                let name = $(this).data('name')
                let id = $(this).data('id')
                $('#name').text(name)
                $('#id').text(id)
            })
        })

        function href() {
            let id = $(this).data('id')
            window.location.href('<?php echo site_url("ppp/MarkUser/") ?>' + id)
            end
        }
    </script>