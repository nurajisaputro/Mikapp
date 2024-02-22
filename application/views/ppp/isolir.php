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
                <span class="device">DEVICE NAME</span>
                <span class="device">
                </span>
            </div>
            <!-- HEAD INFO -->
            <div class="row mt-4">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Disabled PPPoE</h3>
                        <button class="btn btn-secondary button" onclick="location.reload()">Reload Pages</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="ml-3 mb-3">
                                <p>User PPPoE yang di isolir</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="DataTable" class="table table-bordered dataTable dtr-inline" aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th><?= count($isolir) ?> Users</th>
                                            <th>Id</th>
                                            <th>Username</th>
                                            <th>Profile</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $i = 1;

                                        foreach ($isolir as $data) {
                                        ?>
                                            <tr>
                                                <?php 
                                                $id = str_replace('*', '', $data['.id']);
                                                $name = $data['name'];
                                                ?>

                                                
                                                <th>
                                                    <?= $i++ ?>
                                                </th>
                                                <th>
                                                    <?= $data['.id'] ?>
                                                </th>
                                                <th>
                                                    <?= $data['name'] ?>
                                                </th>
                                                <th>
                                                    <?= $data['profile'] ?>
                                                </th>
                                                <!-- <th>
                                                    <?= $data['comment'] ?>
                                                </th> -->
                                                <th>
                                                    <div class="row">
                                                        <a href="<?= site_url('ppp/enableUser5M/' . $id) ?>" class="btn btn-success col m-1">5Mbps</i></a>
                                                        <a href="<?= site_url('ppp/test/' . $name) ?>" class="btn btn-success col m-1">10Mbps</i></a>
                                                        <a href="<?= site_url('ppp/enableUser20M/' . $data['name']) ?>" class="btn btn-success col m-1">20Mbps</i></a>
                                                    </div>
                                                </th>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.HEAD INFO -->
    </div>
</div>
</div>

<script>
    // <i class="fa-solid fa-circle-check">
</script>