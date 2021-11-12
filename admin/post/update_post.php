<?php
session_start();
require_once './../../db/connection.php';
require_once './../../db/post.php';
require_once './../../db/cate_post.php';
$data1 = getAll();
$id = $_GET['id_post'];
$data = getId_post($id);
// var_dump($data); die;

if (isset($_POST['btn_save'])) {
    $data = [
        'id_post' => $data['id_post'],
        'image_post' => $_FILES['image_post']['name'],
        'name_post' => $_POST['name_post'],
        'description_post' => $_POST['description_post'],
        'id_cate_post' => $_POST['id_cate_post'],
    ];
    $file = $_FILES['image_post'];
    $file_name = $file['name'];
    move_uploaded_file($file['tmp_name'], './../../asset/img/' . $file_name);

    update_post($data);
    // var_dump(update($data)); die;
    header("location: ./list_post.php");
}
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
                    <h2>Thêm loại bài viết</h2>
                </div>
                <div class="right_body">
                    <div class="form_add">
                        <form action="/duan1/admin/post/update_post.php?id_post=<?=$data['id_post']?>" method="post" enctype="multipart/form-data">
                            <div class="form_group">
                                <lable class="form_lable">Mã bài viết</lable>
                                <input type="text" name="" disabled class="form_input" placeholder="Tự động tăng">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Ảnh bài viết</lable>
                                <input type="file" value="<?=$data['id_post']?>" name="image_post" class="form_input">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Tên bài viết</lable>
                                <input type="text" value="<?=$data['name_post']?>" name="name_post" class="form_input">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Mô tả</lable>
                                <input type="text" value="<?=$data['description_post']?>" name="description_post" class="form_input">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Loại post</lable>
                                <select class="form_input" name="id_cate_post">
                                    <?php foreach ($data1 as $ds) { ?>
                                        <option  value="<?=$ds['id_cate_post']?>"><?=$ds['name_cate_post']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form_group">
                                <input type="submit" value="Thêm mới" name="btn_save" class="btn">
                                <input type="reset" value="Nhập lại" class="btn btn-reset">
                                <a href="/duan1/admin/post/list_post.php" class="btn">Danh sách</a>
                            </div>
                        </form>
                    </div>
                </div>
                <?php require_once './../footer.php'; ?>
            </div>
            <!--right : content-->
        </div>
    </div>
</body>

</html>