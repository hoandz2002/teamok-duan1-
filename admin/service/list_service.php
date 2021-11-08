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
                    <h2>Danh sách dịch vụ</h2>
                </div>
                <div class="right_body">
                    <table class="table" cellspacing="12">
                        <thead class="thead">
                            <tr>
                                <th>ID</th>
                                <th>Tên dịch vụ</th>
                                <th>Mô tả</th>
                                <th>Giá dịch vụ</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            <tr>
                                <td>ID</td>
                                <td>Tên dịch vụ</td>
                                <td>Mô tả</td>
                                <td>Giá dịch vụ</td>
                                <td>
                                    <a href=""><i class="mr-8 fas fa-cogs"></i></a>
                                    <a href=""><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>ID</td>
                                <td>Tên dịch vụ</td>
                                <td>Mô tả</td>
                                <td>Giá dịch vụ</td>
                                <td>
                                    <a href=""><i class="mr-8 fas fa-cogs"></i></a>
                                    <a href=""><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>ID</td>
                                <td>Tên dịch vụ</td>
                                <td>Mô tả</td>
                                <td>Giá dịch vụ</td>
                                <td>
                                    <a href=""><i class="mr-8 fas fa-cogs"></i></a>
                                    <a href=""><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>ID</td>
                                <td>Tên dịch vụ</td>
                                <td>Mô tả</td>
                                <td>Giá dịch vụ</td>
                                <td>
                                    <a href=""><i class="mr-8 fas fa-cogs"></i></a>
                                    <a href=""><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form_group-list">
                        <a href="/duan1/admin/service/add_service.php" class="btn">Thêm mới</a>
                    </div>
                </div>
                <?php require_once './../footer.php'; ?>
            </div>
            <!--right : content-->
        </div>
    </div>
</body>

</html>