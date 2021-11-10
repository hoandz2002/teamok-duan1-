<?php 
require_once "./customer.php";
 $id=$_GET['id_customer'];
 delete($id);
 header("location: ./list_customer.php");