<?php
session_start();
require_once './../../db/connection.php';
require_once './../../db/location.php';
$id = $_GET['id_location'];
$data_old = getid_location($id);
if (isset($_POST['submit'])) {
    if (
        empty($_POST['name_location']) ||
        empty($_POST['description_location'])
    ) {
        $_SESSION['thongbao'] = "Không để trống thông tin!";
        header("location: ./update_location.php?id_location=$id");
        die;
    }
    $data = [
        'id_location' => $data['id_location'],
        'name_location' => $_POST['name_location'],
        'description_location' => $_POST['description_location'],
        'img_location' => $_FILES['img_location']['name'],
    ];
    // if (isset($_FILES['img_location'])) {
    //     $file = $_FILES['img_location'];
    //     $file_name = $file['name'];
    //     if(empty($file)) {
    //         $data['img_location'] = $data_old['img_location'];
    //     }
    //     move_uploaded_file($file['tmp_name'], './../../asset/img/' . $file_name);
    // }
    if ($_FILES['img_location']['name'] == '') {
        $data['img_location'] = $data_old['img_location'];
    } else {
        $file_name = $_FILES['img_location']['name'];
        if (strpos($_FILES['img_location']['type'], 'image') === false) {
            $_SESSION['thongbao'] = "File phải là ảnh!";
            header("location: ./update_location.php?id_location=$id");
            die;
        }
    }
    if (isset($_FILES['img_location'])) {
        $file = $_FILES['img_location'];
        $file_name = $file['name'];
        move_uploaded_file($file['tmp_name'], './../../asset/img/' . $file_name);
    }

    update_location($data);
    header("location: /duan1/admin/location/list_location.php");
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
                    <h2>Thêm địa điểm</h2>
                </div>
                <?php if (isset($_SESSION['thongbao'])) { ?>
                    <div id="toast">
                        <div class="tst_test tst--error">
                            <div class="toast__icon">
                                <i class="fas fa-exclamation"></i>
                            </div>
                            <div class="toast__body">
                                <h3 class="toast__title" style="font-weight: 600;color: #333;">
                                    Error
                                </h3>
                                <p class="toast__msg">
                                    <?php
                                    echo $_SESSION['thongbao'];
                                    unset($_SESSION['thongbao']);
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="right_body">
                    <div class="form_add">
                        <form action="/duan1/admin/location/update_location.php?id_location=<?= $data_old['id_location']; ?>" method="POST" enctype="multipart/form-data">
                            <div class="form_group">
                                <lable class="form_lable">Mã địa điểm</lable>
                                <input type="text" name="id_location" value="<?= $data_old['id_location']; ?>" disabled class="form_input" placeholder="Tự động tăng">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Tên địa điểm</lable>
                                <input type="text" name="name_location" value="<?= $data_old['name_location']; ?>" class="form_input">
                            </div>
                            <div class="form_group">
                                <img src="./../../asset/img/<?= $data_old['img_location']; ?>" width="200px" alt="">
                                <lable class="form_lable">Ảnh đại diện</lable>
                                <input type="file" name="img_location" class="form_input">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Mô tả</lable>
                                <textarea id="description_location" name="description_location" class="form_input">
                                    <p><?= $data_old['description_location']; ?></p>
                                </textarea>

                                <!-- (3): Code Javascript thay thế textarea có id='description_location' bởi CKEditor -->
                                <script>
                                    CKEDITOR.replace('description_location');
                                </script>
                            </div>
                            <div class="form_group">
                                <input type="submit" value="Sửa" name="submit" class="btn btn-add">
                                <input type="reset" value="Nhập lại" class="btn btn-reset">
                                <a href="/duan1/admin/location/list_location.php" class="btn">Danh sách</a>
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