<?php
session_start();
require_once './admin/connect_list.php';
require_once './db/connection.php';
require_once './db/bill_tour.php';
require_once './db/coupon.php';

require_once './db/connection.php';
require_once './db/service.php';
require_once './db/tour_guide.php';
require_once './db/customer.php';
$dataActive = getActive();
$id_bill_tours = $_GET['id_bill_tours'];
$data_old = getIdBill2($id_bill_tours);
$data_service = getAllService();
$id_customer = $data_old['id_customer'];
$cus = getAllCustomerById($id_customer);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tours Detail</title>
    <link rel="stylesheet" href="/duan1/asset/fonts/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="/duan1/asset/css/base.css">
    <link rel="stylesheet" href="/duan1/asset/css/main.css">
    <link rel="stylesheet" href="/duan1/asset/css/tours_detail.css">
    <link rel="stylesheet" href="/duan1/asset/css/responsive.css">
    <link rel="stylesheet" href="/duan1/asset/css/css_admin/error_mess.css">
    <style>
        .table1 {
            font-size: 14px;
            color: #555;
            width: 1171px;
            margin-left: 175px;
            text-align: center;
        }

        .thead,
        .tfoot {
            height: 70px;
            background-color: #EAE7E7;
        }

        .tbody {
            height: 70px;
        }

        .update {
            width: 100px;
            height: 30px;
            border-radius: 16px;
            border: none;
            outline: none;
            background-color: #87D9E7;
            color: #fff;
            cursor: pointer;
            font-size: 10px;
        }

        .update:hover {
            background-color: #14B9D5;
        }

        .table2 {
            width: 560px;
            margin-top: 20px;
            height: 122px;
            border: 1px solid #9a9a9a;
            display: grid;
            grid-template-rows: 1fr 1fr;
            text-align: center;
        }

        .submit {
            width: 560px;
            height: 61px;
            border: none;
            margin-top: 20px;
            color: #fff;
            background-color: #14B9D5;
            cursor: pointer;
        }

        td {
            padding-top: 20px;
            padding-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="main">
        <?php require_once './header.php'; ?>
        <div class="body__banner" style="background-image: url(/duan1/asset/img/cart-banner.jpg); padding: 10%;">
            <div class="banner-text" style="text-shadow: 0px 1px 2px green;">Cart</div>
        </div>
        <?php if (isset($_SESSION['error'])) { ?>
            <div id="toast">
                <div class="tst_test tst--error">
                    <div class="toast__icon">
                        <i class="fas fa-exclamation"></i>
                    </div>
                    <div class="toast__body">
                        <h3 class="toast__title" style="font-weight: 600;color: #333;">
                            Error
                        </h3>
                        <p class="toast__msg">
                            <?php
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                            ?>
                        </p>
                    </div>
                    <div class="toast__close">
                        <i class='fas fa-times'></i>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="body" style="margin-bottom:30px;">
            <div class="grid">
                <div class="" style="font-size: 16px; line-height: 20px;">
                <h2>Chi tiết tours</h2>
                    <p><b>ID Bill:</b><?= $data_old['id_bill_tours'] ?></p>
                    <!-- <p>Tên khách hàng:  <?= $data_old['name_customer'] ?></p> -->
                    <p><b>Số người:</b> <?= $data_old['quantity_pp'] ?></p>
                    <p><b>Tên tours:</b> <?= $data_old['name_tours'] ?></p>
                    <p><b>Thời gian đăt:</b> <?= $data_old['date_book'] ?></p>
                    <p><b>Thời gian đi:</b> <?= $data_old['date_start'] ?></p>
                    <p><b>Tên dịch vụ:</b> <?= $data_old['name_service'] ?></p>
                    <p><b>Mô tả dịch vụ: </b><?= $data_old['description_service'] ?></p>
                    <p><b>Tên khách hàng:</b> <?= $cus['name_customer'] ?></p>
                    <p><b>Địa chỉ:</b> <?= $cus['address_customer'] ?></p>
                    <p> <b>Trạng thái tours:</b> <?php if ($data_old['bill_status'] == 0) {
                                                        echo 'Đang chờ xác nhận'; ?>
                        <?php  } else if ($data_old['bill_status'] == 1) {
                                                        echo 'Đã xác nhận';
                        ?>
                        <?php } elseif ($data_old['bill_status'] == 3) {
                                                        echo "Đã khởi hành";
                        ?>
                        <?php } elseif ($data_old['bill_status'] == 4) {
                                                        echo 'Đã hoàn tất';
                        ?>

                        <?php  } elseif ($data_old['bill_status'] == 2) {
                                                        echo 'Đã thanh toán';
                        ?>
                        <?php }
                        ?></p>
                    <br>
                    <a href="/duan1/cart.php?id_customer=<?=$id_customer?>" class="btn">Trở về</i></a>
                </div>
            </div>
            <?php require_once "./call.php" ?>
        </div>
        <div class="footer" style="margin-top: 100px;">
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
                            <div class="grid__column-2" style="padding-right: 8px; box-sizing: border-box;">
                                <div class="footer__logo">
                                    <img src="/duan1/asset/img/logohthtravel.png" alt="" class="footer__logo-img">
                                </div>
                                <div class="footer__text">
                                    <p>
                                        Để phục vụ quý khách tốt hơn nữa, chúng tôi luôn không ngừng nỗ lực và nâng cao chất lượng sản phẩm, dịch vụ du lịch nhằm đáp ứng, đảm bảo nhu cầu của quý khách hàng.
                                        HTH Travel chân thành cảm ơn mọi người đã và đang ủng hộ chúng tôi.
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
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17130.435705489876!2d106.29244978497269!3d20.82870032771215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31359055a4943fb1%3A0xe73ef5a3e187da4f!2zSOG7k25nIEjGsG5nLCBHaWEgTOG7mWMgRGlzdHJpY3QsIEhhaSBEdW9uZywgVmlldG5hbQ!5e1!3m2!1sen!2s!4v1638759335121!5m2!1sen!2s" width="600" height="260" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

                            </div>

                        </div>
                        <div class="grid__row-1 footer__content-bottom">
                            <div class="grid__column-2">
                                <div class="footer__content-bottom-left">
                                    <span>HTH TRAVEL XIN KÍNH CHÀO QUÝ KHÁCH</span>
                                </div>
                            </div>

                            <div class="grid__column-2">
                                <div class="footer__content-bottom-right">
                                    <span>COPYRIGHT 2021 BY HTH TRAVEL</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
        <script src="./asset/js/toast.js"></script>
</body>

</html>