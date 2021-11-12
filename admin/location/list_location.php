<?php
require_once './../../db/connection.php';
require_once './../../db/location.php';
$data = getall_location();

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
                    <h2>Danh sách địa điểm</h2>
                </div>
                <div class="right_body">
                    <table class="table" cellspacing="12">
                        <thead class="thead">
                            <tr>
                                <th>ID</th>
                                <th>Tên địa điểm</th>
                                <th>Mô tả</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            <?php foreach ($data as $ds) {
                                extract($ds); ?>
                                <tr>
                                    <td><?= $id_location; ?></td>
                                    <td><?= $name_location; ?></td>
                                    <td><?= $description_location; ?></td>
                                    <td>
                                        <a href="/duan1/admin/location/update_location.php?id_location=<?= $id_location; ?>"><i class="mr-8 fas fa-cogs"></i></a>
                                        <a href="/duan1/admin/location/delete_location.php?id_location=<?= $id_location; ?>"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="form_group-list">
                        <a href="/duan1/admin/location/add_location.php" class="btn">Thêm mới</a>
                    </div>
                </div>
                <?php require_once './../footer.php'; ?>
            </div>
            <!--right : content-->
        </div>
    </div>

</body>

</html>