<?php
require_once "./../../db/customer.php";
require_once "./../../db/connection.php";
$id = $_GET['id_customer'];
$data = getAllCustomerById($id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/duan1/asset/fonts/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="/duan1/asset/css/css_admin/main.css">
    <style>

    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="left">
                <?php require_once './../sidebar.php'; ?>
            </div>
            <!--left : siderbar-->
            <div class="right">
                <?php require_once './../header.php'; ?>
                <!-- Nội dung ở đây  -->
                <div class="right-heading">
                    <h2>THÔNG TIN KHÁCH HÀNG </h2>
                </div>
                <div>
                    <label for="" style="font-size: 18px;">Tên khách hàng: </label> 
                    <span style="margin-left: 20px; font-weight: bold;"><?= $data['name_customer'] ?></span>
                </div>
                <div>
                    <label for="" style="font-size: 18px;">Địa chi: </label>
                    <span style="margin-left: 81px; font-weight: bold;"><?= $data['address_customer'] ?></span>
                </div>
                <div>
                    <label for="" style="font-size: 18px;">Số điện thoại: </label>
                    <span style="margin-left: 36px; font-weight: bold;"><?= $data['phone_customer'] ?></span>
                </div>
                <div>
                    <label for="" style="font-size: 18px;">Email: </label>
                    <span style="margin-left: 87px; font-weight: bold;"><?= $data['email_customer'] ?></span>
                </div>
                <?php require_once './../footer.php'; ?>
            </div>
            <!--right : content-->
        </div>
    </div>
</body>

</html>