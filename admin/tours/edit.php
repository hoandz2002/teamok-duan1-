<?php
session_start();
require_once './../../db/connection.php';
require_once './../../db/tour.php';
require_once './../../db/location.php'; 
$id_tours = $_GET['id_tours'];
$data_old = getIdTours($id_tours);
$data_location = getall_location();

// var_dump($data_old);die;
$data_img = getAllImage($id_tours);
$conn = mysqli_connect('localhost', 'root', '', 'duan1');
if (isset($_POST['submit'])) {
    if ($conn) {
        mysqli_query($conn, "SET NAMES 'UTF8'");
    }

    if (empty($_POST['name_tours'])) {
        $_SESSION['error'] = "Không được để trống tên tour";
    }
    if (empty($_POST['description_tours'])) {
        $_SESSION['error'] = "Không được để trống mô tả tour";
    }
    if (empty($_POST['price_tours'])) {
        $_SESSION['error'] = "Không được để trống giá tour";
    }
    if (empty($_POST['id_location'])) {
        $_SESSION['error'] = "Không được để trống địa điểm";
    }
    if (!is_numeric($_POST['price_tours'])) {
        $_SESSION['error'] = "Gía trị nhập không phải là số";
    }


    $name_tours = $_POST['name_tours'];
    $description_tours = $_POST['description_tours'];
    $price_tours = $_POST['price_tours'];
    $sale_tours = $_POST['sale_tours'];
    $id_location = $_POST['id_location'];


    if (isset($_FILES['image'])) {
        $file = $_FILES['image'];


        if ($file['type'] != 'image/jpeg' || $file['type'] != 'image/jpg' || $file['type'] != 'image/png') {
        }
        $file_name = $file['name'];
        if (empty($file_name)) {
            $file_name = $data_old['image'];
        } else {
            move_uploaded_file($file['tmp_name'], './../../images/' . $file_name);
        }
    }

    if (isset($_FILES['images'])) {
        $files = $_FILES['images'];
        $file_names = $files['name'];
        if (!empty($file_names[0])) {
            mysqli_query($conn, "DELETE FROM img_tours WHERE id_tours = $id_tours");
            foreach ($file_names as $key => $value) {
                move_uploaded_file($files['tmp_name'][$key], './../../images/' . $value);
            }
            foreach ($file_names as $value) {
                mysqli_query($conn, "INSERT INTO img_tours(id_tours,images) VALUES('$id_tours','$value')");
            }
        }
    }

    $sql = "UPDATE tours SET name_tours = '$name_tours', description_tours = '$description_tours', price_tours='$price_tours', image ='$file_name', sale_tours='$sale_tours',"
        . "id_location='$id_location' WHERE id_tours = '$id_tours'";

    $query = mysqli_query($conn, $sql);

    header("location:/duan1/admin/tours/list_tours.php");
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
                            <input type="hidden" name="id_tours">
                            <div class="form_group">
                                <lable class="form_lable">Mã tour</lable>
                                <input value="<?= $data_old['id_tours'] ?>" type="text" name="" disabled class="form_input" placeholder="Tự động tăng">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Tên tour</lable>
                                <input value="<?= $data_old['name_tours'] ?>" type="text" name="name_tours" class="form_input">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Mô tả</lable>
                                <!-- <input value="" type="text" name="description_location" class="form_input"> -->
                                <textarea id="description_tours" name="description_tours" class="form_input">
                                    <?= $data_old['description_tours']; ?>
                                </textarea>

                                <!-- (3): Code Javascript thay thế textarea có id='description_tours' bởi CKEditor -->
                                <script>
                                    CKEDITOR.replace('description_tours');
                                </script>
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Giá tour</lable>
                                <input value="<?= $data_old['price_tours'] ?>" type="number" name="price_tours" class="form_input">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Giảm giá</lable>
                                <input value="<?php if ($data_old['sale_tours'] != NULL) {
                                                    echo $data_old['sale_tours'];
                                                } else {
                                                    echo "";
                                                } ?>" type="number" name="sale_tours" class="form_input">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Ảnh đại diện</lable>
                                <input value="<?= $data_old['image'] ?>" type="file" name="image" class="form_input">
                            </div>
                            <img width="150px" src="./../../asset/img/<?= $data_old['image'] ?>" alt="">
                            <div class="form_group">
                                <lable class="form_lable">Thư viện ảnh</lable>
                                <?php for ($i = 0; $i < count($data_img); $i++) { ?>
                                    <img width="150px" src="./../../asset/img/<?= $data_img[$i]['images']; ?>" alt="">
                                <?php } ?>
                                <input type="file" name="images[]" class="form_input" multiple="multiple">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Địa điểm</lable>
                                <select class="form_input" name="id_location">
                                    <option value="">--Chọn địa điểm--</option>
                                    <?php foreach ($data_location as $ds) { ?>
                                        <option value="<?= $ds['id_location'] ?>"<?php echo ($ds['id_location'] == $data_old['id_location'] ? 'selected' : '') ?>><?= $ds['name_location'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form_group">
                                <input name="submit"  type="submit" value="Cập nhật" class="btn btn-add">
                                <input type="reset" value="Nhập lại" class="btn btn-reset">
                                <a href="/duan1/admin/tours/list_tours.php" class="btn">Danh sách</a>
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