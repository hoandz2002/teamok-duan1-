<?php
require_once "./service.php";
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
                <?php require_once './../../admin/sidebar.php'; ?>
            </div>
            <!--left : siderbar-->
            <div class="right">
                <?php require_once './../../admin/header.php'; ?>
                <!-- Nội dung ở đây  -->
                <div class="right-heading">
                    <h2>Danh sách dịch vụ</h2>
                </div>
                <div class="right_body">
                    <table class="table" cellspacing="12">
                        <thead class="thead">
                            <tr>
                                <th>ID</th>
                                <th>Tên dịch vụ</th>
                                <th>Mô tả</th>
                                <th>Giá dịch vụ</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            <?php foreach ($data as $datas) { ?>
                                <tr>
                                    <td style="border: solid 1px black;font-weight: bold; text-align: center;height: 50px;"><?= $datas['id_service'] ?></td>
                                    <td style="border: solid 1px black;font-weight: bold; text-align: center;"><?= $datas['name_service'] ?></td>
                                    <td style="border: solid 1px black;font-weight: bold; text-align: center;"><?= $datas['description_service'] ?></td>
                                    <td style="border: solid 1px black;font-weight: bold; text-align: center;"><?= $datas['price_service'] ?> </td>

                                    <td>
                                        <a href="./edit.php?id_service=<?= $datas['id_service'] ?>"><i class="mr-8 fas fa-cogs"></i></a>
                                        <a href="./delete.php?id_service=<?= $datas['id_service'] ?>"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="form_group-list">
                        <a href="./create.php" class="btn">Thêm mới</a>
                    </div>
                </div>
                <?php require_once './../../admin/footer.php'; ?>
            </div>
            <!--right : content-->
        </div>
    </div>
</body>

</html>