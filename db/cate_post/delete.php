<?php
require_once "./cate_post.php";
$id = $_GET['id_cate_post'];
delete($id);
header("location: ./list_cate_post.php");
