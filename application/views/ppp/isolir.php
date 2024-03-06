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
            <div class="device-title text-center">
                <span class="device">USER YANG TERISOLIR</span>
                <span class="device">
                </span>
            </div>
            <!-- HEAD INFO -->
            <div class="row mt-4">

                <div class="card">
                    <div class="card-header">
                        <!-- <h3 class="card-title">Disabled PPPoE</h3>
                        <input class="input btn-primary" type="text" onclick="" placeholder="Cari">
                        <button class="btn btn-secondary button" onclick="location.reload()">Reload Pages</button>
                    </div> -->
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="ml-3 mb-3">
                                <p>User PPPoE yang di isolir</p>
                                <!-- <div class="item-center text-align-center">
                                    <input type="text" class="btn btn-secondary button" placeholder="Cari Nama User">
                                    <button type="submit" class="btn btn-secondary button mt-1">Cari</button>
                                </div> -->
                            </div>
                        </div>
                        <div class="row _tabel">
                            <div class="col-sm-12">
                                <table id="DataTable" class="table table-bordered dataTable dtr-inline" aria-describedby="example1_info">
                                    <thead class="_tabel">
                                        <tr>
                                            <!-- <th><?= count($isolir) ?> Users</th> -->
                                            <!-- <th>Id</th> -->
                                            <th>Username</th>
                                            <th>Profile</th>
                                            <th>Comment</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody class="_tabel">
                                        <?php
                                        $i = 1;

                                        foreach ($isolir as $data) {
                                        ?>
                                            <tr>
                                                <?php
                                                $name = str_replace('@backbone.net', '', $data['name']);
                                                $a = $data['name'];
                                                ?>

                                                <!-- <th>
                                                    <?= $i++ ?>
                                                </th> -->
                                                <!-- <th>
                                                    <?= $data['.id'] ?>
                                                </th> -->
                                                <th>
                                                    <?= $name ?>
                                                </th>
                                                <th>
                                                    <?= $data['profile'] ?>
                                                </th>
                                                <th>
                                                    <?= $data['comment'] ?>
                                                </th>
                                                <th>
                                                    <div class="row">
                                                        <a href="<?= site_url('ppp/enableUser5M/' . $name); ?>" class="btn btn-success col m-1">5Mbps</a>
                                                        <a href="<?= site_url('ppp/enableUser10M/' .  $name) ?>" class="btn btn-success col m-1">10Mbps</a>
                                                        <a href="<?= site_url('ppp/enableUser20M/' .  $name); ?>" class="btn btn-success col m-1">20Mbps</a>
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