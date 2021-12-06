<?php
session_start();
require_once './db/connection.php';
require_once './db/tour.php';
$data = getAllTours();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tours</title>
    <link rel="stylesheet" href="/duan1/asset/fonts/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="/duan1/asset/css/base.css">
    <link rel="stylesheet" href="/duan1/asset/css/main.css">
    <link rel="stylesheet" href="/duan1/asset/css/tours.css">
    <link rel="stylesheet" href="/duan1/asset/css/responsive.css">
    <style>

    </style>
</head>

<body>
    <div class="main">
        <?php require_once './header.php'; ?>
        <div class="body__banner" style="background-image: url(/duan1/asset/img/t-banner.jpg); padding: 10%;">
            <div class="banner-text" style="text-shadow: 0px 1px 2px green;">Shop</div>
        </div>
        <div class="body">
            <div class="grid">
                <div class="grid__row">
                    <?php
                    require_once './admin/connect_list.php';
                    $results_per_page = 8;
                    $query = "select *from tours inner join location on tours.id_location = location.id_location";
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
                        <div class="pd-16 grid__column-4">
                            <div class="tours-product">
                                <img src="/duan1/asset/img/<?= $row['image'] ?>" alt="" class="img">
                                <div class="tours-content">
                                    <h6 style="font-size: 14px;" class="tours-heading"><?= $row['name_tours']; ?></h6>
                                    <p><?= $row['price_tours']; ?> Đ</p>
                                    <a href="/duan1/tours_detail.php?id_tours=<?= $row['id_tours']; ?>" class="tours-btn">SELECT OPTION</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div style="width: 100%; padding: 16px 40px 8px;text-align:center;">
                        <?php for ($page = 1; $page <= $number_of_page; $page++) {
                            echo '<a style="text-decoration: none; width: 30px; text-align: center; line-height: 30px; display: inline-block; margin: 0px 8px; background-color: #007bff; color: white;" href = "tours.php?page=' . $page . '">' . $page . ' </a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once './footer.php'; ?>
</body>

</html>