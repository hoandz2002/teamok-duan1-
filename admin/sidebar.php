<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300&family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito Sans', sans-serif;
        }
    </style>
</head>

<body>
    <div class="left_menu">
        <i class="icon_menu fas fa-bars"></i>
    </div>
    <div class="left_body">
        <ul class="left_list">
            <li class="left_item"><a class="left_link" href="/duan1/admin/index.php"><i class="mr-8 fas fa-tachometer-alt"></i>Dashboard</a></li>
            <li class="left_item"><a class="left_link" href="#"><i class="mr-8 fas fa-tasks"></i>Manager post<i class="fl-right fas fa-angle-right"></i></a>
                <ul class="list-child">
                    <li class="item-child"><a href="/duan1/admin/manager_post/add_mng_post.php" class="link-child"><i class="mr-8 fas fa-plus-circle"></i>Thêm</a></li>
                    <li class="item-child"><a href="/duan1/admin/manager_post/list_mng_post.php" class="link-child"><i class="mr-8 fas fa-bars"></i>Danh sách</a></li>
                </ul>
            </li>
            <li class="left_item"><a class="left_link" href="#"><i class="mr-8 fas fa-book-open"></i>Post<i class="fl-right fas fa-angle-right"></i></a>
                <ul class="list-child">
                    <li class="item-child"><a href="/duan1/admin/post/add_post.php" class="link-child"><i class="mr-8 fas fa-plus-circle"></i>Thêm</a></li>
                    <li class="item-child"><a href="/duan1/admin/post/list_post.php" class="link-child"><i class="mr-8 fas fa-bars"></i>Danh sách</a></li>
                </ul>
            </li>
            <li class="left_item"><a class="left_link" href="/duan1/admin/customer/list_customer.php"><i class="mr-8 fas fa-users"></i>Customer</a></i></li>
            <li class="left_item"><a class="left_link" href="#"><i class="mr-8 fas fa-torii-gate"></i>Tours<i class="fl-right fas fa-angle-right"></i></a>
                <ul class="list-child">
                    <li class="item-child"><a href="/duan1/admin/tours/add_tours.php" class="link-child"><i class="mr-8 fas fa-plus-circle"></i>Thêm</a></li>
                    <li class="item-child"><a href="/duan1/admin/tours/list_tours.php" class="link-child"><i class="mr-8 fas fa-bars"></i>Danh sách</a></li>
                </ul>
            </li>
            <li class="left_item"><a class="left_link" href="#"><i class="mr-8 fas fa-compass"></i>Location<i class="fl-right fas fa-angle-right"></i></a>
                <ul class="list-child">
                    <li class="item-child"><a href="/duan1/admin/location/add_location.php" class="link-child"><i class="mr-8 fas fa-plus-circle"></i>Thêm</a></li>
                    <li class="item-child"><a href="/duan1/admin/location/list_location.php" class="link-child"><i class="mr-8 fas fa-bars"></i>Danh sách</a></li>
                </ul>
            </li>
            <li class="left_item"><a class="left_link" href="#"><i class="mr-8 fab fa-servicestack"></i>Service<i class="fl-right fas fa-angle-right"></i></a>
                <ul class="list-child">
                    <li class="item-child"><a href="/duan1/admin/service/add_service.php" class="link-child"><i class="mr-8 fas fa-plus-circle"></i>Thêm</a></li>
                    <li class="item-child"><a href="/duan1/admin/service/list_service.php" class="link-child"><i class="mr-8 fas fa-bars"></i>Danh sách</a></li>
                </ul>
            </li>
            <li class="left_item"><a class="left_link" href="#"><i class="mr-8 fab fa fa-tag fa-lg"></i></i>Mã giảm giá<i class="fl-right fas fa-angle-right"></i></a>
                <ul class="list-child">
                    <li class="item-child"><a href="/duan1/admin/coupon/add_coupon.php" class="link-child"><i class="mr-8 fas fa-plus-circle"></i>Thêm</a></li>
                    <li class="item-child"><a href="/duan1/admin/coupon/list_coupon.php" class="link-child"><i class="mr-8 fas fa-bars"></i>Danh sách</a></li>
                </ul>
            </li>
            <li class="left_item"><a class="left_link" href="/duan1/admin/bill_tour/list_bill_tour.php"><i class="mr-8 fas fa-file-invoice-dollar"></i>Bill tours</a></li>
            <li class="left_item"><a class="left_link" href="/duan1/admin/comment/list_comment.php"><i style="padding-right: 8px;" class="fas fa-comments"></i>Comment</a></li>
            <li class="left_item"><a class="left_link" href="/duan1/admin/contacts/list_contacts.php"><i style="padding-right: 8px;" class="far fa-id-card"></i>Contacts</a></li>

        </ul>
    </div>
</body>

</html>