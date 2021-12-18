<?php
session_start();
require_once './db/connection.php';
require_once './db/location.php';
require_once './db/tour.php';
$id = $_GET['id_location'];
$data = getIdLocation($id);
$data_tours = getToursByIdLocation($id);

if (empty($_SESSION['user']) == false) {
    $name = '<li class="header__navbar-item-child"><a href="/duan1/acc.php" class="header__navbar-link-child">Thông tin</a></li>
    <li class="header__navbar-item-child"><a href="/duan1/cart.php" class="header__navbar-link-child">Giỏ hàng</a></li>    
    <li class="header__navbar-item-child"><a href="/duan1/logout.php" class="header__navbar-link-child">Đăng xuất</a></li>';
} else {
    $name = '<li class="header__navbar-item-child"><a href="/duan1/login_form.php" class="header__navbar-link-child">Đăng nhập</a></li>
    <li class="header__navbar-item-child"><a href="/duan1/cart.php" class="header__navbar-link-child">Giỏ hàng</a></li>    ';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location Detail</title>
    <link rel="stylesheet" href="/duan1/asset/fonts/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="/duan1/asset/css/base.css">
    <link rel="stylesheet" href="/duan1/asset/css/main.css">
    <link rel="stylesheet" href="/duan1/asset/css/index.css">
    <link rel="stylesheet" href="/duan1/asset/css/location_detail.css">
    <link rel="stylesheet" href="/duan1/asset/css/responsive.css">
    <style>
        .box-img {
            position: relative;
        }

        .box-sale {
            position: absolute;
            top: 4px;
            right: -8px;
            padding: 4px 8px;
            background-color: #ff623d;
            font-size: 14px;
            color: white;
        }

        .box-sale::before {
            content: "";
            position: absolute;
            top: 100%;
            right: 0;
            border-top: 8px solid #ff623d;
            border-right: 8px solid transparent;
            filter: brightness(60%);
        }
    </style>
</head>

<body>
    <div class="main">
        <?php require_once './header.php'; ?>
        <div class="body__banner" style="background-image: url('/duan1/asset/img/<?= $data['img_location']; ?>'); padding: 10%; margin-top: 0px;">
            <div class="banner-text" style="text-shadow: 0px 1px 2px green;">Location Detail</div>
        </div>
        <div class="body">
            <div class="grid">
                <div style="display:flex;grid-template-columns:2fr 1fr;grid-gap:100px">
                    <div class="pd-16 grid__column-2-3" style="font-size: 14px;color:#9a9a9a;line-height:35px">
                        <h3 style="color:#555" class="location"><?= $data['name_location']; ?></h3>
                        <p class="location_content"><?= $data['description_location']; ?></p>
                    </div>
                    <div class="" style="border: 0.8px solid #d8d8d8;color:#fff;padding:30px;height: 230px;">
                        <div class="contact-location grid__row">
                            <img class="mr-8 icon-contact" src="./asset/img/lc-icon1.png" alt="">
                            <div class="ml-8 body-contact">
                                <h4 class="contact-heading">Địa điểm</h4>
                                <p class="contact-ct">1 điạ điểm ở <?= $data['name_location']; ?></p>
                            </div>
                        </div>
                        <div class="mt-8 contact-location grid__row">
                        <img class="mr-8 icon-contact" src="./asset/img/icon-map-location-white.png" alt="">
                            <div class="ml-8 body-contact">
                                <h4 class="contact-heading">Du lịch Việt Nam</h4>
                                <p class="contact-ct">Tuyệt vời luôn nhé</p>
                            </div>
                        </div>
                        <div class="mt-8 contact-location grid__row">
                        <img class="mr-8 icon-contact" src="./asset/img/icon-message-white.png" alt="">
                            <div class="ml-8 body-contact">
                                <h4 class="contact-heading">Liên hệ</h4>
                                <p class="contact-ct">hthtravel@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="body__bottom">
                    <div class="grid">
                        <div class="grid__row">
                            <div class="body__content">
                                <p style="color:#555">CÁC <u>TOURS Ở ĐÂY</u></p>
                            </div>
                            <?php for ($i = 0; $i < count($data_tours); $i++) { ?>
                                <div class="grid__column-3 bordered">
                                    <div class="box-img">
                                        <img src="./asset/img/<?= $data_tours[$i]['image'] ?>" alt="" class="body__bottom-img">
                                        <?php
                                        if ($data_tours[$i]['sale_tours'] != 0) { ?>
                                            <div class="box-sale">
                                                <p>Sale</p>
                                            </div>
                                        <?php }
                                        ?>
                                    </div>
                                    <div class="body__bottom-content">
                                        <div class="body__bottom-title">
                                            <p style="font-size: 20px;overflow: hidden;line-height: 24px;
  display: -webkit-box;
  -webkit-box-orient: vertical;
  -webkit-line-clamp: 2;height:50px" ><?= $data_tours[$i]['name_tours'] ?></p>
                                            <span><i class="fas fa-map-marked"></i> <?= $data['name_location'] ?></span>
                                        </div>
                                        <div class="body__bottom-price">
                                            <div class="body__bottom-price-left">
                                                <p>CULTURAL</p>
                                                <p>
                                                    RELAX
                                                    <span class="number">+ 1</span>
                                                </p>
                                            </div>
                                            <div class="body__bottom-price-right">
                                                <?php if ($data_tours[$i]['sale_tours'] != 0) { ?>
                                                    <span style="display:inline-block;font-size:24px;margin-top: 12px; margin-bottom:15px;color: #9a9a9a;text-decoration:line-through;"><?= number_format($data_tours[$i]['price_tours'],0,',','.'); ?> Đ</span> <br>
                                                    <span style="display:inline-block;font-size:24px;margin-bottom:15px;color:red"><?= number_format($data_tours[$i]['price_tours'] - (($data_tours[$i]['price_tours'] * $data_tours[$i]['sale_tours']) / 100),0,',','.'); ?>Đ</span><br>
                                                <?php } else { ?>
                                                    <p style="font-size:24px;color: red;"><?= number_format($data_tours[$i]['price_tours'],0,',','.'); ?> Đ</p>
                                                <?php } ?>
                                                <!-- <p style="color: red;"><?= number_format($data_tours[$i]['price_tours'],0,',','.')?>Đ</p> -->
                                            </div>
                                        </div>
                                        <div class="body__bottom-detail">
                                            <p>
                                                <?= $data_tours[$i]['short_description_tours'] ?>
                                            </p>
                                            <a href="./tours_detail.php?id_tours=<?= $data_tours[$i]['id_tours'] ?>"> <button>DETAILS</button></a>
                                        </div>
                                        <!-- <div class="possition">
                                        <img src="./asset/img/nav__pc-icon1.jpg" alt="" style="width: 30px;">
                                    </div> -->
                                    </div>
                                </div>
                            <?php  } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once "./call.php" ?>
        </div>
        <?php require_once './footer.php'; ?>
</body>

</html>