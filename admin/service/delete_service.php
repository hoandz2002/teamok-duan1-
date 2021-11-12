<?php

require_once './../../db/connection.php';
require_once './../../db/service.php';
$id = $_GET['id_service'];
delete($id);
header("location: /duan1/admin/service/list_service.php");
