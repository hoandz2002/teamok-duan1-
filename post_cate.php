<?php
require_once './db/connection.php';
require_once './db/post.php';
require_once './db/cate_post.php';
$id = $_GET['id_cate_post'];
$name = getId_cate($id);
$getAllId = getAllId($id);
$ok = $name['name_cate_post'];
// var_dump($getAllId);die;
// var_dump($name['name_cate_post']);die;
?>
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
                <h1 style="padding-left: 12px;"><?php echo $ok; ?></h1>
                <div class="grid__row">
                    <?php foreach ($getAllId as $ds) { ?>
                        <div class="grid__row pd-16 grid__column-2">
                            <div class="grid__column-2">
                                <img src="/duan1/asset/img/<?= $ds['image_post']; ?>" alt="" class="img">
                            </div>
                            <div class="pd-24 grid__column-2" style="background-color: #1bbc9b;">
                                <div class="post-heading">
                                    <p>TRAVEL TIPS</p>
                                    <h2><?= $ds['name_post']; ?></h2>
                                    <span style="overflow: hidden;
  display: -webkit-box;
  -webkit-box-orient: vertical;
  -webkit-line-clamp: 5;">
                                        <?= $ds['description_post']; ?>
                                    </span>
                                </div>
                                <a href="/duan1/post_detail.php?id_post=<?= $ds['id_post']; ?>" class="btn" style="padding: 8px 16px; margin-top: 20px; font-size: 10px;">Xem Ngay</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php require_once './footer.php'; ?>
</body>

</html>