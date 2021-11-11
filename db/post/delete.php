<?php
require_once "./post.php";
$id = $_GET['id_post'];
delete($id);
header("location: ./list_post.php");
