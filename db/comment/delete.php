<?php
require_once './../connection.php';
require_once './../comment.php';

$id_comment = $_GET['id_comment'];
var_dump($id_comment);
$id_tours = getid_comment($id_comment);
$ma = $id_tours['id_tours'];

delete_comment($id_comment);
// var_dump($data1);die;
header("location:/duan1/tours_detail.php?id_tours=$ma");
