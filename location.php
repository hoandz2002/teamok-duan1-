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
    <title>Địa điểm du lịch</title>
    <link rel="stylesheet" href="./asset/fonts/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="./asset/css/base.css">
    <link rel="stylesheet" href="./asset/css/main.css">
    <link rel="stylesheet" href="./asset/css/index.css">
    <link rel="stylesheet" href="./asset/css/responsive.css">
    <script src="demo.js"></script>
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
</head>

<body>
    <div class="main">
        <header class="header" style="background-image: url(./asset/img/wall.jpg); height: 720px;">
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
                    <h3 class="header__search-heading">Những địa điểm <u>Du Lịch</u></h3>
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
                        <?php
                        require_once './admin/connect_list.php';
                        $results_per_page = 9;
                        $query = "select * from location ";
                        $result = mysqli_query($conn, $query);
                        $number_of_result = mysqli_num_rows($result);
                        $number_of_page = ceil($number_of_result / $results_per_page);
                        if (!isset($_GET['page'])) {
                            $page = 1;
                        } else {
                            $page = $_GET['page'];
                        }
                        $page_first_result = ($page - 1) * $results_per_page;
                        $query = "SELECT * FROM location LIMIT " . $page_first_result . ',' . $results_per_page;
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) { ?>
                            <div class="grid__column-3">
                                <div class="nav__full">
                                    <img style="max-height:240px;overflow:hidden;" src="./asset/img/<?php echo $row['img_location'] ?>" alt="" class="nav__full-img">
                                    <div class="nav__full-top">
                                        <img src="./asset/img/nav__pc-icon1.jpg" alt="">
                                    </div>
                                    <div class="nav__full-content">
                                        <div class="nav__full-heading"><?php echo $row['name_location'] ?></div>
                                    </div>
                                    <div class="nav__full-hover">
                                        <div class="nav__full-hover-heading">Địa điểm</div>
                                        <div class="nav__full-hover-content">
                                            <p>Uy Tín</p>
                                            <p>Chất Lượng</p>
                                            <p>An Toàn</p>
                                        </div>
                                        <a href="/duan1/location_detail.php?id_location=<?php echo $row['id_location'] ?>" class="nav__full-hover-btn">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div style="width: 100%; padding: 2px 40px 8px;">
                            <?php for ($page = 1; $page <= $number_of_page; $page++) {
                                echo '<a style="text-decoration: none;
                                    width: 30px;
                                    text-align: center;
                                    line-height: 30px;
                                    display: inline-block;
                                    margin: 0px 8px;
                                    background-color: #007bff;
                                    color: white;" href = "location.php?page=' . $page . '">' . $page . ' </a>';
                            }
                            ?>
                        </div>
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
        <div class="form-flex open">
            <div class="flex-container">
                <div class="flex-text">
                    <div>
                        <style>
                            .highlight {
                                font-size: 48px;
                                font-weight: bold;
                                /*cở chữ*/
                                font-family: "Poppins", sans-serif;
                                /*font chữ ví dụ times, arial...*/
                                font-weight: bold;
                                /*in đậm, nếu bạn không muốn in đậm text bạn có thể xóa dòng này*/
                            }
                        </style>
                        <script>
                            var text = "Giảm giá sốc"
                            var speed = 80 //tốc độ chuyển đổi giữa các màu
                            if (document.all || document.getElementById) {
                                document.write('<span id="highlight" class="highlight">' + text + '</span>')
                                var storetext = document.getElementById ? document.getElementById("highlight") : document.all.highlight
                            } else
                                document.write(text)
                            var hex = new Array("00", "14", "28", "3C", "50", "64", "78", "8C", "A0", "B4", "C8", "DC", "F0")
                            var r = 1
                            var g = 1
                            var b = 1
                            var seq = 1

                            function changetext() {
                                rainbow = "#" + hex[r] + hex[g] + hex[b]
                                storetext.style.color = rainbow
                            }

                            function change() {
                                if (seq == 6) {
                                    b--
                                    if (b == 0)
                                        seq = 1
                                }
                                if (seq == 5) {
                                    r++
                                    if (r == 12)
                                        seq = 6
                                }
                                if (seq == 4) {
                                    g--
                                    if (g == 0)
                                        seq = 5
                                }
                                if (seq == 3) {
                                    b++
                                    if (b == 12)
                                        seq = 4
                                }
                                if (seq == 2) {
                                    r--
                                    if (r == 0)
                                        seq = 3
                                }
                                if (seq == 1) {
                                    g++
                                    if (g == 12)
                                        seq = 2
                                }
                                changetext()
                            }

                            function starteffect() {
                                if (document.all || document.getElementById)
                                    flash = setInterval("change()", speed)
                            }
                            starteffect()
                        </script>
                    </div>
                    <div class="flex-img">
                        <!-- <img src="./asset/img/an giang.jpg" alt=""> -->
                    </div>
                    <div class="flex-content">
                        <p>Merry christmas </p>
                    </div>
                    <button class="flex-btn">
                        <i class="fas fa-times" style="font-size: 2rem;"></i>
                    </button>
                </div>
            </div>
        </div>

        <script>
            const formflex = document.querySelector('.form-flex');
            const flexContainer = document.querySelector('.flex-container');

            const btn = document.querySelector('.flex-btn');

            //hàm ẩn modal mua vé(gỡ bỏ class open vào modal)
            function hideBuyTickets() {
                formflex.classList.remove('open');
            }

            btn.addEventListener('click', hideBuyTickets);
            flexContainer.addEventListener('click', function(even) {
                event.stopPropagation();
            });
        </script>
</body>

</html>