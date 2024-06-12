<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid mt-3">
            <!-- HEADING -->
            <div class="device-title text-center">
                <p class="fs-4">USER MANAGEMENT</p>
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
                                    <th style="width: 5%">Id</th>
                                    <th style="width: 20%">Name</th>
                                    <th style="width: 20%">Username</th>
                                    <th style="width: 15%">Role Id</th>
                                    <th style="width: 15%">Is Active</th>
                                    <th style="width: 15%">Data Created</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $i = 1;
                                $result = $this->db->get('user');
                                foreach (array_reverse($result->result()) as $data) : {
                                ?>
                                        <tr>
                                            <th><?= $data->id ?></th>
                                            <th><?= $data->name ?></th>
                                            <th><?= $data->username ?></th>
                                            <th><?php
                                                $role_id = $data->role_id;
                                                if ($role_id == 1) {
                                                    echo "Super Admin";
                                                } elseif ($role_id == 2) {
                                                    echo "Admin";
                                                } else {
                                                    echo "Role Id Invalid";
                                                }
                                                ?></th>
                                            <th><?php
                                                $active = $data->is_active;
                                                if ($active == 1) {
                                                    echo "Active";
                                                } else {
                                                    echo "User Disabled";
                                                }
                                                ?></th>
                                            <th><?= $data->data_created ?></th>
                                            <th>
                                                <div class="row">
                                                    <a href="#" class="col text-success fs-5 editUsername" data-bs-toggle="modal" data-bs-target="#editUser">
                                                        <i class="fa-solid fa-user-pen"></i>
                                                    </a>
                                                    <a href="<?= site_url('admin/deleteUser') ?>" class="col text-danger fs-5">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </div>
                                            </th>
                                            <th   id="asd"></th>
                                        </tr>
                                <?php }
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->

            <!-- Modal -->
            <div class="modal fade" id="editUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editUserLabel">Edit User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="p-3">
                                <form action="" method="post">
                                    <div class="mb-2">
                                        <span>Name</span>
                                        <input type="text" name="editName" id="editUsername" class="form-control mt-1" placeholder="">
                                        <div class="mb-2">
                                            <span>Username</th>
                                                <input type="text" name="editUsername" id="editUsername" class="form-control mt-1" placeholder="">
                                        </div>
                                        <div class="mb-2">
                                            <span>Role Id</span>
                                            <input type="text" name="editUsername" id="editUsername" class="form-control mt-1">
                                        </div>
                                        <div class="mb-2">
                                            <span>Is Active</span>
                                            <div class="form-check mt-1">
                                                <input class="form-check-input" type="radio" name="editActive" id="editActive">
                                                <label class="form-check-label" for="editActive">
                                                    Active
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="editActive" id="Disable">
                                                <label class="form-check-label" for="Disable">
                                                    Disable
                                                </label>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <fieldset disabled>
                                                <label for="disabledTextInput" class="form-label">Data Created</label>
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder="">
                                            </fieldset>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer mt-5">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Understood</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Modal -->

        </div>
    </div>
</div>

<script>
    // $(document).ready(function() {
    //     $('#editUser').on('click', function() {
    //         var data = $tr.children("th").map(function(){
    //             return $(this).text()
    //         }).get()
    //         console.log(data)
    //         $('#editUsername').val(data['0'])
    //     })
    // })

    // function dataEdit(id){
    //     console.log(
    //         $('.editUsername').value = id
    //     )
    //     console.log (id)
    // }
</script>