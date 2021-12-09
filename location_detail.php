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
        
    </style>
</head>

<body>
    <div class="main">
        <?php require_once './header.php'; ?>
        <div class="body__banner" style="background-image: url('/duan1/asset/img/<?=$data['img_location'];?>'); padding: 10%; margin-top: 0px;">
            <div class="banner-text" style="text-shadow: 0px 1px 2px green;">Location Detail</div>
        </div>
        <div class="body">
            <div class="grid">
                <div class="grid__row">
                    <div class="pd-16 grid__column-2-3">
                        <h3 class="location"><?=$data['name_location'];?></h3>
                        <p class="location_content"><?=$data['description_location'];?></p>
                    </div>
                    <div class="pd-16 grid__column-3" style="border: 0.8px solid #d8d8d8;">
                        <div class="contact-location grid__row">
                            <i class='mr-8 icon-contact fas fa-globe-asia'></i>
                            <div class="ml-8 body-contact">
                                <h4 class="contact-heading">Địa điểm</h4>
                                <p class="contact-ct">1 điạ điểm ở <?=$data['name_location'];?></p>
                            </div>
                        </div>
                        <div class="mt-8 contact-location grid__row">
                            <i class='mr-8 icon-contact fas fa-map-marker-alt'></i>
                            <div class="ml-8 body-contact">
                                <h4 class="contact-heading">Du lịch Việt Nam</h4>
                                <p class="contact-ct">Tuyệt vời luôn nhé</p>
                            </div>
                        </div>
                        <div class="mt-8 contact-location grid__row">
                            <i class='mr-8 icon-contact far fa-paper-plane'></i>
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
                                <p>CÁC <u>TOURS Ở ĐÂY</u></p>
                            </div>
                            <?php for ($i=0; $i < count($data_tours) ; $i++) { ?>
                                <div class="grid__column-3 bordered">
                                <img src="./asset/img/<?=$data_tours[$i]['image']?>" alt="" class="body__bottom-img">
                                <div class="body__bottom-content">
                                    <div class="body__bottom-title">
                                        <p style="line-height:2.5rem"><?=$data_tours[$i]['name_tours']?></p>
                                        <span><i class="fas fa-map-marked"></i> Đồng tháp</span>
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
                                            <p><?=$data_tours[$i]['price_tours']?>Đ</p>
                                        </div>
                                    </div>
                                    <div class="body__bottom-detail">
                                        <p>
                                        <?=$data_tours[$i]['short_description_tours']?>
                                        </p>
                                       <a href="./tours_detail.php?id_tours=<?=$data_tours[$i]['id_tours']?>"> <button>DETAILS</button></a>
                                    </div>
                                    <div class="possition">
                                        <img src="./asset/img/nav__pc-icon1.jpg" alt="" style="width: 30px;">
                                    </div>
                                </div>
                            </div>
                          <?php  }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once './footer.php'; ?>
</body>

</html>