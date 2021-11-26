<?php
session_start();
require_once './../../db/connection.php';
require_once './../../db/post.php';
require_once './../../db/cate_post.php';
$data1 = getAll_cate();
$id = $_GET['id_post'];
$data_id = getId_post($id);
// var_dump($data); die;

if (isset($_POST['btn_save'])) {
    if (
        empty($_POST['name_post']) ||
        empty($_POST['description_post']) ||
        empty($_POST['id_cate_post']) ||
        empty($_POST['short_description_post']) 
    ) {
        $_SESSION['thongbao'] = "không để trống thông tin!";
        header("location: ./update_post.php?id_post=$id");
        die;
    }
    $data = [
        'id_post' => $data_id['id_post'],
        'short_description_post' => $_POST['short_description_post'],
        'image_post' => $_FILES['image_post']['name'],
        'name_post' => $_POST['name_post'],
        'description_post' => $_POST['description_post'],
        'id_cate_post' => $_POST['id_cate_post'],
    ];
    if ($_FILES['image_post']['name'] == '') {
        $data['image_post'] = $data_id['image_post'];
    } else {
        $file_name = $_FILES['image_post']['name'];
        if (strpos($_FILES['image_post']['type'], 'image') === false) {
            $_SESSION['thongbao'] = "File phải là ảnh!";
            header("location: ./update_post.php?id_post=$id");
            die;
        }
    }
    if (isset($_FILES['image_post'])) {
        $file = $_FILES['image_post'];
        $file_name = $file['name'];
        move_uploaded_file($file['tmp_name'], './../../asset/img/' . $file_name);
    }

    // if (empty($_FILES['image_post']) === false) {

    // }
    update_post($data);
    // var_dump(update($data)); die;
    header("location: ./list_post.php");
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
                        <form action="/duan1/admin/post/update_post.php?id_post=<?= $data_id['id_post'] ?>" method="post" enctype="multipart/form-data">
                            <div class="form_group">
                                <lable class="form_lable">Mã bài viết</lable>
                                <input type="text" name="id_post" value="<?= $data_id['id_post'] ?>" disabled class="form_input" placeholder="Tự động tăng">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Mô tả ngắn bài viết</lable>
                                <input type="text" value="<?= $data_id['short_description_post'] ?>" name="short_description_post" class="form_input">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Ảnh bài viết</lable>
                                <input type="file" value="<?= $data_id['id_post'] ?>" name="image_post" class="form_input">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Tên bài viết</lable>
                                <input type="text" value="<?= $data_id['name_post'] ?>" name="name_post" class="form_input">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Mô tả</lable>
                                <textarea id="description_post" name="description_post" class="form_input">
                                    <p><?= $data_id['description_post'] ?></p>
                                </textarea>

                                <!-- (3): Code Javascript thay thế textarea có id='description_post' bởi CKEditor -->
                                <script>
                                    CKEDITOR.replace('description_post');
                                </script>
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Loại post</lable>
                                <select class="form_input" name="id_cate_post">
                                    <option value="">Chọn loại bài viết</option>
                                    <?php foreach ($data1 as $ds) { ?>
                                        <option value="<?= $ds['id_cate_post'] ?>"<?php echo ($ds['id_cate_post'] == $data_id['id_cate_post'] ? 'selected' : '') ?>><?= $ds['name_cate_post'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form_group">
                                <input type="submit" value="Sửa" name="btn_save" class="btn">
                                <input type="reset" value="Nhập lại" class="btn btn-reset">
                                <a href="/duan1/admin/post/list_post.php" class="btn">Danh sách</a>
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