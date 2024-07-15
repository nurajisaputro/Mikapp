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
        margin-left: 60%;
    }

    ._thead {
        width: 100%;
    }

    ._thead :nth-child(1) {
        width: 5%;
    }

    ._thead :nth-child(2) {
        width: 40%px;
    }

    ._thead :nth-child(3) {
        width: 10%px;
    }

    ._thead :nth-child(4) {
        width: 15%;
    }

    ._thead :nth-child(5) {
        width: 30%;
    }
</style>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <!-- title -->
            <!-- <div class="device-title text-center">
                <span class="device">USER YANG TERISOLIR</span>
                <span class="device">
                </span>
            </div> -->
            <!-- end title -->
            <div class="row mt-4">
                <!-- card -->
                <div class="card">
                    <!-- card header -->
                    <div class="card-header">
                        <h3 class="card-title">USER TERISOLIR</h3>
                    </div>
                    <!-- /.card-header -->

                    <!-- card body -->
                    <div class="card-body">
                        <!-- FORM FIND MONTH ISOLIR USER -->
                        <div class="ml-3 mb-3">
                            <form method="post" action="<?= base_url('ppp/isolir'); ?>">
                                <div class="container-fluid">
                                    <div class="row align-items-start">
                                        <!-- description -->
                                        <div class="col mt-4">
                                            <p class="fs-5">User Terisolir Bulan <?= str_replace('All', 'Januari - Desember', $month);
                                                                                    ?></p>
                                            <p class="mt-2">Aktifkan user sesuai paket yang bulan ini</p>
                                        </div>
                                        <!-- end description -->

                                        <!-- form input -->
                                        <div class="col text-center">
                                            <div>
                                                <label class="button fs-5">Pilih Bulan (<?= date('Y') ?>)</label>
                                                <select name="bulan" class="btn bg-secondary button">
                                                    <option value="All">Semua</option>
                                                    <option value="januari">Januari</option>
                                                    <option value="februari">February</option>
                                                    <option value="maret">Maret</option>
                                                    <option value="april">April</option>
                                                    <option value="mei">Mei</option>
                                                    <option value="juni">Juni</option>
                                                    <option value="juli">Juli</option>
                                                    <option value="agustus">Agustus</option>
                                                    <option value="september">September</option>
                                                    <option value="oktober">October</option>
                                                    <option value="november">November</option>
                                                    <option value="desember">Desember</option>
                                                </select>
                                                <button type="submit" class="btn btn-success ml-2 button">Cari</button>
                                            </div>
                                            <!-- end form input -->
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end form -->


                        <!-- content -->
                        <div class="row _tabel">
                            <div class="col-sm-12">
                                <!-- table -->
                                <table id="DataTable" class="table table-striped table-dark dataTable dtr-inline" aria-describedby="example1_info">
                                    <thead class="_tabel">
                                        <tr class="_thead">
                                            <th class="_count width: 5%"><?= count($isolir) ?> Users</th>
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
                                        $newMonth = $month;
                                        foreach ($isolir as $data) {
                                        ?>
                                            <tr>
                                                <?php
                                                $name = str_replace('@backbone.net', '', $data['name']);
                                                $a = $data['name'];
                                                $R1 = "ProfileD"
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
                                                        <a href="<?= site_url('ppp/enableUser5M/' . $name); ?>" class="btn btn-success col m-1" onclick="return confirm('Apakah Anda Yakin Mengaktifkan user <?= $name ?>')">
                                                            5Mbps
                                                        </a>
                                                        <a href="<?= site_url('ppp/enableUser10M/' .  $name) ?>" class="btn bg-info col m-1" onclick="return confirm('Apakah Anda Yakin Mengaktifkan user <?= $name ?>')">
                                                            10Mbps
                                                        </a>
                                                        <a href="<?= site_url('ppp/enableUser20M/' .  $name); ?>" class="btn bg-orange col m-1" onclick="return confirm('Apakah Anda Yakin Mengaktifkan user <?= $name ?>')">
                                                            20Mbps
                                                        </a>
                                                        <a href="<?= site_url('ppp/Disable/' .  $name); ?>" class="btn bg-danger col m-1" onclick="return confirm('Apakah Anda Yakin Mengisolir user <?= $name ?>')">
                                                            Isolir
                                                        </a>
                                                    </div>
                                                </th>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    </table>
                                    <div class="container-fluid">
                                        <div class="row  justify-content-end">
                                            <div class="col-4 justify-content-start">
                                                <a href="#" class=""></a>
                                            </div>
                                            <div class="col-4 row justify-content-end">
                                                <div class="col-4 justify-content-end">
                                                    <!-- <a href="<?= site_url('ppp/isolirAllUserThisMonth/'. $month)?>" type="submit" class="btn btn-danger">Isolir Semua</a> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- end table -->
                            </div>
                        </div>
                        <!-- end content -->
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