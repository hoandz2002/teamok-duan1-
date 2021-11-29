<?php
require_once './db/connection.php';
require_once './db/cate_post.php';
require_once './db/tour.php';
require_once './db/location.php';

$data_cate = getAll_cate();
$data = getAllTours();
$data_location = getall_location();
// var_dump($data_location);die;

session_start();
if (empty($_SESSION['user']) == false) {
    $name = '<li class="header__navbar-item-child"><a href="/duan1/acc.php" class="header__navbar-link-child">Thông tin</a></li>
    <li class="header__navbar-item-child"><a href="/duan1/cart.php" class="header__navbar-link-child">Tours</a></li>    
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
</head>
<style>
    .body__bottom-detail {
        padding: 20px 0px 0px;
    }
</style>

<body>
    <div class="main">
        <header class="header" style="background-image: url(./asset/img/bannner-home.jpg); height: 720px;">
            <div class="header__navbar">
                <div class="header__navbar-logo">
                    <img src="./asset/img/logohthtravel.png" alt="" class="header__navbar-logo-img">
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

                <!-- iput -->
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
                    <li class="header__navbar-item-child"><a href="/duan1/abput.php" class="header__navbar-link-child">Giới thiệu</a></li>
                    <li class="header__navbar-item-child"><a href="#" class="header__navbar-link-child">Bài viết</a></li>
                    <li class="header__navbar-item-child"><a href="/duan1/contact.php" class="header__navbar-link-child">Liên hệ</a></li>

                </div>
                <label for="menu" class="overlay__tablet"></label>
            </div>
            <div class="header__search">
                <div class="header__search-content">
                    <h3 class="header__search-heading">Những Kỳ Nghỉ <u>Du Lịch</u></h3>
                    <p class="header__search-title">
                        KHUYẾN MÃI TỐT NHẤT
                    </p>
                    <!-- <div class="header__search-history">
                        <select class="header__search-history-pla">
                            <option class="header__search-history-op">Choose your Destination ... </option>
                            <option class="header__search-history-op">Europe</option>
                            <option class="header__search-history-op">-Italy</option>
                            <option class="header__search-history-op">-Netherlands</option>
                            <option class="header__search-history-op">Asia</option>
                            <option class="header__search-history-op">-Thailandia</option>
                            <option class="header__search-history-op">United States</option>
                            <option class="header__search-history-op">Oceania</option>
                        </select>
                    </div> -->
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
                        <?php foreach ($data_location as  $value) { ?>
                            <div class="grid__column-3">
                                <div class="nav__full">
                                    <img style="max-height:244.8px;over-flow:hidden;" src="./asset/img/<?php echo $value['img_location'] ?>" alt="" class="nav__full-img">
                                    <div class="nav__full-top">
                                        <img src="./asset/img/nav__pc-icon1.jpg" alt="">
                                    </div>
                                    <div class="nav__full-content">
                                        <div class="nav__full-heading"><?php echo $value['name_location'] ?></div>
                                    </div>
                                    <div class="nav__full-hover">
                                        <div class="nav__full-hover-heading">Địa điểm</div>
                                        <div class="nav__full-hover-content">
                                            <p>Uy Tín</p>
                                            <p>Chất Lượng</p>
                                            <p>An Toàn</p>
                                        </div>
                                        <a href="/duan1/location_detail.php?id_location=<?php echo $value['id_location'] ?>" class="nav__full-hover-btn">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="body__banner">
                <div class="grid">
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
                                                <p>000</p>
                                                <span>DAYS</span>
                                            </div>
                                        </div>
                                        <div class="grid__column-4 ">
                                            <div class="date-time">
                                                <p>00</p>
                                                <span>HOUR</span>
                                            </div>
                                        </div>
                                        <div class="grid__column-4 ">
                                            <div class="date-time">
                                                <p>00</p>
                                                <span>MINUTES</span>
                                            </div>
                                        </div>
                                        <div class="grid__column-4 ">
                                            <div class="date-time">
                                                <p>00</p>
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

            <div class="body__view">
                <div class="grid">
                    <div class="grid__row">
                        <div class="grid__column-3">
                            <div class="body__view-map">
                                <img src="./asset/img/icon-landmark.png" alt="" class="body__view-img">
                                <div class="body__view-content">
                                    <div class="body__view-heading">Cruises</div>
                                    <div class="body__view-datails">Lorem ipsum dolor sit amet conse ctetur adip iscing
                                        elit Proin rhonc us urna dictum.</div>
                                    <a href="" class="body__view-link">View more</a>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column-3">
                            <div class="body__view-map">
                                <img src="./asset/img/icon-landmark.png" alt="" class="body__view-img">
                                <div class="body__view-content">
                                    <div class="body__view-heading">Cruises</div>
                                    <div class="body__view-datails">Lorem ipsum dolor sit amet conse ctetur adip iscing
                                        elit Proin rhonc us urna dictum.</div>
                                    <a href="" class="body__view-link">View more</a>
                                </div>
                            </div>
                        </div>
                        <div class="grid__column-3">
                            <div class="body__view-map">
                                <img src="./asset/img/icon-landmark.png" alt="" class="body__view-img">
                                <div class="body__view-content">
                                    <div class="body__view-heading">Cruises</div>
                                    <div class="body__view-datails">Lorem ipsum dolor sit amet conse ctetur adip iscing
                                        elit Proin rhonc us urna dictum.</div>
                                    <a href="" class="body__view-link">View more</a>
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
                                <button class="content-child__button content-child__button-top">DETAILS</button>
                            </div>
                        </div>
                        <div class="grid__column-2 body__details-content" style="background-image: url(./asset/img/parallax-6-filter.jpg);">
                            <div class="body__details-content-child">
                                <div class="content-child__title">02. Du Lịch</div>
                                <div class="content-child__heading">Khám Phá Thiên Nhiên</div>
                                <button class="content-child__button content-child__button-bottom">DETAILS</button>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body__bottom">
                <div class="grid">
                    <div class="grid__row">
                        <div class="body__content">
                            <span>KHUYẾN MÃI</span>
                            <p>CÁC <u>ĐỊA ĐIỂM</u></p>
                        </div>
                        <?php foreach ($data as $value) { ?>
                            <div class="grid__column-3 bordered">
                                <img src="./asset/img/<?= $value['image'] ?>" alt="" class="body__bottom-img" style="height: 252px;overflow: hidden;">
                                <div class="body__bottom-content">
                                    <div class="body__bottom-title">
                                        <p style="overflow: hidden;
  display: -webkit-box;
  -webkit-box-orient: vertical;
  -webkit-line-clamp: 2;"><?= $value['name_tours'] ?></p>
                                        <span><i class="fas fa-map-marked"></i><?= $value['name_location'] ?></span>
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
                                            <p><?= $value['price_tours'] ?>Đ</p>
                                        </div>
                                    </div>
                                    <div class="body__bottom-detail">
                                        <p style="overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; height: 50px;">
                                            <?= $value['short_description_tours'] ?>
                                        </p>
                                        <button><a href="./tours_detail.php?id_tours=<?= $value['id_tours'] ?>" style="text-decoration: none; color: white;">CHI TIẾT</a></button>
                                    </div>
                                    <div class="possition">
                                        <img src="./asset/img/nav__pc-icon1.jpg" alt="" style="width: 30px;">
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="grid">
                <!-- <div class="grid"> -->
                <div class="grd-with-width">
                    <div class="footer__header">
                        <div class="footer__header-top">
                            <span class="footer__header-span">
                                KEEP IN TOUCH
                            </span>

                        </div>
                        <div class="footer__header-bottom">
                            <p class="footer__header-heading">
                                Travel with Us
                            </p>
                            <div class="footer__header-form">
                                <input type="text" class="footer__header-input">
                                <button class="footer__header-button">SEND</button>
                            </div>
                        </div>
                    </div>
                    <div class="footer__content">
                        <div class="footer__content-top grid__row">
                            <div class="grid__column-2">
                                <div class="footer__logo">
                                    <img src="./asset/img/logohthtravel.png" alt="" class="footer__logo-img">
                                </div>
                                <div class="footer__text">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ut
                                        diam
                                        et nibh condimentum venenatis eu ac magnasin. Quisque interdum est
                                        mauris,
                                        eget ullamcorper.
                                    </p>
                                </div>
                                <div class="footer__icons">
                                    <i class="footer__icon fab fa-twitter"></i>
                                    <i class="footer__icon fab fa-youtube"></i>
                                    <i class="footer__icon fab fa-facebook"></i>
                                    <i class="footer__icon fab fa-vimeo-v"></i>
                                </div>
                            </div>

                            <div class="grid__column-2 flex__row">
                                <div class="grid__column-3 footer__content-1">
                                    <div class="footer__heading-1">
                                        OUR AGENCY
                                    </div>
                                    <p class="footer__item">
                                        <i class="item-icon fas fa-angle-right"></i>
                                        Redamancy
                                    </p>
                                    <p class="footer__item">
                                        <i class="item-icon fas fa-angle-right"></i>
                                        Redamancy
                                    </p>
                                    <p class="footer__item">
                                        <i class="item-icon fas fa-angle-right"></i>
                                        Redamancy
                                    </p>
                                    <p class="footer__item">
                                        <i class="item-icon fas fa-angle-right"></i>
                                        Redamancy
                                    </p>
                                    <p class="footer__item">
                                        <i class="item-icon fas fa-angle-right"></i>
                                        Redamancy
                                    </p>

                                </div>
                                <div class="grid__column-3 footer__content-1">
                                    <div class="footer__heading-1">
                                        OUR AGENCY
                                    </div>
                                    <p class="footer__item">
                                        <i class="item-icon fas fa-angle-right"></i>
                                        Redamancy
                                    </p>
                                    <p class="footer__item">
                                        <i class="item-icon fas fa-angle-right"></i>
                                        Redamancy
                                    </p>
                                    <p class="footer__item">
                                        <i class="item-icon fas fa-angle-right"></i>
                                        Redamancy
                                    </p>
                                    <p class="footer__item">
                                        <i class="item-icon fas fa-angle-right"></i>
                                        Redamancy
                                    </p>
                                    <p class="footer__item">
                                        <i class="item-icon fas fa-angle-right"></i>
                                        Redamancy
                                    </p>

                                </div>
                                <div class="grid__column-3 footer__content-1">
                                    <div class="footer__heading-1">
                                        OUR AGENCY
                                    </div>
                                    <p class="footer__item">
                                        <i class="item-icon fas fa-angle-right"></i>
                                        Redamancy
                                    </p>
                                    <p class="footer__item">
                                        <i class="item-icon fas fa-angle-right"></i>
                                        Redamancy
                                    </p>
                                    <p class="footer__item">
                                        <i class="item-icon fas fa-angle-right"></i>
                                        Redamancy
                                    </p>
                                    <p class="footer__item">
                                        <i class="item-icon fas fa-angle-right"></i>
                                        Redamancy
                                    </p>
                                    <p class="footer__item">
                                        <i class="item-icon fas fa-angle-right"></i>
                                        Redamancy
                                    </p>

                                </div>

                            </div>

                        </div>
                        <div class="grid__row-1 footer__content-bottom">
                            <div class="grid__column-2">
                                <div class="footer__content-bottom-left">
                                    <span>THE BEST WORDPRESS TRAVEL THEME</span>
                                </div>
                            </div>

                            <div class="grid__column-2">
                                <div class="footer__content-bottom-right">
                                    <span>COPYRIGHT NICDARK THEMES 2018 BY TRỌNG</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>

</body>

</html>