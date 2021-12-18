<?php
session_start();
require_once './../../db/connection.php';
require_once './../../db/tour_guide.php';
$id = $_GET['id_tour_guide'];
$dataTourGuide = getIdTourGuide($id);
if (isset($_POST['btn_save'])) {
    if (empty($_POST['name_tour_guide'])) {
        $_SESSION['thongbao'] = "không được để trống tên nhân viên!";
        header("location: ./edit.php?id_tour_guide=$id");
        die;
    }
    $data = [
        'id_tour_guide' => $dataTourGuide['id_tour_guide'],
        'name_tour_guide' => $_POST['name_tour_guide'],
        'phone_tour_guide' => $_POST['phone_tour_guide'],
        'status' => $_POST['status'],
    ];

    updateTourGuide($data);
    header("location: /duan1/admin/tour_guide/list_tour_guide.php");
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
                            <input type="hidden" name="id_tour_guide" value="<?php echo $dataTourGuide['id_tour_guide'] ?>" disabled class="form_input" placeholder="Tự động tăng">
                            <div class="form_group">
                                <lable class="form_lable">Tên nhân viên</lable>
                                <input type="text" name="name_tour_guide" value="<?php echo $dataTourGuide['name_tour_guide'] ?>" class="form_input">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Số điện thoại nhân viên</lable>
                                <input type="text" name="phone_tour_guide" value="<?php echo $dataTourGuide['phone_tour_guide'] ?>" class="form_input">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Trạng thái</lable>
                                <select class="form_input" name="status">
                                    <option value="">--Chọn trạng thái--</option>
                                    <option value="1">Đang hoạt động</option>
                                    <option value="0">Không hoạt động</option>
                                </select>
                            </div>
                            <div class="form_group">
                                <input type="submit" value="Sửa" name="btn_save" class="btn">
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