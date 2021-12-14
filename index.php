<?php
require_once './db/connection.php';
require_once './db/cate_post.php';
require_once './db/tour.php';
require_once './db/location.php';

$data_cate = getAll_cate();
$data = getAllTours();
$data_location = getAllLocation();

// echo $css;die;

session_start();
if (empty($_SESSION['user']) == false) {
    $ok = $_SESSION['user']['id_customer'];
    $name = '<li class="header__navbar-item-child"><a href="/duan1/acc.php" class="header__navbar-link-child">Thông tin</a></li>
    <li class="header__navbar-item-child"><a href="/duan1/cart.php?id_customer=' . $ok . '" class="header__navbar-link-child">Tours</a></li>
    <li class="header__navbar-item-child"><a href="/duan1/logout.php" class="header__navbar-link-child">Đăng xuất</a></li>';
} else {
    $name = '<li class="header__navbar-item-child"><a href="/duan1/login_form.php" class="header__navbar-link-child">Đăng nhập</a></li>
    <li class="header__navbar-item-child"><a href="/duan1/regist_form.php" class="header__navbar-link-child">Đăng ký</a></li>    ';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="./asset/fonts/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="./asset/css/base.css">
    <link rel="stylesheet" href="./asset/css/main.css">
    <link rel="stylesheet" href="./asset/css/index.css">
    <link rel="stylesheet" href="./asset/css/responsive.css">
    <script src="demo.js"></script>

</head>
<style>
    .body__bottom-detail {
        padding: 20px 0px 0px;
    }

    .hotline-phone-ring-wrap {
        position: fixed;
        bottom: 0;
        right: 150px;
        z-index: 999999;
    }

    .hotline-phone-ring {
        position: relative;
        visibility: visible;
        background-color: transparent;
        width: 110px;
        height: 110px;
        cursor: pointer;
        z-index: 11;
        -webkit-backface-visibility: hidden;
        -webkit-transform: translateZ(0);
        transition: visibility .5s;
        left: 0;
        bottom: 0;
        display: block;
    }

    .hotline-phone-ring-circle {
        width: 85px;
        height: 85px;
        top: 10px;
        left: 10px;
        position: absolute;
        background-color: transparent;
        border-radius: 100%;
        border: 2px solid #e60808;
        -webkit-animation: phonering-alo-circle-anim 1.2s infinite ease-in-out;
        animation: phonering-alo-circle-anim 1.2s infinite ease-in-out;
        transition: all .5s;
        -webkit-transform-origin: 50% 50%;
        -ms-transform-origin: 50% 50%;
        transform-origin: 50% 50%;
        opacity: 0.5;
    }

    .hotline-phone-ring-circle-fill {
        width: 55px;
        height: 55px;
        top: 25px;
        left: 25px;
        position: absolute;
        background-color: rgba(230, 8, 8, 0.7);
        border-radius: 100%;
        border: 2px solid transparent;
        -webkit-animation: phonering-alo-circle-fill-anim 2.3s infinite ease-in-out;
        animation: phonering-alo-circle-fill-anim 2.3s infinite ease-in-out;
        transition: all .5s;
        -webkit-transform-origin: 50% 50%;
        -ms-transform-origin: 50% 50%;
        transform-origin: 50% 50%;
    }

    .hotline-phone-ring-img-circle {
        background-color: #e60808;
        width: 33px;
        height: 33px;
        top: 37px;
        left: 37px;
        position: absolute;
        background-size: 20px;
        border-radius: 100%;
        border: 2px solid transparent;
        -webkit-animation: phonering-alo-circle-img-anim 1s infinite ease-in-out;
        animation: phonering-alo-circle-img-anim 1s infinite ease-in-out;
        -webkit-transform-origin: 50% 50%;
        -ms-transform-origin: 50% 50%;
        transform-origin: 50% 50%;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .hotline-phone-ring-img-circle .pps-btn-img {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
    }

    .hotline-phone-ring-img-circle .pps-btn-img img {
        width: 20px;
        height: 20px;
    }

    .hotline-bar {
        position: absolute;
        background: rgba(230, 8, 8, 0.75);
        height: 40px;
        width: 180px;
        line-height: 40px;
        border-radius: 3px;
        padding: 0 10px;
        background-size: 100%;
        cursor: pointer;
        transition: all 0.8s;
        -webkit-transition: all 0.8s;
        z-index: 9;
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.1);
        border-radius: 50px !important;
        /* width: 175px !important; */
        left: 33px;
        bottom: 37px;
    }

    .hotline-bar>a {
        color: #fff;
        text-decoration: none;
        font-size: 15px;
        font-weight: bold;
        text-indent: 50px;
        display: block;
        letter-spacing: 1px;
        line-height: 40px;
        font-family: Arial;
    }

    .hotline-bar>a:hover,
    .hotline-bar>a:active {
        color: #fff;
    }

    @-webkit-keyframes phonering-alo-circle-anim {
        0% {
            -webkit-transform: rotate(0) scale(0.5) skew(1deg);
            -webkit-opacity: 0.1;
        }

        30% {
            -webkit-transform: rotate(0) scale(0.7) skew(1deg);
            -webkit-opacity: 0.5;
        }

        100% {
            -webkit-transform: rotate(0) scale(1) skew(1deg);
            -webkit-opacity: 0.1;
        }
    }

    @-webkit-keyframes phonering-alo-circle-fill-anim {
        0% {
            -webkit-transform: rotate(0) scale(0.7) skew(1deg);
            opacity: 0.6;
        }

        50% {
            -webkit-transform: rotate(0) scale(1) skew(1deg);
            opacity: 0.6;
        }

        100% {
            -webkit-transform: rotate(0) scale(0.7) skew(1deg);
            opacity: 0.6;
        }
    }

    @-webkit-keyframes phonering-alo-circle-img-anim {
        0% {
            -webkit-transform: rotate(0) scale(1) skew(1deg);
        }

        10% {
            -webkit-transform: rotate(-25deg) scale(1) skew(1deg);
        }

        20% {
            -webkit-transform: rotate(25deg) scale(1) skew(1deg);
        }

        30% {
            -webkit-transform: rotate(-25deg) scale(1) skew(1deg);
        }

        40% {
            -webkit-transform: rotate(25deg) scale(1) skew(1deg);
        }

        50% {
            -webkit-transform: rotate(0) scale(1) skew(1deg);
        }

        100% {
            -webkit-transform: rotate(0) scale(1) skew(1deg);
        }
    }

    @media (max-width: 768px) {
        .hotline-bar {
            display: none;
        }
    }
</style>

<body>
    <div class="main">
        <header class="header" style="background-image: url(./asset/img/bannner-home.jpg); height: 720px;">
            <div class="header__navbar">
                <div class="header__navbar-logo">
                    <a href="/duan1/index.php">
                        <img src="./asset/img/logohthtravel.png" alt="" class="header__navbar-logo-img">
                    </a>
                </div>

                <div class="header__navbar-list">
                    <li class="header__navbar-item"><a href="/duan1/index.php" class="header__navbar-item__link">Trang Chủ</a></li>
                    <li class="header__navbar-item">
                        <a href="/duan1/tours.php" class="header__navbar-item__link">Tours</a>
                    </li>
                    <li class="header__navbar-item">
                        <a href="/duan1/about.php" class="header__navbar-item__link">Giới Thiệu</a>
                    </li>
                    <li class="header__navbar-item">
                        <a href="/duan1/post.php" class="header__navbar-item__link">Bài Viết</a>
                        <ul class="header__navbar-list-child">
                            <?php foreach ($data_cate as $ds) { ?>
                                <li class="header__navbar-item-child"><a href="/duan1/post_cate.php?id_cate_post=<?php echo $ds['id_cate_post']; ?>" class="header__navbar-link-child"><?php echo $ds['name_cate_post']; ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>

                    <li class="header__navbar-item">
                        <a href="/duan1/contact.php" class="header__navbar-item__link">Liên Hệ</a>
                    </li>
                </div>

                <div class="header__navbar-list">
                    <li class="header__navbar-item">
                        <a href="#" class="header__navbar-item__link"><i class='fas fa-user'></i></a>
                        <ul class="header__navbar-list-child" style="right: 0; top: 120%;">
                            <!-- <li class="header__navbar-item-child"><a href="/duan1/login_form.php" class="header__navbar-link-child">Đăng nhập</a></li> -->
                            <?php echo $name; ?>
                        </ul>
                    </li>
                    <label for="menu" class="header__navbar-icon">
                        <i class="fas fa-bars"></i>
                    </label>
                </div>

                <!-- input -->
                <input type="checkbox" class="menu_tablet" id="menu" hidden>
                <!-- nav__pc -->
                <div class="nav__pc">
                    <label for="menu" class="nav__close">
                        <i class="fas fa-times"></i>
                    </label>
                    <!-- <li class="header__navbar-item-child"></li> -->
                    <div class="grid-with-width">
                        <div class="nav__pc-top">
                            <div class="nav__pc-top-title">BEST</div>
                            <div class="nav__pc-top-heading">
                                <u>PACKAGES</u>
                            </div>
                            <div class="nav__pc-content">
                                <img src="./asset/img/berlin150x150.jpg" alt="" class="nav__pc-img">
                                <div class="nav__pc-title">
                                    <div class="nav__pc-title-name">Berlin</div>
                                    <div class="nav__pc-title-map">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Europe
                                    </div>
                                    <button class="nav__pc-button">From 700$</button>
                                </div>
                            </div>

                            <div class="nav__pc-content">
                                <img src="./asset/img/berlin150x150.jpg" alt="" class="nav__pc-img">
                                <div class="nav__pc-title">
                                    <div class="nav__pc-title-name">Berlin</div>
                                    <div class="nav__pc-title-map">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Europe
                                    </div>
                                    <button class="nav__pc-button">From 700$</button>
                                </div>
                            </div>
                            <div class="nav__pc-content">
                                <img src="./asset/img/berlin150x150.jpg" alt="" class="nav__pc-img">
                                <div class="nav__pc-title">
                                    <div class="nav__pc-title-name">Berlin</div>
                                    <div class="nav__pc-title-map">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Europe
                                    </div>
                                    <button class="nav__pc-button">From 700$</button>
                                </div>
                            </div>
                        </div>

                        <div class="nav__pc-top">
                            <div class="nav__full">
                                <img src="./asset/img/nav__pc.jpg" alt="" class="nav__full-img">
                                <div class="nav__full-top">
                                    <img src="./asset/img/nav__pc-icon1.jpg" alt="">
                                </div>
                                <div class="nav__full-content">
                                    <div class="nav__full-heading">Europe</div>
                                    <div class="nav__full-title">3 PACKAGES</div>
                                </div>
                                <div class="nav__full-hover">
                                    <div class="nav__full-hover-heading">Packages</div>
                                    <div class="nav__full-hover-content">
                                        <p>Berlin</p>
                                        <p>Amsterdam</p>
                                        <p>Tuscany</p>
                                    </div>
                                    <a href="/duan1/location_detail.php" class="nav__full-hover-btn">VIEW DESTINATION</a>
                                </div>
                            </div>



                        </div>

                        <div class="nav__pc-top">
                            <div class="nav__pc-top-title">LAST</div>
                            <div class="nav__pc-top-heading">
                                <u>MINUTES</u>
                            </div>
                            <div class="nav__pc-content">
                                <img src="./asset/img/berlin150x150.jpg" alt="" class="nav__pc-img">
                                <div class="nav__pc-title">
                                    <div class="nav__pc-title-name">Berlin</div>
                                    <div class="nav__pc-title-map">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Europe
                                    </div>
                                    <button class="nav__pc-button">From 700$</button>
                                </div>
                            </div>

                            <div class="nav__pc-content">
                                <img src="./asset/img/berlin150x150.jpg" alt="" class="nav__pc-img">
                                <div class="nav__pc-title">
                                    <div class="nav__pc-title-name">Berlin</div>
                                    <div class="nav__pc-title-map">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Europe
                                    </div>
                                    <button class="nav__pc-button">From 700$</button>
                                </div>
                            </div>
                            <div class="nav__pc-content">
                                <img src="./asset/img/berlin150x150.jpg" alt="" class="nav__pc-img">
                                <div class="nav__pc-title">
                                    <div class="nav__pc-title-name">Berlin</div>
                                    <div class="nav__pc-title-map">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Europe
                                    </div>
                                    <button class="nav__pc-button">From 700$</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- nav__pc -->
                </div>

                <!-- \nav__tablet and mobile-->
                <div class="nav__tablet">
                    <label for="menu" class="nav__close">
                        <i class="fas fa-times"></i>
                    </label>
                    <!-- <li class="header__navbar-item-child"></li> -->
                    <li class="header__navbar-item-child"><a href="/duan1/index.php" class="header__navbar-link-child">Trang chủ</a></li>
                    <li class="header__navbar-item-child"><a href="/duan1/tours.php" class="header__navbar-link-child">Tours</a></li>
                    <li class="header__navbar-item-child"><a href="/duan1/about.php" class="header__navbar-link-child">Giới thiệu</a></li>
                    <li class="header__navbar-item-child"><a href="#" class="header__navbar-link-child">Bài viết</a></li>
                    <li class="header__navbar-item-child"><a href="/duan1/contact.php" class="header__navbar-link-child">Liên hệ</a></li>

                </div>
                <label for="menu" class="overlay__tablet"></label>
            </div>
            <div class="header__search">
                <div class="header__search-content">
                    <h3 class="header__search-heading">Những Kỳ Nghỉ <u>Du Lịch</u></h3>
                    <div class="header__search-item">
                        <a href=""><img src="./asset/img/t-relax.png" alt="" class="header__search-img"></a>
                        <a href=""><img src="./asset/img/t-cultural.png" alt="" class="header__search-img"></a>
                        <a href=""><img src="./asset/img/t-sport.png" alt="" class="header__search-img"></a>
                        <a href=""><img src="./asset/img/t-history.png" alt="" class="header__search-img"></a>
                    </div>
                </div>
            </div>
        </header>

        <div class="body">
            <div class="body__top">
                <div class="grid">
                    <div class="grid__row">
                        <div class="body__content">
                            <span>Đề xuất của chúng tôi</span>
                            <p>Các <u>Điểm Đến Du Lịch</u></p>
                        </div>
                        <?php for ($i = 0; $i < 9; $i++) { ?>
                            <div class="grid__column-3">
                                <div class="nav__full">
                                    <img style="max-height:240px;overflow:hidden;" src="./asset/img/<?php echo $data_location[$i]['img_location'] ?>" alt="" class="nav__full-img">
                                    <div class="nav__full-top">
                                        <img src="./asset/img/nav__pc-icon1.jpg" alt="">
                                    </div>
                                    <div class="nav__full-content">
                                        <div class="nav__full-heading"><?php echo $data_location[$i]['name_location'] ?></div>
                                    </div>
                                    <div class="nav__full-hover">
                                        <div class="nav__full-hover-heading">Địa điểm</div>
                                        <div class="nav__full-hover-content">
                                            <p>Uy Tín</p>
                                            <p>Chất Lượng</p>
                                            <p>An Toàn</p>
                                        </div>
                                        <a href="/duan1/location_detail.php?id_location=<?php echo $data_location[$i]['id_location'] ?>" class="nav__full-hover-btn">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="body__banner">
                <div class="grid" style="padding-top: 60px;">
                    <div class="banner__block">
                        <div class="body__banner-content ">
                            <p class="banner__heading-1">Relax</p>
                            <p class="banner__heading-1">HTH <u>Travel</u></p>
                        </div>
                        <button class="body__banner-button">UY TÍN - CHẤT LƯỢNG</button>
                    </div>
                </div>
            </div>

            <div class="body__sale">
                <div class="grid">
                    <div class="grid__row">
                        <div class="grid__column-3">
                            <div class="body__sale-left">
                                <div class="sale-left__heading">
                                    <span>KHÁM PHÁ</span>
                                    <p>Địa Điểm Du Lịch</p>
                                </div>
                                <div class="sale-left__body">
                                    <p>Du lịch là việc đi lại nhằm mục đích niềm vui hoặc kinh doanh; cũng là lý thuyết và thực hành về tổ chức các chương trình đi du lịch, ngành kinh doanh nhằm thu hút, cung cấp và giải trí cho khách du lịch, và việc kinh doanh của các tổ chức điều hành các tour du lịch.Chúng ta cùng khám phá.</p>
                                </div>
                            </div>
                        </div>
                        <div class="body__sale-content">
                            <div class="body__sale-content-img">
                                <div class="body__sale-time">
                                    <div class="grid__row">
                                        <div class="grid__column-4 ">
                                            <div class="date-time">
                                                <p id="ngay">000</p>
                                                <span>DAYS</span>
                                            </div>
                                        </div>
                                        <div class="grid__column-4 ">
                                            <div class="date-time">
                                                <p id="gio">00</p>
                                                <span>HOUR</span>
                                            </div>
                                        </div>
                                        <div class="grid__column-4 ">
                                            <div class="date-time">
                                                <p id="phut">00</p>
                                                <span>MINUTES</span>
                                            </div>
                                        </div>
                                        <div class="grid__column-4 ">
                                            <div class="date-time">
                                                <p id="giay">00</p>
                                                <span>SECONDS</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                thoigianden('1/1/2022', ['ngay', 'gio', 'phut', 'giay']);
            </script>
            <div class="body__view">
                <div class="grid">
                    <div class="grid__row">
                        <div class="grid__column-3">
                            <div class="body__view-map">
                                <img src="./asset/img/td.png" alt="" class="body__view-img">
                                <div class="body__view-content">
                                    <div class="body__view-heading">Miền Bắc</div>
                                    <div class="body__view-details">Nhắc tới tour du lịch Miền Bắc thì người ta nghĩ ngay đến những
                                        địa danh nổi tiếng,các nét đẹp văn hóa,phong tục tập quán của từng vùng miền,các lễ hội truyền
                                        thống,nét mới lạ trong ẩm thực..
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column-3">
                            <div class="body__view-map">
                                <img src="./asset/img/thuyen.png" alt="" class="body__view-img">
                                <div class="body__view-content">
                                    <div class="body__view-heading">Miền Trung</div>
                                    <div class="body__view-details">Mỗi 1 tour Du Lịch Miền Trung là hành trình khám phá một mảnh đất sở
                                        hữu nhiều di sản thiên nhiên và văn hóa thế giới giá trị nhất cả nước. Tham gia các chương trình
                                        Du Lịch Miền Trung bạn..
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column-3">
                            <div class="body__view-map">
                                <img src="./asset/img/icon-landmark.png" alt="" class="body__view-img">
                                <div class="body__view-content">
                                    <div class="body__view-heading">Miền Nam</div>
                                    <div class="body__view-details">Du lịch Miền Nam - Miền đất hứa là vùng đất mang nhiều hy vọng của những
                                        người dân xa quê, là vùng đất trù phú giàu có được thiên nhiên ưu ái ban tặng. Miền Namchính vì được
                                        thiên nhiên ưu ái nên đây..
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body__details">
                <div class="grid-with-width">
                    <div class="grid__row">
                        <div class="grid__column-2 body__details-content" style="background-image: url(./asset/img/parallax-5-filter.jpg);">
                            <div class="body__details-content-child">
                                <div class="content-child__title">01. Du Lịch</div>
                                <div class="content-child__heading">Khám Phá Thành Phố</div>
                            </div>
                        </div>
                        <div class="grid__column-2 body__details-content" style="background-image: url(./asset/img/parallax-6-filter.jpg);">
                            <div class="body__details-content-child">
                                <div class="content-child__title">02. Du Lịch</div>
                                <div class="content-child__heading">Khám Phá Thiên Nhiên</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body__bottom">
                <div class="grid">
                    <div class="grid__row">
                        <div class="body__content">
                            <p id="tours">CÁC <u>ĐỊA ĐIỂM</u></p>
                        </div>
                        <?php for ($i = 0; $i < 6; $i++) {
                            $array_color = ['FFD205', 'F78269', 'BA71DA'];
                            $css = array_rand($array_color); ?>
                            <div class="grid__column-3 bordered">
                                <img src="./asset/img/<?= $data[$i]['image'] ?>" alt="" class="body__bottom-img" style="height: 252px;overflow: hidden;">
                                <div class="body__bottom-content">
                                    <div class="body__bottom-title">
                                        <p style="overflow: hidden;line-height: 24px; margin-top: 4px; height: 50px; display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 2;">
                                            <?= $data[$i]['name_tours'] ?>
                                        </p>
                                        <span><i class="fas fa-map-marked"></i><?= $data[$i]['name_location'] ?></span>
                                    </div>
                                    <div class="body__bottom-price">
                                        <div class="body__bottom-price-left">
                                            <p>CULTURAL</p>
                                            <p>
                                                RELAX
                                                <span class="number" style="background-color: #<?= $array_color[$css] ?>;">+ 1</span>
                                            </p>
                                        </div>
                                        <div class="body__bottom-price-right">
                                            <p><?= number_format($data[$i]['price_tours']) ?>Đ</p>
                                        </div>
                                    </div>
                                    <div class="body__bottom-detail">
                                        <button style="background-color: #<?= $array_color[$css] ?>;"><a href="./tours_detail.php?id_tours=<?= $data[$i]['id_tours'] ?>" style="text-decoration: none; color: white;">CHI TIẾT</a></button>
                                    </div>
                                    <div class="position" style="background-color:#<?= $array_color[$css] ?>">
                                        <img src="./asset/img/nav__pc-icon1.jpg" alt="" style="width: 30px;">
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="hotline-phone-ring-wrap">
            <div class="hotline-phone-ring">
                <div class="hotline-phone-ring-circle"></div>
                <div class="hotline-phone-ring-circle-fill"></div>
                <div class="hotline-phone-ring-img-circle">
                    <a href="tel:0987654321" class="pps-btn-img">
                        <img src="https://nguyenhung.net/wp-content/uploads/2019/05/icon-call-nh.png" alt="Gọi điện thoại" width="50">
                    </a>
                </div>
            </div>
            <div class="hotline-bar" style="right: 0;">
                <a href="tel:0392397262">
                    <span class="text-hotline">0392397262</span>
                </a>
            </div>
        </div>
        <div class="footer">
            <?php require_once './footer.php'; ?>
        </div>

</body>

</html>