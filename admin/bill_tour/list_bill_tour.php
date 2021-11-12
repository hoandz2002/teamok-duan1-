<?php
require_once "./../../db/connection.php";
require_once "./../../db/bill_tour.php";
$data = getall();
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
                    <h2>Danh sách hóa đơn</h2>
                </div>
                <div class="right_body">
                    <table class="table" cellspacing="12">
                        <thead class="thead">
                            <tr>
                                <th>ID</th>
                                <th>tên khahcs hàng</th>
                                <th>Mã khách hàng</th>
                                <th>số người</th>
                                <th>Giá</th>
                                <th>Tên tour</th>
                                <th>thời gian đặt tour</th>
                                <th>Loại dịch vụ</th>
                                <th>thời gian khởi hành</th>
                                <th colspan="2">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">

                            <?php foreach ($data as $datas) { ?>
                                <tr>
                                    <td><?= $datas['id_bill_tours'] ?></td>
                                    <td><?= $datas['name_customer'] ?></td>
                                    <td><?= $datas['id_customer'] ?></td>
                                    <td><?= $datas['quantity_pp'] ?></td>
                                    <td><?= $datas['price_bill_tours'] ?> </td>
                                    <td><?= $datas['name_tours'] ?></td>
                                    <td><?= $datas['date_book'] ?></td>
                                    <td><?= $datas['name_service'] ?> </td>
                                    <td><?= $datas['date_start'] ?></td>


                                    <td>
                                        <a href="./edit.php?id_bill_tour=<?= $datas['id_bill_tours'] ?>"><i class="mr-8 fas fa-cogs"></i></a>
                                        <a href="./delete.php?id_bill_tour=<?= $datas['id_bill_tours'] ?>"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                    </table>
                </div>
                <?php require_once './../footer.php'; ?>
            </div>
            <!--right : content-->
        </div>
    </div>
</body>

</html>