<?php
require_once './db/connection.php';
require_once './db/post.php';
require_once './db/cate_post.php';
$id = $_GET['id_post'];
$post = getId_post($id);
$name = getId_cate($post['id_cate_post']);
$ok = $name['name_cate_post'];
$cate = getAll_cate();
$postcate = get4Id($post['id_cate_post']);
// var_dump($postcate);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Detail</title>
    <link rel="stylesheet" href="/duan1/asset/fonts/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="/duan1/asset/css/base.css">
    <link rel="stylesheet" href="/duan1/asset/css/main.css">
    <link rel="stylesheet" href="/duan1/asset/css/post_detail.css">
    <link rel="stylesheet" href="/duan1/asset/css/responsive.css">
    <style>
        .post-name {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }
    </style>
</head>

<body>
    <div class="main">
        <?php require_once './header.php'; ?>
        <div class="body__banner" style="background-image: url(/duan1/asset/img/pd-banner.jpg); padding: 10%;">
            <div class="banner-text" style="text-shadow: 0px 1px 2px green;">Chi tiết bài viết</div>
        </div>
        <div class="body">
            <div class="grid">
                <div class="grid-with-width">
                    <div class="grid__row">
                        <div class="grid__column-2-3" style="overflow: hidden;">
                            <h3 class="post_heading">
                                <?= $post['name_post'] ?>
                                <p>Loại : <?= $ok; ?></p>
                            </h3>
                            <h3 class="post_heading">Nội dung</h3>
                            <div style="text-align: left; font-size:10px" class="post_content">
                                <?= $post['description_post'] ?>
                            </div>
                        </div>
                        <div class="grid__column-3">
                            <div class="slider-bar">
                                <div class="pd-16 cate_heading">Danh mục bài viết</div>
                                <ul class="cate-list">
                                    <?php foreach ($cate as $ds) { ?>
                                        <li class="cate-item"><a href="/duan1/post_cate.php?id_cate_post=<?= $ds['id_cate_post']; ?>"><?= $ds['name_cate_post']; ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="slider-bar">
                                <div class="pd-16 cate_heading">Bài viết liên quan</div>
                                <div class="pd-16 post">
                                    <?php foreach ($postcate as $row) { ?>
                                        <div class="grid grid__row">
                                            <div class="grid__column-3">
                                                <img src="/duan1/asset/img/<?= $row['image_post'] ?>" alt="" class="img">
                                            </div>
                                            <div class="grid__column-2-3">
                                                <div class="grid__column">
                                                    <p class="post-name"><?= $row['name_post'] ?></p>
                                                    <a href="/duan1/post_detail.php?id_post=<?= $row['id_post'] ?>" class="btn-small">Xem</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once './footer.php'; ?>
</body>

</html>