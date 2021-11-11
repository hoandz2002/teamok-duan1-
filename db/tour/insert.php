<?php
require_once "./tour.php";
$data = [
    'image_tours' => $_FILES['image_tours']['name'],
    'name_tours' => $_POST['name_tours'],
    'description_tours' => $_POST['description_tours'],
    'price_tours' => $_POST['price_tours'],
    'id_location' => $_POST['id_location'],

];
var_dump($data);die;
$file = $_FILES['image_tours'];
$file_name = $file['name'];
move_uploaded_file($file['tmp_name'], './../../asset/img/' . $file_name);

insert($data);
header('location: ./list_tours.php');
