<?php
session_start();
require_once './admin/connect_list.php';
require_once './db/connection.php';
require_once './db/bill_tour.php';
require_once './db/coupon.php';
$id_customer = $_GET['id_customer'];
$data_ds = getIdBill($id_customer);
$dataCoupon = getAllCoupon();
if (isset($_POST['apply'])) {
    for ($i = 0; $i < count($dataCoupon); $i++) {
        $coupon = $_POST['code_coupon'];
        if ($coupon == null) {
            $_SESSION['error'] = "Mã nhập không hợp lệ!";
            header("location:/duan1/cart.php?id_customer=$id_customer");
            die;
        } else {
            $rowcount = checkCoupon($coupon);
            if ($rowcount == 0) {
                $_SESSION['error'] = "Mã nhập không hợp lệ!!";
                header("location:/duan1/cart.php?id_customer=$id_customer");
                die;
            }
        }
    }

    $id_bill_tours = $_GET['id_bill_tours'];
    foreach ($dataCoupon as $value) {

        if (strtoupper($_POST['code_coupon']) === $value['code_coupon']) {
            if ($value['number_coupon'] <= 0) {
                $_SESSION['error'] = "Số lượng mã đã hết!";
                header("location:/duan1/cart.php?id_customer=$id_customer");
                die;
            }
            $dataCompare = checkSameCoupon($id_customer);
            foreach ($dataCompare as  $value) {
                if ($_POST['code_coupon'] != null) {
                    if ($_POST['code_coupon'] === $value['code_coupon']) {
                        $_SESSION['error'] = "Bạn đã sử dụng mã này!";
                        header("location:/duan1/cart.php?id_customer=$id_customer");
                        die;
                    }
                }
            }
            $id_coupon = $value['id_coupon'];

            $data = [
                'id_bill_tours' => $id_bill_tours,
                'id_coupon' => $id_coupon,
            ];

            updateCouponInBill($data);
            $number_coupon = $value['number_coupon'] - 1;
            $data_number = [
                'id_coupon' => $id_coupon,
                'number_coupon' => $number_coupon,
            ];
            updateNumberCoupon($data_number);
            header("location:/duan1/cart.php?id_customer=$id_customer");
        }
    }
}
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
            <?php if ($data_ds == null) { ?>
                <div style="text-align: center; height: 250px; overflow-y: hidden;">
                    <img src="./asset//img/cart_error.jpg" alt="">
                </div>
                <div style="text-align: center;">
                    <h2 style=" color: #1BBC9B;">Chưa có tours nào được đặt!</h2>
                    <a href="./tours.php" class="btn" style="margin-top: 12px;">Trở lại tours</a>
                </div>
            <?php } else { ?>
                <table cellspacing="0" class="table1" style="margin: 0 auto; width: 90%;">
                    <tr class="thead" colspan="6">
                        <th>&nbsp</th>
                        <th>Ảnh</th>
                        <th>Tên Tour</th>
                        <th>Giá</th>
                        <th>Số lượng người</th>
                        <th>Sale</th>
                        <th>Ngày đặt</th>
                        <!-- <th>Loại dịch vụ</th> -->
                        <th>Giá dịch vụ</th>
                        <th>Ngày khởi hành(dự kiến)</th>
                        <th>Tổng tiền</th>
                        <th>Coupon</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                    <?php foreach ($data_ds as $ds) { ?>
                        <tr>
                            <?php
                            if ($ds['id_coupon'] != NULL) {
                                $percent_coupon = getPercentCoupon($ds['id_bill_tours']);
                                if ($percent_coupon['id_coupon'] == NULL) {
                                    $percent_coupon['percent_coupon'] = 0;
                                }
                            } else {
                                $percent_coupon = getIdBill($ds['id_customer']);
                                $percent_coupon['percent_coupon'] = 0;
                            }
                            ?>
                            <?php $total = intval($ds['price_bill_tours']) + intval($ds['price_service']) - intval($ds['price_tours']) * intval($ds['quantity_pp']) * intval($ds['sale_tours'] + $percent_coupon['percent_coupon']) / 100 ?>
                            <td><a href="./db/bill_tour/delete_bill.php?id_bill_tours=<?= $ds['id_bill_tours'] ?>"><i class="fas fa-times" style="color:red;"></i></a></td>
                            <td><img src="./asset/img/<?= $ds['image'] ?>" width="100px" alt=""></td>
                            <td style="max-width: 250px;"><?= $ds['name_tours'] ?></td>
                            <td>
                                <?php if ($ds['sale_tours'] != 0) {
                                    echo number_format($ds['price_tours'] - (($ds['price_tours'] * $ds['sale_tours']) / 100), 0, ',', '.');
                                } else {
                                    echo  number_format($ds['price_bill_tours'], 0, ',', '.');
                                } ?> Đ
                            </td>
                            <td><?= $ds['quantity_pp'] ?></td>
                            <td><?= $ds['sale_tours'] + $percent_coupon['percent_coupon']; ?>%</td>
                            <td><?= $ds['date_book'] ?></td>
                            <td><?= number_format($ds['price_service'], 0, ',', '.') ?> Đ</td>
                            <td><?= $ds['date_start'] ?></td>
                            <td><?= number_format($total, 0, ',', '.') ?> Đ</td>
                            <?php if ($ds['id_coupon'] == NULL) { ?>
                                <td>
                                    <form action="./cart.php?id_bill_tours=<?= $ds['id_bill_tours'] ?>&id_customer=<?= $ds['id_customer'] ?>" method="POST">
                                        <input type="text" name="code_coupon" style="width: 80px; margin: 0px 4px 4px; padding: 2px 4px;outline:none;" placeholder="Nhập mã">
                                        <input name="apply" type="submit" style="background-color: #1BBC9B; color: white; border: none; padding: 4px 8px;cursor:pointer;" value="Apply">
                                    </form>
                                </td>
                            <?php } else { ?>
                                <td>Đã sử dụng!</td>
                            <?php } ?>
                            <td><?php
                                if ($ds['bill_status'] == 0) {
                                    echo "Đang chờ xác nhận";
                                } else if ($ds['bill_status'] == 1) {
                                    echo "Đã xác nhận";
                                } else if (isset($_POST['btn_back']) || $ds['bill_status'] == 2) {
                                    echo "Đã thanh toán";
                                } elseif ($ds['bill_status'] == 3) {
                                    echo "Đã khởi hành";
                                } elseif ($ds['bill_status'] == 4) {
                                    echo 'Đã hoàn tất';
                                }
                                ?>
                            </td>
                            <td>
                                <form action="./successfull.php?id_customer=<?= $ds['id_customer'] ?>&id_bill_tours=<?= $ds['id_bill_tours'] ?>" method="POST">
                                    <?php if ($ds['bill_status'] == 1) { ?>
                                        <button style="width: 80px;" name="btn_payment" class="update">PAYMENT</button>
                                    <?php } ?>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } ?>
            <!-- <div style="margin-left: 780px;margin-top:100px;">
                <span style="font-size: 24px;">Cart total</span>
                <div class="table2">
                    <div class="grid__row" style="border-bottom:1px solid #9a9a9a;padding:23px 0px;color:#9a9a9a;font-size:13px">
                        <div class="grid__column-2"> Subtotal: </div>
                        <div class="grid__column-2">100000</div>
                    </div>
                    <div class="grid__row" style="padding:23px 0px;font-size:13px">
                        <div class="grid__column-2"> Subtotal:</div>
                        <div class="grid__column-2">100000</div>
                    </div>
                </div>

                <button class="submit">
                    PROCEED TO CHECKOUT
                </button>
            </div> -->
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