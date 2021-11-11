<?php
require_once "./tour.php";
$id=$_GET['id_tours'];

$data = [
    'id_tours' => $_POST['id_tours'],
    'image_tours' => $_FILES['image_tours']['name'],
    'name_tours' => $_POST['name_tours'],
    'description_tours' => $_POST['description_tours'],
    'price_tours' => $_POST['price_tours'],
    'id_location' => $_POST['id_location'],
];

update($data);

header("location: ./list_tours.php");