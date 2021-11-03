<?php
require_once "./tour.php";
$data = [
    'image_tours' => $_FILES['image_tours']['name'],
    'name_tours' => $_POST['name_tours'],
    'description_tours' => $_POST['description_tours'],
    'price_tours' => $_POST['price_tours'],
    'time_tours' => $_POST['time_tours'],
    'id_location' => $_POST['id_location'],

];
insert($data);
header('location: ./list_tours.php');
?>