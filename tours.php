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
                    <?php foreach ($data as $value) { ?>
                        <div class="pd-16 grid__column-4">
                            <div class="tours-product">
                                <img src="/duan1/asset/img/<?=$value['image']?>" alt="" class="img">
                                <div class="tours-content">
                                    <h6 style="font-size: 14px;" class="tours-heading"><?=$value['name_tours'];?></h6>
                                    <p><?=$value['price_tours'];?> Đ</p>
                                    <a href="/duan1/tours_detail.php?id_tours=<?=$value['id_tours'];?>" class="tours-btn">SELECT OPTION</a>
                                </div>
                            </div>
                        </div>
                    <?php  } ?>
                </div>
            </div>
        </div>
    </div>
    <?php require_once './footer.php'; ?>
</body>

</html>