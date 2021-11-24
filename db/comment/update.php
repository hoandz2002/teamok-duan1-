<?php
require_once './../connection.php';
require_once './../comment.php';
$id_tours = $_GET['id_tours'];

$data1 = [
    'content_comment' => $_POST['content_comment'],
    'date_comment' => $_POST['date_comment'],
    'id_customer' => $_POST['id_customer'],
    'id_tours' => $_POST['id_tours'],
    'id_comment' => $_POST['id_comment'],
];
// var_dump($data1);die;
update_comment($data1);
header("location:/duan1/tours_detail.php?id_tours=$id_tours");