<?php
session_start();
require_once './db/connection.php';
require_once './db/tour.php';
require_once './db/service.php';
require_once './db/comment.php';
$data_service = getall_service();
// var_dump($data_service);die;
$id_tours = $_GET['id_tours'];
$data = getIdTours($id_tours);
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
    <style>

    </style>
</head>
<body>
  
  <div class="main">
        <?php require_once './header.php'; ?>
        <div class="body__banner" style="background-image: url(/duan1/asset/img/t-banner.jpg); padding: 10%;">
            <div class="banner-text" style="text-shadow: 0px 1px 2px green;">Shop Detail</div>
        </div>
        <div class="body">
            <div class="grid">
                <div class="grid-with-width">
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
                        <input type="hidden" name="image" value="<?= $data['image'] ?>" hidden>
                        
                        <input type="text" name="name_tours"  value="<?= $data['name_tours'] ?>" hidden>
                        <input type="number" name="price_tours"  value="<?= $data['price_tours'] ?>" hidden>
                        <!-- content -->
                        <div class="pd-16 grid__column-2">
                            <h6 style="font-size: 24px;line-height:24px" class="detail-heading"><?= $data['name_tours'] ?></h6>
                            <span class="detail-price"><?= $data['price_tours']; ?> Đ</span>
                            <p style="font-size:20px;" class="detail-des">
                            </p>
                            <div class="pd-24 detail-qtt">
                                <div class="grid__row" style="align-items: center;">
                                    <form action="" method="POST">
                                        <p>People</p>
                                        <select name="quantity_pp" id="">
                                            <option value="">--Select people--</option>
                                            <option value="1">1 people</option>
                                            <option value="2">2 people</option>
                                            <option value="3">3 people</option>
                                        </select>
                                        <button type="reset">Clear</button>
                                    </form>
                                </div>
                            </div>
                            <div class="pd-24 detail-service">
                                <div class="grid__row">
                                    <h2>Service</h2>
                                    <div style="flex: 1; margin: 0px 36px;">
                                        <?php foreach ($data_service as $value) { ?>
                                            <a class="accordion grid__row"><?= $value['name_service'] ?><i class="fas fa-chevron-down"></i></a>
                                            <div class="panel">
                                            <p class="service_content"><input type="radio" name="id_service" id="service"><lable style="margin-left: 8px;" for="service">Chọn dịch vụ</lable></p>
                                                <p class="service_content">Giá : <?= $value['price_service'] ?>VND</p>
                                                <p class="service_content"> <?= $value['description_service'] ?></p>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: center; margin-top: 72px;">
                            <input type="submit" name="addgiohang" class="cart-btn" value="Add to cart" id="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-with-width">
                    <ul class="list-child">
                        <li class="item-child" id="okK" style="border-color: red;"><a class="link-child" onclick="myFunction()">Description</a></li>
                        <li class="item-child" id="okK1"><a class="link-child" onclick="myFunction1()">Additional information</a></li>
                        <li class="item-child" id="okK2"><a class="link-child" onclick="myFunction2()">Reviews</a></li>
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
                                        </div>
                                        <?php
                                        if (empty($_SESSION['user']) == false) {
                                            if ($_SESSION['user']['id_customer'] == $dataComment[$i]['id_customer']) { ?>
                                                <a href="/duan1/db/comment/update.php?id_tours=<?= $dataComment[$i]['id_tours'] ?>"><button name="update" style="margin-top:30px;margin-left:880px" class="btn">Sửa bình luận</button></a>
                                            <?php }
                                            if ($_SESSION['user']['id_customer'] == $dataComment[$i]['id_customer'] || $_SESSION['user']['vai_tro'] == 0) { ?>
                                                <a href="./db/comment/delete.php?id_comment=<?php echo $dataComment[$i]['id_comment'] ?>"><button name="delete" style="" class="btn">Xóa bình luận</button></a>
                                        <?php } else {
                                            }
                                        }
                                        ?>
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
                        <h3 style="padding: 16px 24px; font-size: 24px;">Related products</h3>
                        <div class="grid__row">
                            <div class="pd-16 grid__column-4">
                                <div class="tours-product">
                                    <img src="/duan1/asset/img/t-shop.jpg" alt="" class="img">
                                    <div class="tours-content">
                                        <h6 class="tours-heading">Redamancy</h6>
                                        <p>$1,000.00</p>
                                        <a href="" class="tours-btn">SELECT OPTION</a>
                                    </div>
                                </div>
                            </div>
                            <div class="pd-16 grid__column-4">
                                <div class="tours-product">
                                    <img src="/duan1/asset/img/t-shop.jpg" alt="" class="img">
                                    <div class="tours-content">
                                        <h6 class="tours-heading">Redamancy</h6>
                                        <p>$1,000.00</p>
                                        <a href="" class="tours-btn">SELECT OPTION</a>
                                    </div>
                                </div>
                            </div>
                            <div class="pd-16 grid__column-4">
                                <div class="tours-product">
                                    <img src="/duan1/asset/img/t-shop.jpg" alt="" class="img">
                                    <div class="tours-content">
                                        <h6 class="tours-heading">Redamancy</h6>
                                        <p>$1,000.00</p>
                                        <a href="" class="tours-btn">SELECT OPTION</a>
                                    </div>
                                </div>
                            </div>
                            <div class="pd-16 grid__column-4">
                                <div class="tours-product">
                                    <img src="/duan1/asset/img/t-shop.jpg" alt="" class="img">
                                    <div class="tours-content">
                                        <h6 class="tours-heading">Redamancy</h6>
                                        <p>$1,000.00</p>
                                        <a href="" class="tours-btn">SELECT OPTION</a>
                                    </div>
                                </div>
                            </div>
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