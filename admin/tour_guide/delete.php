<?php 
require_once './../../db/connection.php';
require_once './../../db/tour_guide.php';
$id_tour_guide = $_GET['id_tour_guide'];

deleteTourGuide($id_tour_guide);
header("Location:/duan1/admin/tour_guide/list_tour_guide.php");
