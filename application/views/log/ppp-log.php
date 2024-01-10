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

    .button{
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
                    <?= $systemName ?>
                </span>
            </div>
            <!-- HEAD INFO -->
            <div class="row mt-4">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">PPP LOG MONITOR</h3>
                        <button class="btn btn-secondary button" onclick="location.reload()">Reload Pages</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="DataTable" class="table table-bordered  dataTable dtr-inline"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th>Time</th>
                                            <th>topics</th>
                                            <th>message</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        foreach ( array_reverse($pppLog) as $data) {
                                            ?>
                                            <tr>
                                                <th>
                                                    <?= $data['time'] ?>
                                                </th>
                                                <th>
                                                    <?= $data['topics'] ?>
                                                </th>
                                                <th>
                                                    <?= $data['message'] ?>
                                                </th>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php echo header("refresh: 300"); ?>
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