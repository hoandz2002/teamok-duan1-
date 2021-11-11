<?php
session_start();
require_once './service.php';
$id = $_GET['id_service'];
$data = getid($id);
// var_dump($data); die;

if(isset($_POST['btn_save'])){
    $data = [
        'id_service' => $data['id_service'],
        'name_service' => $_POST['name_service'],
        'description_service' => $_POST['description_service'],
        'price_service' => $_POST['price_service'],
    ];

    update($data);
    header("location: ./list_service.php");
}
?>
<!--    
    <h2 class="alert alert-danger">UPDATE service</h2>
    <form action="edit.php?id_service=<?= $data['id_service'] ?>" method="post" enctype="multipart/form-data">
        <fieldset hidden>
            <div class="mb-3">
                <label for="disabledTextInput" hidden class="form-label">Mã khách hàng</label>
                <input style="background-color: rgba( 0, 0, 0, 0.3);" id="disabledTextInput" name="id_service" class="form-control" type="hidden" value="<?= $data['id_service'] ?>">
            </div>
        </fieldset>
       
    <div>
        <label for="">name service</label>
        <input type="text" name="name_service" value="<?php echo $data['name_service'] ?>" id="">
    </div>
    <div>
        <label for="">description service</label>
        <input type="text" name="description_service" value="<?php echo $data['description_service'] ?>" id="">
    </div>
    <div>
        <label for="">price service</label>
        <input type="text" name="price_service" value="<?php echo $data['price_service'] ?>" id="">
    </div>
   
        </p>
        <div class="form-group">
            <button name="btn_save" class="btn btn-default">Sửa</button>
        </div>
    </form>
  

    </div>
</body>

</html>
 -->


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
            <?php require_once './../../admin/sidebar.php'; ?>
            </div>
            <!--left : siderbar-->
            <div class="right">
            <?php require_once './../../admin/header.php'; ?>
                <!-- Nội dung ở đây  -->
                <div class="right-heading">
                    <h2>Udate dịch vụ</h2>
                </div>
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
                                <input type="text" name="description_service" value="<?php echo $data['description_service'] ?>" class="form_input">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Giá dịch vụ</lable>
                                <input type="number" name="price_service" value="<?php echo $data['price_service'] ?>" class="form_input">
                            </div>
                            <div class="form_group">
                            <input type="submit" name="btn_save" class="btn btn-add id=">
                                <input type="reset" value="Nhập lại" class="btn btn-reset">
                                <a href="/duan1/admin/service/list_service.php" class="btn">Thêm mới</a>
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