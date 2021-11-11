<?php 
require_once "./cate_post.php";
$data = getAll();
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
                    <h2>Danh sách bài viết</h2>
                </div>
                <div class="right_body">
                    <table class="table" cellspacing="12">
                        <thead class="thead">
                            <tr>
                                <th>ID</th>
                                <th>Tên loại</th>
                                <th colspan="2">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                        <?php foreach ($data as $datas) { ?>
                <tr>
                    <td><?= $datas['id_cate_post'] ?></td>
                    <td ><?= $datas['name_cate_post'] ?></td>
                  
                  
                   
                    <td>
                        <a href="./edit.php?id_cate_post=<?= $datas['id_cate_post'] ?>"><i class="mr-8 fas fa-cogs"></i></a>

                   
                    <a href="./delete.php?id_cate_post=<?= $datas['id_cate_post'] ?>"><i class="fas fa-trash-alt"></i></a>
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