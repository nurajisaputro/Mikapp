<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">

            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Data User yang Belum Bayar Bulan <?= wib_time(date('m')) ?></h3>
                </div>
                <div class="card-title">
                    <p class="m-3 fs-6">
                        Data user yang akan di isolir bulan
                        <span class=""><?= wib_time(date('m')) ?></span>
                        jam 00.00 oleh system
                    </p>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="DataTable" class="table table-striped table-dark dataTable dtr-inline" aria-describedby="example1_info">
                        <thead>
                            <tr>
                                <th style="width: 5%">Id</th>
                                <th style="width: 15%">Username</th>
                                <th style="width: 10%">Status</th>
                                <th style="width: 15%">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($result as $data) {
                                // NAME USER
                                $name = str_replace('@backbone.net', '', $data['name']);
                                $id = str_replace('*', '', $data['.id']);
                                $month = wib_time(date('m'))
                            ?>
                                <tr>
                                    <th>
                                        <?= $data['.id'] ?>
                                    </th>
                                    <th>
                                        <?= $name ?>
                                    </th>
                                    <th>
                                        <?= $data['profile'] ?>
                                    </th>
                                    <th>
                                        <a class="btn btn-success" href="<?= site_url('ppp/deleteMark/' . $id); ?>" onclick="return confirm('Tandai User <?= $name ?> Sebagai Sudah Bayar?')">
                                            Tandai Sudah Bayar
                                        </a>
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
                                    <a href="<?= site_url('ppp/isolirAllUserThisMonth/' . $month) ?>" type="submit" class="btn btn-danger">Isolir Semua</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>