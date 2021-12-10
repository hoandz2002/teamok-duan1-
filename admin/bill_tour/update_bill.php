<?php
session_start();
require_once './../../db/connection.php';
require_once './../../db/bill_tour.php';
require_once './../../db/service.php';
$id_bill_tours = $_GET['id_bill_tours'];
$data_old = getIdBill2($id_bill_tours);
$data_service = getAllService();
if (isset($_POST['submit'])) {

    if (empty($_POST['name_customer'])) {
        $_SESSION['error'] = "Không được để trống tên khách hàng";
    }
    if (empty($_POST['quantity_pp'])) {
        $_SESSION['error'] = "Không được để trống số lượng người";
    }
    if (empty($_POST['price_bill_tours'])) {
        $_SESSION['error'] = "Không được để trống giá bill";
    }

    if (empty($_POST['date_start'])) {
        $_SESSION['error'] = "Không được để trống ngày khởi hành";
    }
    $data = [
        'id_bill_tours' => $_POST['id_bill_tours'],
        'id_customer' => $_POST['id_customer'],
        'quantity_pp' => $_POST['quantity_pp'],
        'price_bill_tours' => $_POST['price_bill_tours'],
        'id_tours' => $_POST['id_tours'],
        'date_book' => $_POST['date_book'],
        'date_start' => $_POST['date_start'],
        'id_service' => $_POST['id_service'],
        'bill_status' => $_POST['bill_status'],
    ];
    update_bill($data);
    header("location:/duan1/admin/bill_tour/list_bill_tour.php");
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
                    <h2>Thêm loại bài viết</h2>
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
                        </div>
                    </div>
                <?php } ?>
                <div class="right_body">
                    <div class="form_add">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_bill_tours" value="<?= $data_old['id_bill_tours'] ?>">
                            <input type="hidden" name="id_customer" value="<?= $data_old['id_customer'] ?>">
                            <input type="hidden" name="id_tours" value="<?= $data_old['id_tours'] ?>">
                            <div class="form_group">
                                <lable class="form_lable">Mã bill</lable>
                                <input value="<?= $data_old['id_bill_tours'] ?>" type="text" name="" disabled class="form_input" placeholder="Tự động tăng">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Số lượng người</lable>
                                <input value="<?= $data_old['quantity_pp'] ?>" type="number" name="quantity_pp" class="form_input">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Gía tour</lable>
                                <input value="<?= $data_old['price_bill_tours'] ?>" type="number" name="price_bill_tours" class="form_input">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Giá tour</lable>
                                <input value="<?= $data_old['price_tours'] ?>" type="number" name="price_tours" class="form_input">
                            </div>
                            <input type="date" name="date_book" value="<?php echo date('Y-m-d') ?>" hidden>
                            <input value="<?= $data_old['date_start'] ?>" type="date" name="date_start" style="width: 320px;padding: 8px 16px;border-radius: 16px;outline: none; border: 1px solid;">
                            <div class="form_group">
                                <lable class="form_lable">Loại dịch vụ</lable>
                                <select class="form_input" name="id_service">
                                    <option value="">--Chọn loại dịch vụ--</option>
                                    <?php foreach ($data_service as $ds) { ?>
                                        <option value="<?= $ds['id_service'] ?>" <?php echo ($ds['id_service'] == $data_old['id_service'] ? 'selected' : '') ?>><?= $ds['name_service'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Trạng thái tours</lable>
                                <select class="form_input" name="bill_status">
                                    <option value="">--Chọn trạng thái tour--</option>
                                        <option value="0">Chưa xác nhận</option>
                                        <option value="1">Đã xác nhận</option>
                                        <option value="2">Đã thanh toán</option>
                                        <option value="3">Đang khởi hành</option>
                                        <option value="4">Đã hoàn tất</option>
                                </select>
                            </div>
                            <div class="form_group">
                                <input name="submit" type="submit" value="Xác nhận" class="btn btn-add">
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