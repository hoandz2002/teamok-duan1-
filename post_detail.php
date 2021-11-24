<?php
require_once './db/connection.php';
require_once './db/post.php';
require_once './db/cate_post.php';
$id = $_GET['id_post'];
$post = getId_post($id);
$name = getId_cate($post['id_cate_post']);
$ok = $name['name_cate_post'];
$cate = getAll_cate();

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

    </style>
</head>

<body>
    <div class="main">
        <?php require_once './header.php'; ?>
        <div class="body__banner" style="background-image: url(/duan1/asset/img/pd-banner.jpg); padding: 10%;">
            <div class="banner-text" style="text-shadow: 0px 1px 2px green;">Post Detail</div>
        </div>
        <div class="body">
            <div class="grid">
                <div class="grid-with-width">
                    <div class="grid__row">
                        <div class="grid__column-2-3">
                            <h3 class="post_heading">
                                <?= $post['name_post'] ?>
                                <p>Loại : <?= $ok; ?></p>
                            </h3>

                            <!-- <p class="post_content">
                                Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim. Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum. Nam nulla ipsum, venenatis malesuada felis quis, ultricies convallis neque. Pellentesque tristique fringilla tempus. Vivamus bibendum nibh in dolor pharetra, a euismod nulla dignissim. Aenean viverra tincidunt nibh, in imperdiet nunc. Suspendisse eu ante pretium, consectetur leo at, congue quam. Nullam hendrerit porta ante vitae tristique. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum ligula libero, feugiat faucibus mattis eget, pulvinar et ligula.
                            </p> -->
                            <h3 class="post_heading">Nội dung</h3>
                            <p class="post_content">
                            <?= $post['description_post'] ?>
                            </p>
                            <!-- <div class="grid__row">
                                <div class="pd-16 grid__column-2">
                                    <img src="/duan1/asset/img/berlin.jpg" alt="" class="img">
                                </div>
                                <div class="pd-16 grid__column-2">
                                    <img src="/duan1/asset/img/berlin.jpg" alt="" class="img">
                                </div>
                            </div>
                            <p class="post_content">
                                Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim. Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum. Nam nulla ipsum, venenatis malesuada felis quis, ultricies convallis neque. Pellentesque tristique fringilla tempus. Vivamus bibendum nibh in dolor pharetra, a euismod nulla dignissim. Aenean viverra tincidunt nibh, in imperdiet nunc. Suspendisse eu ante pretium, consectetur leo at, congue quam. Nullam hendrerit porta ante vitae tristique. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum ligula libero, feugiat faucibus mattis eget, pulvinar et ligula.
                            </p> -->
                        </div>
                        <div class="grid__column-3">
                            <!--style="border: 1px solid grey;"-->
                            <div class="sider-bar">
                                <div class="pd-16 cate_heading">Danh mục bài viết</div>
                                <ul class="cate-list">
                                    <?php foreach ($cate as $ds) { ?>
                                        <li class="cate-item"><a href="/duan1/post_cate.php?id_cate_post=<?= $ds['id_cate_post']; ?>"><?= $ds['name_cate_post']; ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="sider-bar">
                                <div class="pd-16 cate_heading">Bài viết liên quan</div>
                                <div class="pd-16 post">
                                    <div class="grid grid__row">
                                        <div class="grid__column-3">
                                            <img src="/duan1/asset/img/berlin.jpg" alt="" class="img">
                                        </div>
                                        <div class="grid__column-2-3">
                                            <div class="grid__column">
                                                <p class="post-name">Heloomairen Heloomairen Heloomairen</p>
                                                <a href="/duan1/post_detail.php" class="btn-small">Xem</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid__row">
                                        <div class="grid__column-3">
                                            <img src="/duan1/asset/img/berlin.jpg" alt="" class="img">
                                        </div>
                                        <div class="grid__column-2-3">
                                            <div class="grid__column">
                                                <p class="post-name">Heloomairen Heloomairen Heloomairen</p>
                                                <a href="/duan1/post_detail.php" class="btn-small">Xem</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid__row">
                                        <div class="grid__column-3">
                                            <img src="/duan1/asset/img/berlin.jpg" alt="" class="img">
                                        </div>
                                        <div class="grid__column-2-3">
                                            <div class="grid__column">
                                                <p class="post-name">Heloomairen Heloomairen Heloomairen</p>
                                                <a href="/duan1/post_detail.php" class="btn-small">Xem</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid__row">
                                        <div class="grid__column-3">
                                            <img src="/duan1/asset/img/berlin.jpg" alt="" class="img">
                                        </div>
                                        <div class="grid__column-2-3">
                                            <div class="grid__column">
                                                <p class="post-name">Heloomairen Heloomairen Heloomairen</p>
                                                <a href="/duan1/post_detail.php" class="btn-small">Xem</a>
                                            </div>
                                        </div>
                                    </div>

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