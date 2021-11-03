<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./../asset/fonts/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="./../asset/css/css_admin/index.css">
    <link rel="stylesheet" href="./../asset/css/css_admin/main.css">
    <style>

    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="left">
                <div class="left_menu">
                    <i class="icon_menu fas fa-bars"></i>
                </div>
                <div class="left_body">
                    <ul class="left_list">
                        <li class="left_item"><a class="left_link" href=""><i class="mr-8 fas fa-tachometer-alt"></i>Dashboard</a></li>
                        <li class="left_item"><a class="left_link" href=""><i class="mr-8 fas fa-tasks"></i>Manager post<i class="fl-right fas fa-angle-right"></i></a>
                            <ul class="list-child">
                                <li class="item-child"><a href="" class="link-child"><i class="mr-8 fas fa-plus-circle"></i>Create</a></li>
                                <li class="item-child"><a href="" class="link-child"><i class="mr-8 fas fa-bars"></i>Manage</a></li>
                            </ul>
                        </li>
                        <li class="left_item"><a class="left_link" href=""><i class="mr-8 fas fa-book-open"></i>Post<i class="fl-right fas fa-angle-right"></i></a>
                            <ul class="list-child">
                                <li class="item-child"><a href="" class="link-child"><i class="mr-8 fas fa-plus-circle"></i>Create</a></li>
                                <li class="item-child"><a href="" class="link-child"><i class="mr-8 fas fa-bars"></i>Manage</a></li>
                            </ul>
                        </li>
                        <li class="left_item"><a class="left_link" href=""><i class="mr-8 fas fa-user"></i>Employee<i class="fl-right fas fa-angle-right"></i></a>
                            <ul class="list-child">
                                <li class="item-child"><a href="" class="link-child"><i class="mr-8 fas fa-plus-circle"></i>Create</a></li>
                                <li class="item-child"><a href="" class="link-child"><i class="mr-8 fas fa-bars"></i>Manage</a></li>
                            </ul>
                        </li>
                        <li class="left_item"><a class="left_link" href=""><i class="mr-8 fas fa-users"></i>Customer</a></i></li>
                        <li class="left_item"><a class="left_link" href=""><i class="mr-8 fas fa-torii-gate"></i>Tours<i class="fl-right fas fa-angle-right"></i></a>
                            <ul class="list-child">
                                <li class="item-child"><a href="" class="link-child"><i class="mr-8 fas fa-plus-circle"></i>Create</a></li>
                                <li class="item-child"><a href="" class="link-child"><i class="mr-8 fas fa-bars"></i>Manage</a></li>
                            </ul>
                        </li>
                        <li class="left_item"><a class="left_link" href=""><i class="mr-8 fas fa-compass"></i>Location<i class="fl-right fas fa-angle-right"></i></a>
                            <ul class="list-child">
                                <li class="item-child"><a href="" class="link-child"><i class="mr-8 fas fa-plus-circle"></i>Create</a></li>
                                <li class="item-child"><a href="" class="link-child"><i class="mr-8 fas fa-bars"></i>Manage</a></li>
                            </ul>
                        </li>
                        <li class="left_item"><a class="left_link" href=""><i class="mr-8 fab fa-servicestack"></i>Service<i class="fl-right fas fa-angle-right"></i></a>
                            <ul class="list-child">
                                <li class="item-child"><a href="" class="link-child"><i class="mr-8 fas fa-plus-circle"></i>Create</a></li>
                                <li class="item-child"><a href="" class="link-child"><i class="mr-8 fas fa-bars"></i>Manage</a></li>
                            </ul>
                        </li>
                        <li class="left_item"><a class="left_link" href=""><i class="mr-8 fas fa-file-invoice-dollar"></i>Bill tours</a></li>
                    </ul>
                </div>
            </div>
            <!--left : siderbar-->
            <div class="right">
                <div class="right_header">
                    <div class="header-bgr">
                        <img src="./../asset/img/logohthtravel.png" alt="" class="header-img">
                        <p class="header-heading">
                            TRAVEL MANAGEMENT SYSTEM
                        </p>
                    </div>
                    <div class="header-name">
                        <p>Tài khoản của admin <i class="fas fa-angle-down"></i></p>
                    </div>
                </div>
                <div class="right_nav">
                    <p class="nav_title">Home</p>
                </div>
                <div class="right-heading">
                    <h2>Thống kê số lượng</h2>
                </div>
                <div class="right_body">
                    <div class="box" style="background-color: #99CC33;">
                        <i class="box-icon fas fa-users"></i>
                        <div class="box-name">Customer</div>
                        <div class="box-quantity">7</div>
                    </div>
                    <div class="box" style="background-color: #CC99FF;">
                        <i class="box-icon fas fa-user"></i>
                        <div class="box-name">Employee</div>
                        <div class="box-quantity">7</div>
                    </div>
                    <div class="box" style="background-color: #999999;">
                        <i class="box-icon fas fa-user"></i>
                        <div class="box-name">Tours</div>
                        <div class="box-quantity">7</div>
                    </div>
                    <div class="box" style="background-color: #990066;">
                        <i class="box-icon fas fa-compass"></i>
                        <div class="box-name">Location</div>
                        <div class="box-quantity">7</div>
                    </div>
                    <div class="box" style="background-color: #FFCC66;">
                        <i class="box-icon fab fa-servicestack"></i>
                        <div class="box-name">Service</div>
                        <div class="box-quantity">7</div>
                    </div>
                    <div class="box" style="background-color: #005500;">
                        <i class="box-icon fas fa-file-invoice-dollar"></i>
                        <div class="box-name">Bill Tours</div>
                        <div class="box-quantity">7</div>
                    </div>
                    <div class="box" style="background-color: #339966;">
                        <i class="box-icon fas fa-book-open"></i>
                        <div class="box-name">Post</div>
                        <div class="box-quantity">7</div>
                    </div>
                    <div class="box" style="background-color: #FF3366;">
                        <i class="box-icon fas fa-tasks"></i>
                        <div class="box-name">Manage post</div>
                        <div class="box-quantity">7</div>
                    </div>
                </div>
                <div class="right_footer">
                    <h3>HTH Travel Việt Nam</h3>
                    <P>HTH Travel @2021.Design Hiếu-Trọng-Hoàn</P>
                </div>
            </div>
            <!--right : content-->
        </div>
    </div>
</body>

</html>