<?php
require_once './../../db/connection.php';
require_once './../../db/post.php';
$id = $_GET['id_post'];
delete_post($id);
header("location: /duan1/admin/post/list_post.php");
