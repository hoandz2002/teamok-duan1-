<?php 
require_once './../../db/connection.php';
require_once './../../db/tour.php';
$id_tours = $_GET['id_tours'];

deleteToursImage($id_tours);
deleteTours($id_tours);
// deleteProductImage($product_id);
header("Location:/duan1/admin/tours/list_tours.php");
