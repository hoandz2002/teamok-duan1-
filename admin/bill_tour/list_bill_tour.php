<?php
require_once "./../../db/connection.php";
require_once "./../../db/bill_tour.php";
$data = getall_bill();
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
                <div class="right_body">
                    <table class="table">
                        <thead class="thead">
                            <tr>
                                <th>ID</th>
                                <th>tên khách hàng</th>
                                <th>Mã khách hàng</th>
                                <th>số người</th>
                                <th>Giá</th>
                                <th>Tên tour</th>
                                <th>thời gian đặt tour</th>
                                <th>Loại dịch vụ</th>
                                <th>thời gian khởi hành</th>
                                <th colspan="2">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            <?php
                            $conn = mysqli_connect('localhost', 'root', '');
                            if (!$conn) {
                                die("Connection failed" . mysqli_connect_error());
                            } else {
                                mysqli_select_db($conn, 'duan1');
                            }
                            $results_per_page = 5;
                            $query = "select *from bill_tours";
                            $result = mysqli_query($conn, $query);
                            $number_of_result = mysqli_num_rows($result);
                            $number_of_page = ceil($number_of_result / $results_per_page);
                            if (!isset($_GET['page'])) {
                                $page = 1;
                            } else {
                                $page = $_GET['page'];
                            }
                            $page_first_result = ($page - 1) * $results_per_page;
                            $query = "SELECT * FROM bill_tours inner join customer on bill_tours.id_customer = customer.id_customer inner join tours on bill_tours.id_tours = tours.id_tours  inner join service on bill_tours.id_service = service.id_service LIMIT " . $page_first_result . ',' . $results_per_page;
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) { ?>
                                <tr>
                                    <td><?= $row['id_bill_tours'] ?></td>
                                    <td><?= $row['name_customer'] ?></td>
                                    <td><?= $row['id_customer'] ?></td>
                                    <td><?= $row['quantity_pp'] ?></td>
                                    <td><?= $row['price_bill_tours'] ?> </td>
                                    <td><?= $row['name_tours'] ?></td>
                                    <td><?= $row['date_book'] ?></td>
                                    <td><?= $row['name_service'] ?> </td>
                                    <td><?= $row['date_start'] ?></td>
                                    <td>
                                        <a href="./edit.php?id_bill_tour=<?= $row['id_bill_tours'] ?>"><i class="mr-8 fas fa-cogs"></i></a>
                                        <a href="./delete.php?id_bill_tour=<?= $row['id_bill_tours'] ?>"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>

                            <?php } ?>
                            <div style="width: 100%; padding: 0px 40px;">
                                <?php for ($page = 1; $page <= $number_of_page; $page++) {
                                    echo '<a style="text-decoration: none; width: 30px; text-align: center; line-height: 30px; display: inline-block; margin: 0px 8px; background-color: blue; color: white;" href = "list_bill_tour.php?page=' . $page . '">' . $page . ' </a>';
                                }
                                ?>
                            </div>
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