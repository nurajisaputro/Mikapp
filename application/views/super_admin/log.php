<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid mt-3">
            <!-- HEADING -->
            <div class="device-title text-center">
                <p class="fs-4">USER LOG</p>
            </div>
            <!-- END HEADING -->

            <!-- MAIN CONTENT -->
            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="DataTable" class="table table-striped table-dark dataTable dtr-inline" aria-describedby="example1_info">
                            <thead>
                                <tr>
                                    <th style="width: 25%">No.</th>
                                    <th style="width: 25%">Login Username</th>
                                    <th style="width: 25%">Login Time</th>
                                    <th style="width: 25%">Login From</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $i = 1;
                                $result = $this->db->get('user_log');
                                foreach(array_reverse($result->result()) as $data){
                                ?>
                                    <tr>
                                        <th><?= $i++ ?></th>
                                        <th><?= $data->username ?></th>
                                        <th><?= $data->time ?></th>
                                        <th><?= $data->location ?></th>
                                    </tr>
                                <?php } 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
    </div>
</div>