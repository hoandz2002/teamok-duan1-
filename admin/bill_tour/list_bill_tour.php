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
                    <h2>Danh sách hóa đơn</h2>
                </div>
                <div class="right_body">
                    <table class="table" cellspacing="12">
                        <thead class="thead">
                            <tr>
                                <th>ID</th>
                                <th>Tên khách hàng đăt</th>
                                <th>Mã khách hàng</th>
                                <th>Số người</th>
                                <th>Tên tour</th>
                                <th>Loại dịch vụ</th>
                                <th>Địa điểm</th>
                                <th>Giá tiền</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            <tr>
                                <td>ID</td>
                                <td>Tên khách hàng đăt</td>
                                <td>Mã khách hàng</td>
                                <td>Số người</td>
                                <td>Tên tour</td>
                                <td>Loại dịch vụ</td>
                                <td>Địa điểm</td>
                                <td>Giá tiền</td>
                                <td>
                                    <a href=""><i class="mr-8 fas fa-cogs"></i></a>
                                    <a href=""><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>ID</td>
                                <td>Tên khách hàng đăt</td>
                                <td>Mã khách hàng</td>
                                <td>Số người</td>
                                <td>Tên tour</td>
                                <td>Loại dịch vụ</td>
                                <td>Địa điểm</td>
                                <td>Giá tiền</td>
                                <td>
                                    <a href=""><i class="mr-8 fas fa-cogs"></i></a>
                                    <a href=""><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>ID</td>
                                <td>Tên khách hàng đăt</td>
                                <td>Mã khách hàng</td>
                                <td>Số người</td>
                                <td>Tên tour</td>
                                <td>Loại dịch vụ</td>
                                <td>Địa điểm</td>
                                <td>Giá tiền</td>
                                <td>
                                    <a href=""><i class="mr-8 fas fa-cogs"></i></a>
                                    <a href=""><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>ID</td>
                                <td>Tên khách hàng đăt</td>
                                <td>Mã khách hàng</td>
                                <td>Số người</td>
                                <td>Tên tour</td>
                                <td>Loại dịch vụ</td>
                                <td>Địa điểm</td>
                                <td>Giá tiền</td>
                                <td>
                                    <a href=""><i class="mr-8 fas fa-cogs"></i></a>
                                    <a href=""><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>ID</td>
                                <td>Tên khách hàng đăt</td>
                                <td>Mã khách hàng</td>
                                <td>Số người</td>
                                <td>Tên tour</td>
                                <td>Loại dịch vụ</td>
                                <td>Địa điểm</td>
                                <td>Giá tiền</td>
                                <td>
                                    <a href=""><i class="mr-8 fas fa-cogs"></i></a>
                                    <a href=""><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                    </table>
                </div>
                <?php require_once './../footer.php'; ?>
            </div>
            <!--right : content-->
        </div>
    </div>
</body>

</html>