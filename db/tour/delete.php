<?php
require_once "./tour.php";
$id=$_GET['id_tours'];
delete($id);
header("location: ./list_tours.php");