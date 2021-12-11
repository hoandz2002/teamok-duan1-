<?php
session_start();
require_once './db/connection.php';
require_once './db/tour.php';
require_once './db/location.php';
$dataPrice = price();
if (isset($_POST['search'])) {
    $id = $_POST['id_location'];
    $dataLocationById = getIdLocation($id);
    $tours_cate = getToursByIdLocation($id);
}

if(isset($_GET['rangePrice'])) {
$idPrice = $_GET['id'];
function getPrice($id)
{
    $conn = connect();
    $query = "SELECT * FROM tours";
    $idPrice = $_GET['id'];

    $namePrice = findPrice($idPrice);
    $rangePrice = $namePrice['rangePrice'];
    $range = preg_split('[\s]', $rangePrice);
    $from = 0;
    $to = 0;
    if ($range[0] == 'Trên') {
        $from = $range[1];
    } else {
        $rang1 = preg_split('[\-]', $range[0]);
        $from = $rang1[0];
        $to = $rang1[1];
    }
    $from *= 1000000;
    $to *= 1000000;
    if ($to == 0) {
        $query .= " WHERE price_tours>=$from";
    } else {
        $query .= " WHERE  price_tours>=$from AND price_tours<=$to";
    }
    // var_dump($query);die;
    $result = $conn->query($query);
    return $result;
}

$tours_cate = getPrice($idPrice);
}



// if ($id == null) {
//     $_SESSION['error'] = "Không tìm thấy tour!";
//     header("location:/duan1/tours.php");
//     die;
// }
$location = getAllLocation();

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
                    <div class="grid-with-width" style="text-align: center; border-radius:  4px;">
                        <form action="./tours_cate.php" method="post">
                            <select style="width: 320px; padding: 4px;" name="id_location" id="">
                                <option value="">---Mời chọn địa điểm---</option>
                                <?php foreach ($location as $ds) { ?>
                                    <option value="<?= $ds['id_location'] ?>"><?= $ds['name_location'] ?></option>
                                <?php } ?>
                            </select>
                            <input name="search" type="submit" class="" style="cursor:pointer;padding: 5px;background-color: tomato;margin-left: 4px; color: white; border: none; outline: none;" value="Tìm Kiếm">
                        </form>
                        <ul style="padding: 4px 0px; margin: 14px 16px 0px; background-color: rgb(20, 185, 213); color: white; font-size: 14px;">
                            <li style="display: block; float:left; padding: 8px 24px;">Tìm kiếm theo giá</li>
                            <?php foreach ($dataPrice as $value) { ?>
                                <li style="display: inline-block; padding: 8px 24px;"><a href="./tours_cate.php?rangePrice=<?= $value['rangePrice'] ?>&id=<?= $value['id'] ?>" style="color: white; font-size: 14px; text-decoration: none;"><?= $value['rangePrice'] ?></a></li>
                            <?php } ?>
                        </ul>
                        <?php if (isset($_POST['search'])) { ?>
                            <h1 style="margin-top: 16px;"><?= $dataLocationById['name_location'] ?></h1>
                        <?php } ?>
                    </div>
                    <?php

                    foreach ($tours_cate as $row) { ?>
                        <div class="pd-16 grid__column-4">
                            <div class="tours-product">
                                <img style="height:160px" src="/duan1/asset/img/<?= $row['image'] ?>" alt="" class="img">
                                <div class="tours-content">
                                    <h6 style="font-size: 14px;overflow: hidden;line-height: 24px;
  display: -webkit-box;
  -webkit-box-orient: vertical;
  -webkit-line-clamp: 2;" class="tours-heading"><?= $row['name_tours']; ?></h6>
                                    <?php if ($row['sale_tours'] != 0) { ?>
                                        <span style="display:inline-block;font-size:16px;margin-bottom:15px;color: #9a9a9a;text-decoration:line-through;"><?= number_format($row['price_tours']); ?> Đ</span>
                                        <span style="display:inline-block;font-size:16px;margin-bottom:15px;color:#9a9a9a"><?= number_format($row['price_tours'] - (($row['price_tours'] * $row['sale_tours']) / 100)); ?>Đ</span><br>
                                    <?php } else { ?>
                                        <p style="font-size:16px;color: #9a9a9a;"><?= number_format($row['price_tours']); ?> Đ</p>
                                    <?php } ?>
                                    <a style="color: #9a9a9a;
    padding: 8px 16px;
    border: 1px solid #9a9a9a;" href="/duan1/tours_detail.php?id_tours=<?= $row['id_tours']; ?>" class="tours-btn">SELECT OPTION</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php require_once './footer.php'; ?>
</body>

</html>