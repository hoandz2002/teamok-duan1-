<?php
// session_start();
require_once './db/connection.php';
require_once './db/cate_post.php';
$data_cate = getAll_cate();
if (empty($_SESSION['user']) == false) {
    $name = '<li class="header__navbar-item-child"><a href="/duan1/acc.php" class="header__navbar-link-child">Thông tin</a></li>
    <li class="header__navbar-item-child"><a href="/duan1/cart.php" class="header__navbar-link-child">Giỏ hàng</a></li>
        <li class="header__navbar-item-child"><a href="/duan1/logout.php" class="header__navbar-link-child">Đăng xuất</a></li>';
} else {
    $name = '<li class="header__navbar-item-child"><a href="/duan1/login_form.php" class="header__navbar-link-child">Đăng nhập</a></li>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header class="header">
        <div class="header__navbar">
            <div class="header__navbar-logo">
                <img src="/duan1/asset/img/logohthtravel.png" alt="" class="header__navbar-logo-img">
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
                    <a href="#" class="header__navbar-item__link">Bài Viết</a>
                    <ul class="header__navbar-list-child">
                        <?php foreach ($data_cate as $ds) { ?>
                            <li class="header__navbar-item-child"><a href="/duan1/post.php" class="header__navbar-link-child"><?php echo $ds['name_cate_post']; ?></a></li>
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
                        <?php echo $name; ?>
                        <!-- <li class="header__navbar-item-child"><a href="/duan1/login_form.php" class="header__navbar-link-child"></a></li> -->
                    </ul>
                </li>
                <label for="menu" class="header__navbar-icon">
                    <i class="fas fa-bars"></i>
                </label>
            </div>
            <!-- <div style="width: 200px;">
                
                <a  style='display: inline-block; padding-left: 140px; padding-right: 24px; color: white; font-size: 1.8rem; cursor: pointer;'>
                    <i class='fas fa-user'></i>
                </a>
                
            </div> -->

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
                            <img src="/duan1/asset/img/berlin150x150.jpg" alt="" class="nav__pc-img">
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
                            <img src="/duan1/asset/img/berlin150x150.jpg" alt="" class="nav__pc-img">
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
                            <img src="/duan1/asset/img/berlin150x150.jpg" alt="" class="nav__pc-img">
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
                            <img src="/duan1/asset/img/nav__pc.jpg" alt="" class="nav__full-img">
                            <div class="nav__full-top">
                                <img src="/duan1/asset/img/nav__pc-icon1.jpg" alt="">
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
                                <button class="nav__full-hover-btn">VIEW DESTINATION</button>
                            </div>
                        </div>



                    </div>

                    <div class="nav__pc-top">
                        <div class="nav__pc-top-title">LAST</div>
                        <div class="nav__pc-top-heading">
                            <u>MINUTES</u>
                        </div>
                        <div class="nav__pc-content">
                            <img src="/duan1/asset/img/berlin150x150.jpg" alt="" class="nav__pc-img">
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
                            <img src="/duan1/asset/img/berlin150x150.jpg" alt="" class="nav__pc-img">
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

    </header>
</body>

</html>