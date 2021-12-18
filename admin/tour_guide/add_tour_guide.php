<?php
session_start();
require_once './../../db/connection.php';
require_once './../../db/tour_guide.php';

if (isset($_POST['submit'])) {
    if (empty($_POST['name_tour_guide'])) {
        $_SESSION['error'] = "Không để trống tên nhân viên!";
        header("location: ./add_tour_guide.php");
        die;
    }
   
    if (empty($_POST['phone_tour_guide'])) {
        $_SESSION['error'] = "Không để trống tên nhân viên!";
        header("location: ./add_tour_guide.php");
        die;
    }
    $data = [
        'name_tour_guide' => $_POST['name_tour_guide'],
        'phone_tour_guide' => $_POST['phone_tour_guide'],
    ];
    insertTourGuide($data);
    header("location:/duan1/admin/tour_guide/list_tour_guide.php");
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
                    <h2>Thêm nhân viên</h2>
                </div>
                <?php if (isset($_SESSION['error'])) { ?>
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
                                    echo $_SESSION['error'];
                                    unset($_SESSION['error']);
                                    ?>
                                </p>
                            </div>
                            <div class="toast__close">
                                <i class='fas fa-times'></i>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="right_body">
                    <div class="form_add">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form_group">
                                <label class="form_label">Tên nhân viên</label>
                                <input type="text" name="name_tour_guide" class="form_input">
                            </div>
                            <div class="form_group">
                                <label class="form_label">Số điện thoại</label>
                                <input type="phone" name="phone_tour_guide" class="form_input">
                            </div>
                            <div class="form_group">
                                <input name="submit" type="submit" value="Thêm mới" class="btn btn-add">
                                <a href="/duan1/admin/tour_guide/list_tour_guide.php" class="btn">Danh sách</a>
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