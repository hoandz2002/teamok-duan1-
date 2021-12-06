<?php
require_once './../../db/connection.php';
require_once './../../db/tour.php';
$data = getAllTours();

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
        .box {
            width: 600px;
            padding: 50px 80px;
            position: fixed;
            top: 25%;
            left: 25%;
            display: none;
            background-color: rgba(0, 0, 0, 0.8);
        }

        .left_item:hover .box {
            display: block;
        }

        .ok {
            max-height: 3rem;
            line-height: 1.8rem;
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            min-height: 3rem;
        }
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
                    <h2>List manager post</h2>
                </div>
                <div class="right_body">
                    <table class="table">
                        <thead class="thead">
                            <tr>
                                <th>ID</th>
                                <th>Ảnh đại diện</th>
                                <th>Tên tour</th>
                                <th>Mô tả ngắn</th>
                                <th>Giá tour</th>
                                <th>Giảm giá</th>
                                <th>Địa điểm</th>
                                <th>Bộ sưu tập</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            <?php
                            require_once './../connect_list.php';
                            $results_per_page = 5;
                            $query = "select *from tours";
                            $result = mysqli_query($conn, $query);
                            $number_of_result = mysqli_num_rows($result);
                            $number_of_page = ceil($number_of_result / $results_per_page);
                            if (!isset($_GET['page'])) {
                                $page = 1;
                            } else {
                                $page = $_GET['page'];
                            }
                            $page_first_result = ($page - 1) * $results_per_page;
                            $query = "SELECT *FROM tours inner join location on tours.id_location = location.id_location LIMIT " . $page_first_result . ',' . $results_per_page;
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) { ?>
                                <tr>
                                    <td><?php echo $row['id_tours'] ?></td>
                                    <td><img width="100px" src="./../../asset/img/<?php echo $row['image'] ?>"></td>
                                    <td><?php echo $row['name_tours'] ?></td>
                                    <td><?php echo $row['short_description_tours'] ?></td>
                                    <td><?php echo $row['price_tours'] ?></td>
                                    <td>
                                        <?php if ($row['sale_tours'] == null) {
                                            echo 'null';
                                        } else {
                                            echo $row['sale_tours'];
                                        } ?>
                                    </td>
                                    <td><?php echo $row['name_location'] ?></td>
                                    <td>
                                        <li class="left_item" style="list-style: none; "><a class="left_link" href="#" style="color: black;">Xem</a>
                                            <div class="box">
                                                <?php
                                                // for ($k = 0; $k < count($data); $k++) {
                                                $data_img = getAllImage($row['id_tours']);
                                                // var_dump($data[$k]); die;
                                                // }
                                                ?>
                                                <?php for ($j = 0; $j < count($data_img); $j++) { ?>
                                                    <img width="200px" src="./../../asset/img/<?php echo $data_img[$j]['images'] ?>" alt="">
                                                <?php } ?>
                                            </div>
                                        </li>
                                    </td>
                                    <td>
                                        <a href="./edit.php?id_tours=<?= $row['id_tours'] ?>" class="js-modal-click1"><i class="mr-8 fas fa-cogs"></i></a>
                                        <a href="./delete.php?id_tours=<?= $row['id_tours'] ?>" onclick="confirm('Bạn muốn xóa thông tin này!');"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>

                            <?php } ?>
                            <div style="width: 100%; padding: 2px 40px 8px;">
                                <?php for ($page = 1; $page <= $number_of_page; $page++) {
                                    echo '<a style="text-decoration: none; width: 30px; text-align: center; line-height: 30px; display: inline-block; margin: 0px 8px; background-color: blue; color: white;" href = "list_tours.php?page=' . $page . '">' . $page . ' </a>';
                                }
                                ?>
                            </div>
                            <?php for ($i = 0; $i < count($data); $i++) { ?>

                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="form_group-list">
                        <a href="/duan1/admin/tours/add_tours.php" class="btn">Thêm mới</a>
                    </div>
                </div>
                <?php require_once './../footer.php'; ?>
            </div>
            <!--right : content-->
        </div>
    </div>
</body>

</html>