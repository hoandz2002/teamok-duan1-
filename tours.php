<?php
session_start();
require_once './db/connection.php';
require_once './db/tour.php';
require_once './db/location.php';
$data = getAllTours();
$location = getAllLocation();
$dataPrice = price();
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
        #toast {
            margin-left: 1000px;
            position: fixed;
            top: 300px;
        }

        .tst_test {
            display: flex;
            align-items: center;
            background-color: #fff;
            border-left: 4px solid;
            box-shadow: 0 5px 8px rgba(0, 0, 0, 0.08);
            padding: 20px;
            height: 50px;
            width: 350px;
            margin-bottom: 20px;
            animation: slideInLeft ease 0.3s, fadeOut linear 1s 3s forwards;
            transition: all linear 1s;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(950px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeOut {
            to {
                opacity: 0;
            }
        }

        .toast_icon,
        .icon_close {
            padding: 0 16px;
        }

        .toast__icon {
            font-size: 24px;
        }

        .toast__close {
            font-size: 20px;
            color: rgba(0, 0, 0, 0.3);
            cursor: pointer;
        }

        .toast__title {
            font-size: 16px;
            font-weight: 600;
            color: #333;
        }

        .toast__msg {
            font-size: 14px;
            color: #888;
            margin-bottom: 10px;
            line-height: 0;
        }

        .tst--error {
            border-color: #ff623d;
        }

        .toast__body {
            flex-grow: 1;
            margin-left: 30px;
        }

        .tst--error .toast__icon {
            color: #ff623d;
        }
        
    </style>
</head>

<body>
    <div class="main">
        <?php require_once './header.php'; ?>
        <div class="body__banner" style="background-image: url(/duan1/asset/img/t-banner.jpg); padding: 10%;">
            <div class="banner-text" style="text-shadow: 0px 1px 2px green;">Tours</div>
        </div>
        <div class="body">
            <?php if (isset($_SESSION['error'])) { ?>
                <div id="toast">
                    <div class="tst_test tst--error">
                        <div class="toast__icon">
                            <i class="fas fa-exclamation"></i>
                        </div>
                        <div class="toast__body">
                            <h3 class="toast__title" style="font-weight: 600;color: #333;margin-bottom:10px">
                                Error
                            </h3>
                            <p class="toast__msg">
                                <?= $_SESSION['error']; ?>
                            </p>
                        </div>
                        <div class="toast__close">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                </div>
            <?php unset($_SESSION['error']);
            } ?>
            <div class="grid">
                <div class="grid__row">
                    <div class="grid-with-width" style="text-align: center;">
                        <form action="./tours_cate.php" method="post">
                            <select style="width: 320px; padding: 4px;" name="id_location" id="">
                                <option value="">---Mời chọn địa điểm---</option>
                                <?php foreach ($location as $ds) { ?>
                                    <option value="<?= $ds['id_location'] ?>"><?= $ds['name_location'] ?></option>
                                <?php } ?>
                            </select>
                            <input name="search" type="submit" class="" style="cursor:pointer;padding:5.5px;background-color: tomato; margin-left: 4px; color: white; border: none; outline: none;" value="Tìm Kiếm">
                        </form>
                        <ul style="padding: 4px 0px; margin: 14px 16px 0px; background-color: rgb(20, 185, 213); color: white; font-size: 14px;">
                            <li style="display: block; float:left; padding: 8px 24px;">Tìm kiếm theo giá</li>
                            <?php foreach ($dataPrice as $value) { ?>
                                <li style="display: inline-block; padding: 8px 24px;"><a href="./tours_cate.php?rangePrice=<?= $value['rangePrice'] ?>&id=<?= $value['id'] ?>" style="color: white; font-size: 14px; text-decoration: none;"><?= $value['rangePrice'] ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
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
                                <img style="height:160px" src="/duan1/asset/img/<?= $row['image'] ?>" alt="" class="img">
                                <div class="tours-content">
                                    <h6 style="font-size: 14px;overflow: hidden;line-height: 24px;
  display: -webkit-box;
  -webkit-box-orient: vertical;
  -webkit-line-clamp: 2;height:46px" class="tours-heading"><?= $row['name_tours']; ?></h6>
                                    <?php if ($row['sale_tours'] != 0) { ?>
                                        <span style="display:inline-block;font-size:16px;margin-bottom:15px;color: #9a9a9a;text-decoration:line-through;"><?= number_format($row['price_tours']); ?> Đ</span>
                                        <span style="display:inline-block;font-size:16px;margin-bottom:15px;color:red;font-weight: bold;"><?= number_format($row['price_tours'] - (($row['price_tours'] * $row['sale_tours']) / 100)); ?>Đ</span><br>
                                    <?php } else { ?>
                                        <p style="font-size:16px;color: red;font-weight: bold;"><?= number_format($row['price_tours']); ?> Đ</p>
                                    <?php } ?>
                                    <a style="color: #9a9a9a;
    padding: 8px 16px;
    border: 1px solid #9a9a9a;" href="/duan1/tours_detail.php?id_tours=<?= $row['id_tours']; ?>" class="tours-btn">SELECT OPTION</a>
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
    <script src="./asset/js/toast.js"></script>
</body>

</html>