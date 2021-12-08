<?php
session_start();
require_once './../connection.php';
require_once './../bill_tour.php';
$id = $_SESSION['user']['id_customer'];
$id_bill_tours = $_GET['id_bill_tours'];
// var_dump($id_bill_tours);
$id_tours = delete_bill($id_bill_tours);

delete_bill($id_bill_tours);
// var_dump($data1);die;
header("location:/duan1/admin/bill_tour/list_bill_tour.php");