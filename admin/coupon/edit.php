<?php
session_start();
require_once './../../db/connection.php';
require_once './../../db/coupon.php';
require_once './../../db/bill_tour.php';
$id_coupon = $_GET['id_coupon'];
$dataCoupon = getIdCoupon($id_coupon);
if (isset($_POST['update'])) {
    if (empty($_POST['name_coupon'])) {
        $_SESSION['error'] = "Không để trống tên mã giảm giá!";
        header("location: ./edit.php?id_coupon=$id_coupon");
        die;
    }

    if (empty($_POST['code_coupon'])) {
        $_SESSION['error'] = "Không để trống code giảm giá!";
        header("location: ./edit.php?id_coupon=$id_coupon");
        die;
    }
    if (empty($_POST['percent_coupon'])) {
        $_SESSION['error'] = "Không để trống phần trăm giảm giá!";
        header("location: ./add_coupon.php");
        die;
    }
    if (empty($_POST['name_coupon'])) {
        $_SESSION['error'] = "Không để trống số lượng mã giảm giá!";
        header("location: ./edit.php?id_coupon=$id_coupon");
        die;
    }

    if (!is_numeric($_POST['number_coupon'])) {
        $_SESSION['error'] = "Dữ liệu nhập không phải là số!";
        header("location: ./edit.php?id_coupon=$id_coupon");
        die;
    } else if ($_POST['number_coupon'] < 0) {
        $_SESSION['error'] = "Dữ liệu nhập không được âm!";
        header("location: ./edit.php?id_coupon=$id_coupon");
        die;
    }
    $data = [
        'id_coupon' => $_POST['id_coupon'],
        'name_coupon' => $_POST['name_coupon'],
        'code_coupon' => $_POST['code_coupon'],
        'number_coupon' => $_POST['number_coupon'],
        'percent_coupon' => $_POST['percent_coupon'],
    ];
    updateCoupon($data);
    header("location:/duan1/admin/coupon/list_coupon.php");
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
                    <h2>Sửa mã giảm giá</h2>
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
                        <form action="/duan1/admin/coupon/edit.php?id_coupon=<?= $dataCoupon['id_coupon']; ?>" method="POST" enctype="multipart/form-data">
                            <input value="<?= $dataCoupon['id_coupon']; ?>" type="hidden" name="id_coupon">
                            <div class="form_group">
                                <label class="form_label">Tên mã giảm giá</label>
                                <input value="<?= $dataCoupon['name_coupon']; ?>" type="text" name="name_coupon" class="form_input">
                            </div>
                            <div class="form_group">
                                <label class="form_label">Code giảm giá</label>
                                <input value="<?= $dataCoupon['code_coupon']; ?>" type="text" name="code_coupon" class="form_input">
                            </div>
                            <div class="form_group">
                                <label class="form_label">Số lượng mã</label>
                                <input value="<?= $dataCoupon['number_coupon']; ?>" type="number" name="number_coupon" class="form_input">
                            </div>
                            <div class="form_group">
                                <label class="form_label">Phần trăm giảm mã</label>
                                <input value="<?= $dataCoupon['percent_coupon']; ?>" type="number" name="percent_coupon" class="form_input">
                            </div>
                            <div class="form_group">
                                <input name="update" type="submit" value="Cập nhật" class="btn btn-add">
                                <a href="/duan1/admin/coupon/list_coupon.php" class="btn">Danh sách</a>
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