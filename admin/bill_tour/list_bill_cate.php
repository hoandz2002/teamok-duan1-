<?php
require_once "./../../db/connection.php";
require_once "./../../db/bill_tour.php";
$data = getAllBill();
$id = $_POST['bill_status'];


$bill_status = getBillStatus($id);
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
                    <h2>Danh sách hóa đơn</h2>
                </div>
                <div class="grid-with-width" style="text-align: center;">
                    <form action="./list_bill_cate.php" method="post">
                    <select style="width: 320px; padding: 4px;" name="bill_status" id="">
                            <option value="">---Mời chọn trạng thái---</option>
                            <option value="0">Đang chờ xác nhận</option>
                            <option value="1">Đã xác nhận</option>
                            <option value="2">Đã thanh toán</option>
                            <option value="3">Đã khởi hành</option>
                            <option value="4">Đã hoàn tất</option>
                        </select>
                        <input type="submit" class="" style="padding: 5px;background-color: tomato; border-radius:  4px; margin-left: 4px; color: white; border: none; outline: none;" value="Tìm Kiếm">
                    </form>
                </div>
                <div class="right_body">
                    <table class="table">
                        <thead class="thead">
                            <tr>
                                <th>ID</th>
                                <th>Tên khách hàng</th>
                                <th>Số người</th>
                                <th>Sale</th>
                                <th>Giá</th>
                                <th>Tên tour</th>
                                <th>Thời gian đặt</th>
                                <th>Loại dịch vụ</th>
                                <th>Giá dịch vụ</th>
                                <th>Total</th>
                                <th>Thời gian </th>
                                <th>Trạng thái</th>
                                <th colspan="2">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            <?php
                            foreach($bill_status as $row) { ?>
                                <?php $total = intval($row['price_bill_tours']) + intval($row['price_service']) - intval($row['price_tours']) * intval($row['sale_tours']) / 100 ?>
                                <tr>
                                    <td><?= $row['id_bill_tours'] ?></td>
                                    <td><a style="text-decoration: none;color:#000;" href="./thongtinkhachhang.php?id_customer=<?= $row['id_customer'] ?>"><?= $row['name_customer'] ?></a></td>
                                    <td><?= $row['quantity_pp'] ?></td>
                                    <td><?= $row['sale_tours'] ?></td>
                                    <td><?= number_format($row['price_bill_tours'],0,',','.') ?> Đ </td>
                                    <td><?= $row['name_tours'] ?></td>
                                    <td><?= $row['date_book'] ?></td>
                                    <td><?= $row['name_service'] ?> </td>
                                    <td><?= number_format($row['price_service']) ?> </td>
                                    <td><?= number_format($total) ?>Đ</td>
                                    <td><?= $row['date_start'] ?></td>
                                    <td><?php if ($row['bill_status'] == 0) {
                                            echo 'Đang chờ xác nhận'; ?>
                                            <a style="color:#000" href="./update_bill.php?id_bill_tours=<?= $row['id_bill_tours'] ?>">Xác nhận</a>
                                        <?php  } else if ($row['bill_status'] == 1) {
                                            echo 'Đã xác nhận';
                                        ?>
                                            <a style="color:#000" href="./update_bill.php?id_bill_tours=<?= $row['id_bill_tours'] ?>">Xác nhận</a>
                                        <?php } elseif ($row['bill_status'] == 3) {
                                            echo "Đã khởi hành";
                                        ?>
                                            <a style="color:#000" href="./update_bill.php?id_bill_tours=<?= $row['id_bill_tours'] ?>">Xác nhận</a>
                                        <?php } elseif ($row['bill_status'] == 4) {
                                            echo 'Đã hoàn tất';
                                        ?>
                                            <a style="color:#000" href="./update_bill.php?id_bill_tours=<?= $row['id_bill_tours'] ?>">Xác nhận</a>

                                        <?php  } elseif ($row['bill_status'] == 2) {
                                            echo 'Đã thanh toán';
                                        ?>
                                            <a style="color:#000" href="./update_bill.php?id_bill_tours=<?= $row['id_bill_tours'] ?>">Xác nhận</a>
                                        <?php }
                                        ?>
                                    </td>
                                    <td>
                                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa?');" href="./../../db/bill_tour/delete_bill_admin.php?id_bill_tours=<?= $row['id_bill_tours'] ?>"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php require_once './../footer.php'; ?>
            </div>
            <!--right : content-->
        </div>
    </div>
</body>

</html>