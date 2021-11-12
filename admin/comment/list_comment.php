<?php
require_once "./../../db/connection.php";
require_once "./../../db/comment.php";
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
                    <h2>Danh sách bình luận</h2>
                </div>
                <div class="right_body">
                    <table class="table" cellspacing="12">
                        <thead class="thead">
                            <tr>
                                <th>ID</th>
                                <th>Tên khách hàng</th>
                                <th>Tên tours</th>
                                <th>Nội dung</th>
                                <th>Ngày bình luận</th>
                                <th>Đánh giá sao</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            <?php foreach ($data as $datas) { ?>
                                <tr>
                                    <td><?= $datas['id_comment'] ?></td>
                                    <td><?= $datas['name_customer'] ?></td>
                                    <td><?= $datas['content_comment'] ?></td>
                                    <td><?= $datas['date_comment'] ?></td>
                                    <td><?= $datas['rating'] ?> </td>
                                    <td><button><a href="./edit.php?id_comment=<?= $datas['id_comment'] ?>">Cập nhật</a></button><button><a href="./delete.php?id_comment=<?= $datas['id_comment'] ?>">Xóa</a></button></td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php require_once './../footer.php'; ?>
            </div>
            <!--right : content-->
        </div>
    </div>
</body>

</html>