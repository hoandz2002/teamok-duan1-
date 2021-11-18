<?php
require_once './../db/connection.php';
require_once './../db/cate_post.php';
require_once './../db/post.php';
require_once './../db/location.php';
require_once './../db/tour.php';
require_once './../db/service.php';
require_once './../db/customer.php';
require_once './../db/bill_tour.php';
require_once './../db/comment.php';
$tour = getAllTours();
$post = getAll_post();
$location = getall_location();
$comment = getall_comment();
$bill = getall_bill();
$customer = getall_customer();
$cate = getAll_cate();
$service = getall_service();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./../asset/fonts/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="./../asset/css/css_admin/main.css">
    <link rel="stylesheet" href="./../asset/css/css_admin/index.css">
    <style>

    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="left">
                <?php require_once './sidebar.php'; ?>
            </div>
            <!--left : siderbar-->
            <div class="right">
                <?php require_once './header.php'; ?>
                <!-- Nội dung ở đây  -->
                <div class="right-heading">
                    <h2>Thống kê số lượng</h2>
                </div>
                <div class="right_body">
                    <div class="box" style="background-color: #99CC33;">
                        <i class="box-icon fas fa-users"></i>
                        <div class="box-name">Customer</div>
                        <div class="box-quantity"> <?php echo count($customer);?></div>
                    </div>
                    <div class="box" style="background-color: #999999;">
                        <i class="box-icon fas fa-torii-gate"></i>
                        <div class="box-name">Tours</div>
                        <div class="box-quantity"> <?php echo count($tour);?></div>
                    </div>
                    <div class="box" style="background-color: #990066;">
                        <i class="box-icon fas fa-compass"></i>
                        <div class="box-name">Location</div>
                        <div class="box-quantity"> <?php echo count($location);?></div>
                    </div>
                    <div class="box" style="background-color: #FFCC66;">
                        <i class="box-icon fab fa-servicestack"></i>
                        <div class="box-name">Service</div>
                        <div class="box-quantity"> <?php echo count($service);?></div>
                    </div>
                    <div class="box" style="background-color: #005500;">
                        <i class="box-icon fas fa-file-invoice-dollar"></i>
                        <div class="box-name">Bill Tours</div>
                        <div class="box-quantity"> <?php echo count($bill);?></div>
                    </div>
                    <div class="box" style="background-color: #339966;">
                        <i class="box-icon fas fa-book-open"></i>
                        <div class="box-name">Post</div>
                        <div class="box-quantity"> <?php echo count($post);?></div>
                    </div>
                    <div class="box" style="background-color: #FF3366;">
                        <i class="box-icon fas fa-tasks"></i>
                        <div class="box-name">Manage post</div>
                        <div class="box-quantity"> <?php echo count($cate);?></div>
                    </div>
                    <div class="box" style="background-color: #FE0805;">
                        <i class="box-icon fas fa-comment"></i>
                        <div class="box-name">Comment</div>
                        <div class="box-quantity"> <?php echo count($comment);?></div>
                    </div>
                </div>
                <?php require_once './footer.php'; ?>
            </div>
            <!--right : content-->
        </div>
    </div>
</body>

</html>