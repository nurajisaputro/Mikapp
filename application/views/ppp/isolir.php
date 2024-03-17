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
                        <div>
                            <div class="ml-3 mb-3">
                                <p>User PPPoE yang di isolir</p>
                                <!-- <div class="">
                                    <select name="bulan" id="bulan" class="btn bg-secondary button" placeholder="Cari Nama User">
                                        <option value="">--PILIH BULAN--</option>
                                        <option value="1">Januari</option>
                                        <option value="2">February</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                                <a href="findMonth" type="submit" class="btn btn-success button mt-2">Cari</a> -->
                            </div>
                        </div>
                        <div class="row _tabel">
                            <div class="col-sm-12">
                                <table id="DataTable" class="table table-bordered dataTable dtr-inline" aria-describedby="example1_info">
                                    <thead class="_tabel">
                                        <tr>
                                            <th><?= count($isolir) ?> Users</th>
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

                                                <th>
                                                    <?= $i++ ?>
                                                </th>
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
                                                        <a href="<?= site_url('ppp/enableUser10M/' .  $name) ?>" class="btn bg-info col m-1">10Mbps</a>
                                                        <a href="<?= site_url('ppp/enableUser20M/' .  $name); ?>" class="btn bg-orange col m-1">20Mbps</a>
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