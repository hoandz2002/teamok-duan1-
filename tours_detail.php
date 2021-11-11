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
                            <img src="/duan1/asset/img/t-shop.jpg" alt="" class="img">
                            <div class="grid__row">
                                <div class="grid__column-4">
                                    <img src="/duan1/asset/img/t-shop.jpg" alt="" class="img">
                                </div>
                                <div class="grid__column-4">
                                    <img src="/duan1/asset/img/t-shop.jpg" alt="" class="img">
                                </div>
                                <div class="grid__column-4">
                                    <img src="/duan1/asset/img/t-shop.jpg" alt="" class="img">
                                </div>
                                <div class="grid__column-4">
                                    <img src="/duan1/asset/img/t-shop.jpg" alt="" class="img">
                                </div>
                            </div>
                        </div>
                        <!-- content -->
                        <div class="pd-16 grid__column-2">
                            <h6 class="detail-heading">Bora Bora</h6>
                            <span class="detail-price">$100.00</span>
                            <p class="detail-des">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse at felis laoreet massa cursus pulvinar. Donec non eleifend augue, id tristique nisi. Nunc in leo augue. Cras sapien quam, dictum et molestie id, ultricies.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse at felis laoreet massa cursus pulvinar. Donec non eleifend augue, id tristique nisi. Nunc in leo augue. Cras sapien quam, dictum et molestie id, ultricies.
                            </p>
                            <div class="pd-24 detail-qtt">
                                <div class="grid__row" style="align-items: center;">
                                    <form action="">
                                        <p>People</p>
                                        <select name="" id="">
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
                                <div class="grid_row" style="align-items: center;">
                                    <span>Service</span>
                                    <select name="" id="">
                                        <option value="">--Select category--</option>
                                        <option value="">1 category</option>
                                        <option value="">2 category</option>
                                        <option value="">3 category</option>
                                    </select>
                                </div>
                            </div>
                            <div style="text-align: center; margin-top: 72px;">
                                <a href="" class="btn-add">ADD TO CART</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-with-width">
                    <ul class="list-child">
                        <li class="item-child" id="okK"  style="border-color: red;"><a class="link-child" onclick="myFunction()">Description</a></li>
                        <li class="item-child" id="okK1"><a class="link-child" onclick="myFunction1()">Additional information</a></li>
                        <li class="item-child" id="okK2"><a class="link-child" onclick="myFunction2()">Reviews</a></li>
                    </ul>
                    <div class="content-child">
                        <div id="description-content">
                            <h6 class="description-heading">Description</h6>
                            <p class="description-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse at felis laoreet massa cursus pulvinar. Donec non eleifend augue, id tristique nisi. Nunc in leo augue. Cras sapien quam, dictum et molestie id, ultricies et enim. Fusce malesuada augue augue, ut sodales purus dignissim sed. Praesent dignissim placerat ligula a efficitur lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse at felis laoreet massa cursus pulvinar.</p>
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
                                <div class="review-content">
                                    <div class="grid__row" style="justify-content: flex-start;">
                                        <img src="/duan1/asset/img/nav__pc.jpg" width="60px" height="60px" alt="">
                                        <div class="review-ct">
                                            <p>Hiếu - 24/11/2021
                                            <div class="rating">
                                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            </div>
                                            </p>
                                            <p>
                                                Your email address will not be published. Required fields are marked *
                                                Add a review
                                                Your email address will not be published. Required fields are marked *
                                                Add a review
                                                Your email address will not be published. Required fields are marked *
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr style="margin-top: 16px;">
                            <!-- <p>Add a review</p>
                            <span>Your email address will not be published. Required fields are marked *</span> -->
                            <form action="" class="form">
                                <div class="form-group" style="margin-bottom: 16px;">
                                    <lable class="lable">Your rating *</lable> <br>
                                    <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                                </div>
                                <div class="form-group">
                                    <lable class="lable">Your review *</lable> <br>
                                    <textarea name="" class="textarea" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <lable class="lable">Name *</lable> <br>
                                    <input type="text" class="input">
                                </div>
                                <div class="form-group">
                                    <lable class="lable">Email *</lable> <br>
                                    <input type="text" class="input" style="width: 40%;">
                                </div>
                                <div class="form-group">
                                    <button class="btn">SUBMIT</button>
                                </div>
                            </form>
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
</body>

</html>