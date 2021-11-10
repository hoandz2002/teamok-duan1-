<?php 
require_once "./service.php";
 $id=$_GET['id_service'];
 delete($id);
 header("location: ./list_service.php");