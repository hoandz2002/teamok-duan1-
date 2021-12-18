<?php
session_start();
require_once './../../db/connection.php';
require_once './../../db/bill_tour.php';
require_once './../../db/service.php';
require_once './../../db/tour_guide.php';
require_once './../../db/customer.php';
$dataActive = getActive();
$id_bill_tours = $_GET['id_bill_tours'];
$data_old = getIdBill2($id_bill_tours);
$data_service = getAllService();
$id_customer = $data_old['id_customer'];
$cus = getAllCustomerById($id_customer);
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
    <link rel="stylesheet" href="/duan1/asset/css/css_admin/error_mess.css">
    <script src="./../../asset/fonts/ckeditor/ckeditor.js"></script>

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
                    <h2>Thông tin Bill</h2>
                </div>
                <div class="right_body">
                    <div class="form_add">
                        <p><b>ID Bill:</b><?=$data_old['id_bill_tours']?></p>
                        <!-- <p>Tên khách hàng:  <?=$data_old['name_customer']?></p> -->
                        <p><b>Số người:</b>  <?=$data_old['quantity_pp']?></p>
                        <p><b>Tên tours:</b>  <?=$data_old['name_tours']?></p>
                        <p><b>Thời gian đăt:</b>  <?=$data_old['date_book']?></p>
                        <p><b>Thời gian đi:</b>  <?=$data_old['date_start']?></p>
                        <p><b>Tên dịch vụ:</b>  <?=$data_old['name_service']?></p>
                        <p><b>Mô tả dịch vụ:  </b><?=$data_old['description_service']?></p>
                        <p><b>Tên khách hàng:</b>  <?=$cus['name_customer']?></p>
                        <p><b>Địa chỉ:</b>  <?=$cus['address_customer']?></p>
                        <p> <b>Trạng thái tours:</b>  <?php if ($data_old['bill_status'] == 0) {
                                            echo 'Đang chờ xác nhận'; ?>
                                        <?php  } else if ($data_old['bill_status'] == 1) {
                                            echo 'Đã xác nhận';
                                        ?>
                                        <?php } elseif ($data_old['bill_status'] == 3) {
                                            echo "Đã khởi hành";
                                        ?>
                                        <?php } elseif ($data_old['bill_status'] == 4) {
                                            echo 'Đã hoàn tất';
                                        ?>

                                        <?php  } elseif ($data_old['bill_status'] == 2) {
                                            echo 'Đã thanh toán';
                                        ?>
                                        <?php }
                                        ?></p>
                                        <br>
                        <a href="./list_bill_tour.php" class="btn">Trở về</i></a>
                    </div>
                </div>
                <div class="" style="height: 180px;"></div>
                <?php require_once './../footer.php'; ?>
            </div>
            <!--right : content-->
        </div>
    </div>
</body>

</html>