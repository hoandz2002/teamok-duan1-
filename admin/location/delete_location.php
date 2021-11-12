<?php
require_once './../../db/connection.php';
require_once './../../db/location.php';
$id = $_GET['id_location'];
delete_location($id);
header('Location: /duan1/admin/location/list_location.php');
