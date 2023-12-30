<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="device-title">
                <span class="device">DEVICE NAME</span>
                <span class="device">
                    <?= $systemName ?>
                </span>
            </div>

            <div class="modal fade" id="modal-add-user" style="display:none;" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content bg-secondary">
                        <h4 class="modal-title">ADD USER</h4>
                        <button class="close" type="button" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">x</span>
                        </button>
                        <form action="<?= site_url('ppp/addUser') ?>" method="POST">
                            <!-- USERNAME -->
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="user">USER</label>
                                    <input type="text" name="user" class="form-control" id="user" autocomplete="off"
                                        required>
                                </div>
                            </div>
                            <!-- ./USERNAME -->

                            <!-- PASSWORD -->
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="password">password</label>
                                    <input type="text" name="password" class="form-control" id="password"
                                        autocomplete="off" required>
                                </div>
                            </div>
                            <!-- ./PASSWORD -->

                            <!-- PROFILE -->
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="user">USER</label>
                                    <input type="text" name="user" class="form-control" id="user" autocomplete="off"
                                        required>
                                </div>
                            </div>
                            <!-- ./PROFILE -->
                        </form>


                        <?php 
                            $name = $_POST
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>