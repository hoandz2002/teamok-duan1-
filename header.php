<?php
// session_start();
require_once './db/connection.php';
require_once './db/tour.php';
require_once './db/cate_post.php';
require_once './db/location.php';
$data_location = getAllLocation();
$rand = getAllTours();
$data_cate = getAll_cate();
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
    <title>Document</title>
</head>

<body>
    <header class="header">
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
                        <?php for ($i = 0; $i < 3; $i++) { ?>
                            <div class="nav__pc-content">
                                <img src="/duan1/asset/img/<?= $rand[$i]['image'] ?>" alt="" class="nav__pc-img">
                                <div class="nav__pc-title">
                                    <div class="nav__pc-title-name" style="
    overflow: hidden;
    line-height: 24px;
    margin-top: 4px;
    height: 50px;
    font-size: 14px;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;"><?= $rand[$i]['name_tours'] ?></div>
                                        <button class="nav__pc-button"><a href="/duan1/tours_detail.php?id_tours=<?php echo $rand[$i]['id_tours'] ?>" >Xem</a></button>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="nav__pc-top">

                    <?php for ($i = 0; $i < 1; $i++) { ?>
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
                        
                    <?php }  ?>

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
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        $(document).ready(function() {
            $(window).scroll(function(event) {
                if ($(this).scrollTop()) {
                    $('.header__navbar').addClass('sticky');
                } else {
                    $('.header__navbar').removeClass('sticky');
                }
            });
        });
    </script>
</body>

</html>