<?php
require_once "./../../db/connection.php";
require_once "./../../db/tour_guide.php";
$status = $_POST['status'];
$data = getStatus($status);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhân viên</title>
    <link rel="stylesheet" href="/duan1/asset/fonts/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="/duan1/asset/css/css_admin/main.css">
    <style>
        .tm-status-circle {
            display: inline-block;
            margin-right: 5px;
            vertical-align: middle;
            width: 5px;
            height: 5px;
            border-radius: 50%;
            margin-top: -3px;
        }

        .moving {
            background-color: #9be64d;
            box-shadow: 0 0 8px #9be64d, inset 0 0 8px #9be64d;
        }

        .cancelled {
            background-color: #da534f;
            box-shadow: 0 0 8px #da534f, inset 0 0 8px #da534f;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="left">
                <?php require_once './../sidebar.php'; ?>
            </div>
            <!--left : sliderbar-->
            <div class="right">
                <?php require_once './../header.php'; ?>
                <!-- Nội dung ở đây  -->
                <div class="right-heading">
                    <h2>Danh sách nhân viên</h2>
                </div>
                <div class="grid-with-width" style="text-align: center;">
                    <form action="./list_tour_guide_cate.php" method="post">
                        <select style="width: 320px; padding: 4px;" name="status" id="">
                            <option value="">---Mời chọn trạng thái---</option>
                            <option value="0">Hoạt động</option>
                            <option value="1">Không Hoạt động</option>
                        </select>
                        <input type="submit" class="" style="padding: 5px;background-color: tomato; border-radius:  4px; margin-left: 4px; color: white; border: none; outline: none;" value="Tìm Kiếm">
                    </form>
                </div>
                <div class="right_body">
                    <table class="table">
                        <thead class="thead">
                            <tr>
                                <th>ID</th>
                                <th>Tên nhân viên</th>
                                <th>Số điện thoại</th>
                                <th>Trạng thái</th>
                                <th colspan="2">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            <?php foreach ($data as $row) { ?>
                                <tr>
                                    <td><?= $row['id_tour_guide'] ?></td>
                                    <td><?= $row['name_tour_guide'] ?></td>
                                    <td><?= $row['phone_tour_guide'] ?></td>
                                    <td>
                                        <div class="tm-status-circle <?php if ($row['status'] == 0) {
                                                                            $active = 'cancelled';
                                                                            $status = 'Inactive';
                                                                        } else if ($row['status'] == 1) {
                                                                            $active = 'moving';
                                                                            $status = 'Active';
                                                                        }
                                                                        echo $active;
                                                                        ?>">
                                        </div><?php echo $status; ?>
                                    </td>
                                    <td>
                                        <a href="./edit.php?id_tour_guide=<?= $row['id_tour_guide'] ?>" class="js-modal-click1"><i class="mr-8 fas fa-cogs"></i></a>
                                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa?');" href="./delete.php?id_tour_guide=<?= $row['id_tour_guide'] ?>"><i class="fas fa-trash-alt"></i></a>
                                    </td> <?php  } ?>
                                </tr>
                        </tbody>
                    </table>
                    <div class="form_group-list">
                        <a href="/duan1/admin/tour_guide/add_tour_guide.php" class="btn">Thêm mới</a>
                    </div>
                </div>
                <?php require_once './../footer.php'; ?>
            </div>
            <!--right : content-->
        </div>
    </div>
</body>

</html>