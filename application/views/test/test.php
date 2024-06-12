<?php
$role_id = $this->session->userdata('role_id');
$queryMenu = "SELECT `superadmin_menu` . `id`, `menu` FROM `superadmin_menu` JOIN `user_access_menu` ON `superadmin_menu` . `id` = `user_access_menu` . `menu_id` WHERE           `user_access_menu` . `role_id` = $role_id ORDER BY `user_access_menu` . `menu_id` ASC
                        ";

$menu = $this->db->query($queryMenu)->result_array();
var_dump($menu);
die;
