<?php
session_start();
require_once './db/connection.php';
require_once './db/tour.php';
require_once './db/service.php';
require_once './db/comment.php';
require_once './db/bill_tour.php';
$data_service = getall_service();
// var_dump($data_service);die;
$id_tours = $_GET['id_tours'];
$data = getIdTours($id_tours);
$id_locatour = $data['id_location'];
// var_dump($id_locatour);die;
$locatour = randTourLoca($id_locatour);
$data_img = getAllImage($id_tours);
$dataComment = getall_bl_id($id_tours);
if (isset($_POST['comment'])) {

    $id_tours = $_GET['id_tours'];

    $data1 = [
        'content_comment' => $_POST['content_comment'],
        'date_comment' => $_POST['date_comment'],
        'id_customer' => $_POST['id_customer'],
        'id_tours' => $_POST['id_tours'],
        'id_comment' => $_POST['id_comment'],
    ];
    // var_dump($data1);die;
    insert_comment($data1);
    header("location:/duan1/tours_detail.php?id_tours=$id_tours");
}
if (isset($_POST['addgiohang'])) {
    if (empty($_POST['quantity_pp'])) {
        $id = $_GET['id_tours'];
        $_SESSION['thongbao'] = "không được để trống số lượng người!";
        header("location: tours_detail.php?id_tours=$id");
        die;
    }
    if (empty($_POST['id_service'])) {
        $id = $_GET['id_tours'];
        $_SESSION['thongbao'] = "Mời bạn chọn dịch vụ!";
        header("location: tours_detail.php?id_tours=$id");
        die;
    }
    if (empty($_POST['date_start'])) {
        $id = $_GET['id_tours'];
        $_SESSION['thongbao'] = "Mời bạn chọn ngay dự kiến đi!";
        header("location: tours_detail.php?id_tours=$id");
        die;
    }
    $id_customer = $_SESSION['user']['id_customer'];
    $price = intval($_POST['quantity_pp']) * intval($_POST['price_tours']);
    // var_dump($price);die;
    $data = [
        'id_customer' => $_POST['id_customer'],
        'quantity_pp' => $_POST['quantity_pp'],
        'price_bill_tours' => $price,
        'id_tours' => $_POST['id_tours'],
        'date_book' => $_POST['date_book'],
        'id_service' => $_POST['id_service'],
        'date_start' => $_POST['date_start'],
        // 'bill_status' => $_POST['bill_status']
    ];
    insert_bill($data);
    // var_dump($data);die;
    header("location: ./cart.php?id_customer=$id_customer");
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

    </style>
</head>

<body>

    <div class="main">
        <?php require_once './header.php'; ?>
        <div class="body__banner" style="background-image: url(/duan1/asset/img/t-banner.jpg); padding: 10%;">
            <div class="banner-text" style="text-shadow: 0px 1px 2px green;">View Detail</div>
        </div>
        <div class="body">
            <div class="grid">
                <?php if (isset($_SESSION['thongbao'])) { ?>
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
                                    echo $_SESSION['thongbao'];
                                    unset($_SESSION['thongbao']);
                                    ?>
                                </p>
                            </div>
                            <div class="toast__close">
                                <i class='fas fa-times'></i>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="grid-with-width">
                    <form action="tours_detail.php?id_tours=<?=$data['id_tours']?>" method="POST">
                        <div class="grid__row">
                            <!-- img -->
                            <div class="pd-16 grid__column-2">
                                <img src="/duan1/asset/img/<?= $data['image'] ?>" alt="" class="img">
                                <div class="grid__row">
                                    <?php foreach ($data_img as $value) { ?>
                                        <div class="grid__column-4">
                                            <img src="/duan1/asset/img/<?= $value['images']; ?>" alt="" class="img">
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- content -->
                            <div class="pd-16 grid__column-2">
                                <h6 style="font-size: 24px;line-height:24px" class="detail-heading"><?= $data['name_tours'] ?></h6>
                                <span style="margin-top: 24px; display: block;">Địa điểm : <?= $data['name_location']; ?></span>
                                <span class="detail-price" name="price_tours"><?= number_format($data['price_tours']); ?> Đ</span>
                                <p style="font-size:20px;" class="detail-des">
                                </p>
                                <div class="pd-24 detail-qtt">
                                    <div class="grid__row" style="align-items: center;">
                                        <!-- <form action="" method="POST"> -->
                                        <p>People</p>
                                        <input type="number" name="quantity_pp" placeholder="Chọn số lượng người" style="width: 320px;padding: 8px 16px;border-radius: 16px;outline: none; border: 1px solid;">
                                        <p style="width: 50px;" hidden></p>
                                        <!-- </form> -->
                                    </div>
                                </div>
                                <div class="pd-24 detail-service">
                                    <div class="grid__row">
                                        <h2>Service</h2>
                                        <div style="flex: 1; margin: 0px 36px;">
                                            <?php foreach ($data_service as $value) { ?>
                                                <a class="accordion grid__row"><?= $value['name_service'] ?><i class="fas fa-chevron-down"></i></a>
                                                <div class="panel">
                                                    <p class="service_content"><input type="radio" name="id_service" value="<?= $value['id_service'] ?>" id="service">
                                                        <lable style="margin-left: 8px;" for="service">Chọn dịch vụ</lable>
                                                    </p>
                                                    <p class="service_content"><b>Giá</b> : <span style="color: red; font-size: 14px;"><?= $value['price_service'] ?><b>VNĐ</b></span></p>
                                                    <p style="color: blue;" class="service_content"> <?= $value['description_service'] ?></p>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <input type="text" name="id_customer" value="<?php
                                                                                if (isset($_SESSION['user'])) {
                                                                                    echo $_SESSION['user']['id_customer'];
                                                                                } else {
                                                                                }
                                                                                ?>" hidden>
                                <input type="text" name="id_tours" value="<?= $data['id_tours'] ?>" hidden>
                                <input type="text" name="price_bill_tours" value="" hidden>
                                <input type="text" name="price_tours" value="<?= $data['price_tours']; ?>" hidden>
                                <div class="pd-24 detail-qtt">
                                    <div class="grid__row" style="align-items: center;">
                                        <!-- <form action="" method="POST"> -->
                                        <p>Date start</p>
                                        <input type="date" name="date_book" value="<?php echo date('Y-m-d') ?>" hidden>
                                        <input type="date" name="date_start" style="width: 320px;padding: 8px 16px;border-radius: 16px;outline: none; border: 1px solid;">
                                        <p style="width: 50px;" hidden></p>
                                        <!-- </form> -->
                                    </div>
                                </div>
                                <div style="text-align: center; margin-top: 32px;">
                                    <?php
                                    if (isset($_SESSION['user'])) {
                                        echo '<input type="submit" name="addgiohang" class="btn" value="Đặt tours" id="">';
                                    } else {
                                        echo '<a style="font-size: 16px; color: #4c4c4c; text-decoration: none;" href="./login_form.php">Vui lòng đăng nhập để đặt tours?</a><br>';
                                        echo '<a style="font-size: 16px; color: #4c4c4c; text-decoration: none;" href="">Liên hệ ngay</a>';
                                    }
                                    ?>

                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="grid-with-width">
                    <ul class="list-child">
                        <li class="item-child" id="okK2" style="border-color: red;"><a class="link-child" onclick="myFunction2()">Reviews</a></li>
                        <li class="item-child" id="okK"><a class="link-child" onclick="myFunction()">Description</a></li>
                        <li class="item-child" id="okK1"><a class="link-child" onclick="myFunction1()">Additional information</a></li>
                    </ul>
                    <div class="content-child">
                        <div id="description-content">
                            <h6 class="description-heading">Description</h6>
                            <p class="description-p"><?= $data['description_tours'] ?></p>
                        </div>
                        <div id="information-content">
                            <h6 class="description-heading">Additional information</h6>
                            <div class="">
                                <div class="ct">
                                    <p>People</p>
                                    <i>1 people, 2 people, 3 people, 4 people</i>
                                </div>
                                <div class="ct1">
                                    <p>Included</p>
                                    <i>Drinks, Breakfast, Excursions</i>
                                </div>
                                <div class="ct">
                                    <p>Availabilit</p>
                                    <i>All Season</i>
                                </div>
                                <div class="ct1">
                                    <p>Guide Languages</p>
                                    <i>English, Italian, French, German, Spanish</i>
                                </div>
                            </div>
                        </div>
                        <div id="view-content">
                            <h6 class="description-heading">Reviews</h6>
                            <!-- Phần danh sách comment bình luận trong php -->
                            <div class="review">
                                <?php for ($i = 0; $i < count($dataComment); $i++) { ?>
                                    <div class="review-content">
                                        <div class="grid__row" style="justify-content: flex-start;">
                                            <img src="/duan1/asset/img/nav__pc.jpg" width="60px" height="60px" alt="">
                                            <div class="review-ct">
                                                <p><?= $dataComment[$i]['name_customer'] ?> - <?= $dataComment[$i]['date_comment'] ?> </p>
                                                <div class="rating">
                                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                                </div>
                                                </p>
                                                <p>
                                                    <?= $dataComment[$i]['content_comment'] ?>
                                                </p>
                                            </div>
                                            <?php
                                            if (empty($_SESSION['user']) == false) {
                                                if ($_SESSION['user']['id_customer'] == $dataComment[$i]['id_customer']) { ?>
                                                <?php }
                                                if ($_SESSION['user']['id_customer'] == $dataComment[$i]['id_customer'] || $_SESSION['user']['classify_customer'] == 1) { ?>
                                                    <a href="./db/comment/delete.php?id_comment=<?php echo $dataComment[$i]['id_comment'] ?>"><button name="delete" style="" class="btn">Xóa bình luận</button></a>
                                            <?php } else {
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>

                                <?php } ?>
                            </div>
                            <hr style="margin-top: 16px;">
                            <?php if (empty($_SESSION['user'])) { ?>
                                <div class="message" style="text-align: center; padding:20px 0px;">
                                    <span>Bạn cần đăng nhập để sử dụng chức năng bình luận</span>
                                </div>
                            <?php } else { ?>
                                <!-- <p>Add a review</p>
                            <span>Your email address will not be published. Required fields are marked *</span> -->
                                <form action="/duan1/tours_detail.php?id_tours=<?= $data['id_tours'] ?>" class="form" method="POST">
                                    <!-- <div class="form-group" style="margin-bottom: 16px;">
                                    <lable class="lable">Your rating *</lable> <br>
                                    <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                                </div> -->
                                    <div class="form-group">
                                        <lable class="lable">Your review *</lable> <br>
                                        <textarea name="content_comment" class="textarea" rows="4"></textarea>
                                    </div>
                                    <input type="date" hidden name="date_comment" value="<?php echo date('Y-m-d'); ?>">
                                    <input type="hidden" name="id_comment">
                                    <input type="hidden" name="id_customer" value="<?php if (empty($_SESSION['user']) == false) {
                                                                                        echo $_SESSION['user']['id_customer'];
                                                                                    } ?>">
                                    <input type="hidden" name="id_tours" value="<?php echo $data['id_tours'] ?>">
                                    <!-- <div class="form-group">
                                    <lable class="lable">Name *</lable> <br>
                                    <input type="text" class="input">
                                </div>
                                <div class="form-group">
                                    <lable class="lable">Email *</lable> <br>
                                    <input type="text" class="input" style="width: 40%;">
                                </div> -->
                                    <div class="form-group">
                                        <button class="btn" name="comment">Comment</button>
                                    </div>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- bottom -->
                    <div class="grid-with-width">
                        <h3 style="padding: 16px 24px; font-size: 24px;">Sản phẩm liên quan</h3>
                        <div class="grid__row">
                            <?php foreach ($locatour as $row) { ?>
                                <div class="pd-16 grid__column-4">
                                    <div class="tours-product">
                                        <img src="/duan1/asset/img/<?= $row['image'] ?>" alt="" class="img">
                                        <div class="tours-content">
                                            <h6 style="font-size: 14px;" class="tours-heading"><?= $row['name_tours']; ?></h6>
                                            <p><?= number_format($row['price_tours']); ?> Đ</p>
                                            <a href="/duan1/tours_detail.php?id_tours=<?= $row['id_tours']; ?>" class="tours-btn">SELECT OPTION</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once './footer.php'; ?>
        <script>
            function myFunction() {
                document.getElementById("description-content").style = "display: block;";
                document.getElementById("information-content").style = "display: none;";
                document.getElementById("view-content").style = "display: none;";
                document.getElementById("okK").style = "border-color: red;";
                document.getElementById("okK1").style = "border-color: black;";
                document.getElementById("okK2").style = "border-color: black;";
            }

            function myFunction1() {
                document.getElementById("description-content").style = "display: none;";
                document.getElementById("information-content").style = "display: block;";
                document.getElementById("view-content").style = "display: none;";
                document.getElementById("okK1").style = "border-color: red;";
                document.getElementById("okK").style = "border-color: black;";
                document.getElementById("okK2").style = "border-color: black;";
            }

            function myFunction2() {
                document.getElementById("description-content").style = "display: none;";
                document.getElementById("information-content").style = "display: none;";
                document.getElementById("view-content").style = "display: block;";
                document.getElementById("okK2").style = "border-color: red;";
                document.getElementById("okK").style = "border-color: black;";
                document.getElementById("okK1").style = "border-color: black;";
            }
        </script>
        <script>
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.display === "block") {
                        panel.style.display = "none";
                        panel.style = "animation: accordion ease 0.4s";
                    } else {
                        panel.style.display = "block";
                    }
                });
            }
        </script>
</body>

</html>