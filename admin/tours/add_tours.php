<?php
require_once './../../db/connection.php';
require_once './../../db/tour.php';
require_once './../../db/location.php';
$conn = mysqli_connect('localhost', 'root', '', 'duan1');
if ($conn) {
    mysqli_query($conn, "SET NAMES 'UTF8'");
}

$data_location = getall_location();

if (isset($_POST['submit'])) {

    $name_tours = $_POST['name_tours'];
    $short_description_tours = $_POST['short_description_tours'];
    $description_tours = $_POST['description_tours'];
    $price_tours = $_POST['price_tours'];
    $sale_tours = $_POST['sale_tours'];
    $id_location = $_POST['id_location'];


    if (isset($_FILES['image'])) {
        $file = $_FILES['image'];
        $file_name = $file['name'];
        move_uploaded_file($file['tmp_name'], './../../asset/img/' . $file_name);
    }

    if (isset($_FILES['images'])) {
        $files = $_FILES['images'];
        $file_names = $files['name'];
        foreach ($file_names as $key => $value) {
            move_uploaded_file($files['tmp_name'][$key], './../../asset/img/' . $value);
        }
    }
    $sql = "INSERT INTO tours(name_tours, short_description_tours, description_tours, price_tours, sale_tours,id_location,image) VALUES('$name_tours', '$short_description_tours', '$description_tours', '$price_tours', '$sale_tours','$id_location','$file_name')";
    $query = mysqli_query($conn, $sql);
    $id_tours = mysqli_insert_id($conn);
    foreach ($file_names as $key => $value) {
        mysqli_query($conn, "INSERT INTO img_tours(id_tours,images) VALUES('$id_tours','$value')");
    }
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
                    <h2>Thêm tour</h2>
                </div>
                <div class="right_body">
                    <div class="form_add">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_tours">
                            <div class="form_group">
                                <lable class="form_lable">Mã tour</lable>
                                <input type="text" name="" disabled class="form_input" placeholder="Tự động tăng">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Tên tour</lable>
                                <input type="text" name="name_tours" class="form_input">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Mô tả ngắn</lable>
                                <input type="text" name="short_description_tours" class="form_input">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Mô tả</lable>
                                <!-- <input type="text" name="description_location" class="form_input"> -->
                                <textarea id="description_tours" name="description_tours" class="form_input">
                                    <!-- <p><strong>Mô tả</strong></p> -->
                                </textarea>

                                <!-- (3): Code Javascript thay thế textarea có id='description_tours' bởi CKEditor -->
                                <script>
                                    CKEDITOR.replace('description_tours');
                                </script>
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Giá tour</lable>
                                <input type="number" name="price_tours" class="form_input">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Giảm giá</lable>
                                <input type="number" name="sale_tours" class="form_input">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Ảnh đại diện</lable>
                                <input type="file" name="image" class="form_input">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Thư viện ảnh</lable>
                                <input type="file" name="images[]" class="form_input" multiple="multiple">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Địa điểm</lable>
                                <select class="form_input" name="id_location">
                                    <option value="">--Chọn địa điểm--</option>
                                    <?php foreach ($data_location as $ds) { ?>
                                        <option value="<?= $ds['id_location'] ?>"><?= $ds['name_location'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form_group">
                                <input name="submit" type="submit" value="Thêm mới" class="btn btn-add">
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