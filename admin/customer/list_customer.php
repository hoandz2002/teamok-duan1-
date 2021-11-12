<?php
require_once "./../../db/connection.php";
require_once "./../../db/customer.php";
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
                    <h2>Danh sách người dùng</h2>
                </div>
                <div class="right_body">
                <table class="table" cellspacing="12">
                        <thead class="thead">
                            <tr>
                                <th>ID</th>
                                <th>Tên người dùng</th>
                                <th>CMT/CCCD</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Phân quyền</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            <?php foreach ($data as $datas) { ?>
                                <tr>
                                    <td><?= $datas['id_customer'] ?></td>
                                    <td><?= $datas['name_customer'] ?></td>
                                    <td><?= $datas['cmt_customer'] ?></td>
                                    <td><?= $datas['phone_customer'] ?></td>
                                    <td><?= $datas['email_customer'] ?> </td>
                                    <td><?= $datas['classify_customer']?></td>


                                    <td>

                                        <a href="./edit.php?id_customer=<?= $datas['id_customer'] ?>"><i class="mr-8 fas fa-cogs"></i></a>
                                        <a href="./delete.php?id_customer=<?= $datas['id_customer'] ?>"><i class="fas fa-trash-alt"></i></a>

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