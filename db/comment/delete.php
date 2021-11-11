<?php 
require_once "./comment.php";

$id = $_GET['id_comment'];
delete($id);
header("location: ./list_comment.php");