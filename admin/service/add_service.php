<?php
require_once './../../db/connection.php';
require_once './../../db/service.php';

if (isset($_POST['btn_submit'])) {
    $data = [
        'name_service' => $_POST['name_service'],
        'description_service' => $_POST['description_service'],
        'price_service' => $_POST['price_service'],
    ];
    insert_service($data);
    header("location: /duan1/admin/service/list_service.php");
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
                    <h2>Thêm loại dịch vụ</h2>
                </div>
                <div class="right_body">
                    <div class="form_add">
                        <form action="" method="post">
                            <div class="form_group">
                                <lable class="form_lable">Mã dịch vụ</lable>
                                <input type="text" name="" disabled class="form_input" placeholder="Tự động tăng">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Tên dịch vụ</lable>
                                <input type="text" name="name_service" class="form_input">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Mô tả</lable>
                                <!-- <input type="text" name="description_service" class="form_input"> -->
                                <textarea id="description_service" name="description_service" class="form_input">
                                    <!-- <p><strong>Mô tả</strong></p> -->
                                </textarea>

                                <!-- (3): Code Javascript thay thế textarea có id='description_service' bởi CKEditor -->
                                <script>
                                    CKEDITOR.replace('description_service');
                                </script>
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Giá dịch vụ</lable>
                                <input type="number" name="price_service" class="form_input">
                            </div>
                            <div class="form_group">
                                <input type="submit" value="Thêm mới" name="btn_submit" class="btn btn-add">
                                <input type="reset" value="Nhập lại" class="btn btn-reset">
                                <a href="/duan1/admin/service/list_service.php" class="btn">Danh sách</a>
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