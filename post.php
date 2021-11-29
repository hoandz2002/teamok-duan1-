<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài viết</title>
    <link rel="stylesheet" href="/duan1/asset/fonts/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="/duan1/asset/css/base.css">
    <link rel="stylesheet" href="/duan1/asset/css/main.css">
    <link rel="stylesheet" href="/duan1/asset/css/post.css">
    <link rel="stylesheet" href="/duan1/asset/css/responsive.css">
    <style>
        .grid__column-2 {
            width: 50%;
            height: 234px;
            overflow: hidden;
        }
    </style>
</head>

<body>
    <div class="main">
        <?php require_once './header.php'; ?>
        <div class="body__banner" style="background-image: url(/duan1/asset/img/pt-banner.jpg); padding: 10%;">
            <div class="banner-text">Our Post</div>
        </div>
        <div class="body">
            <div class="grid">
                <div class="grid__row">
                    <div class="grid__row pd-16 grid__column-2">
                        <div class="grid__column-2">
                            <img src="/duan1/asset/img/blog-4.jpg" alt="" class="img">
                        </div>
                        <div class="pd-24 grid__column-2" style="background-color: #1bbc9b;">
                            <div class="post-heading">
                                <p>Danh Mục</p>
                                <h2>Tin Tức</h2>
                                <span>
                                    Cập nhật nhanh chóng tin tức liên quan về du lịch.
                                </span>
                            </div>
                            <a href="/duan1/post_cate.php?id_cate_post=1" class="btn" style="padding: 8px 16px; margin-top: 20px; font-size: 10px;">Xem Thêm</a>
                        </div>
                    </div>
                    <div class="grid__row pd-16 grid__column-2">
                        <div class="grid__column-2">
                            <img src="/duan1/asset/img/blog-3.jpg" alt="" class="img">
                        </div>
                        <div class="pd-24 grid__column-2" style="background-color: #BA71DA;">
                            <div class="post-heading">
                                <p>Danh Mục</p>
                                <h2>Cẩm Nang</h2>
                                <span>
                                    Cung cấp cho bạn nhiều cẩm nang du lịch hay và những mẹo khi đi du lịch
                                </span>
                            </div>
                            <a href="/duan1/post_cate.php?id_cate_post=2" class="btn" style="padding: 8px 16px; margin-top: 20px; font-size: 10px;">Xem Thêm</a>
                        </div>
                    </div>
                    <div class="grid__row pd-16 grid__column-2">
                        <div class="grid__column-2">
                            <img src="/duan1/asset/img/blog-2.jpg" alt="" class="img">
                        </div>
                        <div class="pd-24 grid__column-2" style="background-color: #ffffff;">
                            <div class="post-heading"  style=" color: black;">
                                <p>Danh Mục</p>
                                <h2>Sự Kiện</h2>
                                <span>
                                    Sự kiện khuyến mãi giảm giá hấp dẫn của công ty.
                                </span>
                            </div>
                            <a href="/duan1/post_cate.php?id_cate_post=3" class="btn" style="padding: 8px 16px; margin-top: 20px; font-size: 10px;">Xem Thêm</a>
                        </div>
                    </div>
                    <div class="grid__row pd-16 grid__column-2">
                        <div class="grid__column-2">
                            <img src="/duan1/asset/img/blog-1.jpg" alt="" class="img">
                        </div>
                        <div class="pd-24 grid__column-2" style="background-color: #14B9D5;">
                            <div class="post-heading">
                                <p>Danh Mục</p>
                                <h2>Kiến Thức</h2>
                                <span>
                                    Kiến thức cơ bản cho những người mới bắt đầu trải nghiệm du lịch.
                                </span>
                            </div>
                            <a href="/duan1/post_cate.php?id_cate_post=4" class="btn" style="padding: 8px 16px; margin-top: 20px; font-size: 10px;">Xem Thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once './footer.php'; ?>
</body>

</html>