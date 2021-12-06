<?php
require_once "./../../db/connection.php";
require_once "./../../db/contacts.php";
$id = $_GET['id_contacts'];
delete_contacts($id);
header("location: ./list_contacts.php");