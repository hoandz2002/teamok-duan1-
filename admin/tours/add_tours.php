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
                    <h2>Thêm tour</h2>
                </div>
                <div class="right_body">
                    <div class="form_add">
                        <form action="" method="post">
                            <div class="form_group">
                                <lable class="form_lable">Mã tour</lable>
                                <input type="text" name="" disabled class="form_input" placeholder="Tự động tăng">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Ảnh đại diện</lable>
                                <input type="file" name="image_tours" class="form_input">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Tên tour</lable>
                                <input type="text" name="name_tours" class="form_input">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Mô tả</lable>
                                <input type="text" name="description_tours" class="form_input">
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
                                <lable class="form_lable">Thời gian</lable>
                                <input type="date" name="time_tours" class="form_input">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Thư viện ảnh</lable>
                                <input type="file" name="gallery_tours" class="form_input">
                            </div>
                            <div class="form_group">
                                <lable class="form_lable">Địa điểm</lable>
                                <select class="form_input">
                                    <option value="">--Chọn địa điểm--</option>
                                    <option name="id_location" value="">Hà Nội</option>
                                    <option name="id_location" value="">Đà Nẵng</option>
                                    <option name="id_location" value="">Sài Gòn</option>
                                </select>
                            </div>
                            <div class="form_group">
                                <input type="submit" value="Thêm mới" class="btn btn-add">
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