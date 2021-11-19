<?php
session_start();
require_once './../../db/connection.php';
require_once './../../db/service.php';
$id = $_GET['id_service'];
$data = getid_service($id);
// var_dump($data); die;

if (isset($_POST['btn_save'])) {
    if (
        empty($_POST['name_service']) ||
        empty($_POST['description_service']) ||
        empty($_POST['price_service'])
    ) {
        $_SESSION['thongbao'] = "Không để trống thông tin!";
        header("location: ./update_service.php?id_service=$id");
        die;
    }
    if (
        is_numeric($_POST['price_service']) == false || $_POST['price_service'] < 0
    ) {
        $_SESSION['thongbao'] = "giá là số (số dương)";
        header("location: ./update_service.php?id_service=$id");
        die;
    }
    $data = [
        'id_service' => $data['id_service'],
        'name_service' => $_POST['name_service'],
        'description_service' => $_POST['description_service'],
        'price_service' => $_POST['price_service'],
    ];

    update_service($data);
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
    <link rel="stylesheet" href="/duan1/asset/css/css_admin/error_mess.css">
    <script src="./../../asset/fonts/ckeditor/ckeditor.js"></script>
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
                    <h2>Udate dịch vụ</h2>
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
                        <form action="" method="post">
                            <fieldset hidden>
                                <div class="mb-3">
                                    <label for="disabledTextInput" hidden class="form-label">Mã khách hàng</label>
                                    <input style="background-color: rgba( 0, 0, 0, 0.3);" id="disabledTextInput" name="id_service" class="form-control" type="hidden" value="<?= $data['id_service'] ?>">
                                </div>
                            </fieldset>
                            <div class="form_group">
                                <lable class="form_lable">Tên dịch vụ</lable>
                                <input type="text" name="name_service" value="<?php echo $data['name_service'] ?>" class="form_input">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Mô tả</lable>
                                <!-- <input type="text" name="description_service" class="form_input"> -->
                                <textarea id="description_service" name="description_service" class="form_input">
                                    <p><?php echo $data['description_service'] ?></p>
                                </textarea>

                                <!-- (3): Code Javascript thay thế textarea có id='description_service' bởi CKEditor -->
                                <script>
                                    CKEDITOR.replace('description_service');
                                </script>
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Giá dịch vụ</lable>
                                <input type="number" name="price_service" value="<?php echo $data['price_service'] ?>" class="form_input">
                            </div>
                            <div class="form_group">
                                <input type="submit" name="btn_save" value="Sửa" class="btn btn-add id=">
                                <input type="reset" value="Nhập lại" class="btn btn-reset">
                                <a href="/duan1/admin/service/list_service.php" class="btn">Danh sách</a>
                            </div>
                        </form>
                    </div>
                </div>
                <?php require_once './../../admin/footer.php'; ?>
            </div>
            <!--right : content-->
        </div>
    </div>
</body>

</html>