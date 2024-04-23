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
                                <form method="post" action="<?= base_url('ppp/findMonth'); ?>">
                                <div class="">
                                    <?php
                                    $now = date('Y');
                                    ?>
                                    <select name="bulan" class="btn bg-secondary button" placeholder="Cari Nama User">
                                        <option value="0">-PILIH BULAN (<?= $now?>)-</option>
                                        <option value="">Semua</option>
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
                                    <button type="submit" class="btn btn-success button mt-2">Cari</button>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="row _tabel">
                            <div class="col-sm-12">
                                <table id="DataTable" class="table table-bordered dataTable dtr-inline" aria-describedby="example1_info">
                                    <thead class="_tabel">
                                        <tr>
                                            <th> Users</th>
                                            <!-- <th>Id</th> -->
                                            <th>Username</th>
                                            <th>Profile</th>
                                            <th>Comment</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
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