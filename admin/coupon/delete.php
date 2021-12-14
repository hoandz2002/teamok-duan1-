<?php
require_once './../../db/connection.php';
require_once './../../db/coupon.php';
$id = $_GET['id_coupon'];
deleteCoupon($id);
header('Location: /duan1/admin/coupon/list_coupon.php');
