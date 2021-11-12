<?php
require_once './../../db/connection.php';
require_once './../../db/cate_post.php';
$id = $_GET['id_cate_post'];
delete($id);
header("location: /duan1/admin/manager_post/list_mng_post.php");
