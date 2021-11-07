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
                    <h2>Thêm loại bài viết</h2>
                </div>
                <div class="right_body">
                    <div class="form_add">
                        <form action="" method="post">
                            <div class="form_group">
                                <lable class="form_lable">Mã bài viết</lable>
                                <input type="text" name="" disabled class="form_input" placeholder="Tự động tăng">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Ảnh bài viết</lable>
                                <input type="file" name="image_post" class="form_input">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Tên bài viết</lable>
                                <input type="text" name="name_post" class="form_input">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Mô tả</lable>
                                <input type="text" name="description_post" class="form_input">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Loại post</lable>
                                <select name="id_cate_post" class="form_input">
                                    <option value="">Loại bài viết</option>
                                    <option value="">Loại 1</option>
                                    <option value="">Loại 2</option>
                                    <option value="">Loại 3</option>
                                </select>
                            </div>
                            <div class="form_group">
                                <input type="submit" value="Thêm mới" class="btn">
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