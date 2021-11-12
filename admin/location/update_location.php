<?php 
require_once './../../db/connection.php';
require_once './../../db/location.php';
$id = $_GET['id_location'];
$data = getid_location($id);
if(isset($_POST['submit'])){
    $data = [
        'name_location' => $_POST['name_location'],
        'description_location' => $_POST['description_location']
    ];
    insert_location($data);
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
                <div class="right_body">
                    <div class="form_add">
                        <form action="/duan1/admin/location/update_location.php" method="POST">
                            <div class="form_group">
                                <lable class="form_lable">Mã địa điểm</lable>
                                <input type="text" name="id_location" value="<?=$data['id_location'];?>" disabled class="form_input" placeholder="Tự động tăng">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Tên địa điểm</lable>
                                <input type="text" name="name_location" value="<?=$data['name_location'];?>" class="form_input">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Mô tả</lable>
                                <input type="text" name="description_location" value="<?=$data['description_location'];?>" class="form_input">
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