<?php
require_once './../../db/connection.php';
require_once './../../db/post.php';
$data = getAll_post();
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
                    <h2>Danh sách bài viết</h2>
                </div>
                <div class="right_body">
                    <table class="table" cellspacing="12">
                        <thead class="thead">
                            <tr>
                                <th>ID</th>
                                <th>Ảnh bài viết</th>
                                <th>Tên bài viết</th>
                                <th>Mô tả</th>
                                <th>Loại bài viết</th>
                                <th colspan="2">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            <?php foreach ($data as $datas) { ?>
                                <tr>
                                    <td><?= $datas['id_post'] ?></td>
                                    <td><img width="60px" src="./../../asset/img/<?= $datas['image_post'] ?>" alt=""></td>
                                    <td><?= $datas['name_post'] ?></td>
                                    <td><?= $datas['description_post'] ?></td>
                                    <td><?= $datas['name_cate_post'] ?> </td>


                                    <td>
                                        <a href="/duan1/admin/post/update_post.php?id_post=<?= $datas['id_post'] ?>"><i class="mr-8 fas fa-cogs"></i></a>
                                        <a href="/duan1/admin/post/delete_post.php?id_post=<?= $datas['id_post'] ?>"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="form_group-list">
                        <a href="/duan1/admin/post/add_post.php" class="btn">Thêm mới</a>
                    </div>
                </div>
                <?php require_once './../footer.php'; ?>
            </div>
            <!--right : content-->
        </div>
    </div>
</body>

</html>