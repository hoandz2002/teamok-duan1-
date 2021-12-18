<?php
session_start();
require_once './db/connection.php';
require_once './db/customer.php';
$id_customer = $_SESSION['user']['id_customer'];
if (isset($_POST['btn-up'])) {
    if (
        empty($_POST['name_customer']) ||
        empty($_POST['address_customer']) ||
        empty($_POST['phone_customer']) ||
        empty($_POST['email_customer'])
    ) {
        $_SESSION['thongbao'] = "Không được để trống";
        header("location: ./acc.php?id_customer=$id_customer");
        die;
    }
    if (!filter_var($_POST['email_customer'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['thongbao'] = "Nhập đúng định dạng email";
        header("location: ./acc.php?id_customer=$id_customer");
        die;
    }
    if (!is_numeric($_POST['phone_customer'])) {
        $_SESSION['thongbao'] = "Nhập đúng định dạng số điện thoại";
        header("location: ./acc.php?id_customer=$id_customer");
        die;
    }
    $data = [
        'id_customer' => $_POST['id_customer'],
        'name_customer' => $_POST['name_customer'],
        'address_customer' => $_POST['address_customer'],
        'phone_customer' => $_POST['phone_customer'],
        'email_customer' => $_POST['email_customer']
    ];
    update_customer($data);
    header("location: ./acc.php");
}
if (isset($_POST['btn-pass'])) {
    if (
        empty($_POST['password_old']) ||
        empty($_POST['password']) ||
        empty($_POST['re_password'])

    ) {
        $_SESSION['thongbao'] = "Không được để trống mật khẩu!";
        header("location: ./acc.php?id_customer=$id_customer");
        die;
    }
    if ($_POST['password_old'] != $_SESSION['user']['password']) {
        $_SESSION['thongbao'] = "Mật khẩu cũ không chính xác!";
        header("location: ./acc.php?id_customer=$id_customer");
        die;
    }
    if ($_POST['re_password'] != $_POST['password']) {
        $_SESSION['thongbao'] = "Mật khẩu mới không khớp với nhau!";
        header("location: ./acc.php?id_customer=$id_customer");
        die;
    }
    $data_pass = [
        'id_customer' => $_POST['id_customer'],
        'password' => $_POST['password']
    ];
    update_customer_pass($data_pass);
    header("location: ./acc.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location Detail</title>
    <link rel="stylesheet" href="/duan1/asset/fonts/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="/duan1/asset/css/base.css">
    <link rel="stylesheet" href="/duan1/asset/css/main.css">
    <!-- <link rel="stylesheet" href="/duan1/asset/css/index.css"> -->
    <link rel="stylesheet" href="/duan1/asset/css/location_detail.css">
    <link rel="stylesheet" href="/duan1/asset/css/responsive.css">
    <link rel="stylesheet" href="/duan1/asset/css/css_admin/error_mess.css">
    <style>
        .list-btn {
            list-style: none;
            height: auto;
            display: block;
            height: 32px;
            width: 100%;
            text-align: center;
        }

        .item-btn {
            display: inline-block;
            margin: 0px 32px;
            border-bottom: 1px solid black;
        }

        #acc,
        #update,
        #pass {
            flex: 1;
        }

        .form {
            width: 100%;
            margin-bottom: 12px;
        }

        .lable,
        .link-btn {
            font-size: 16px;
        }

        .input {
            width: 96%;
            padding: 12px 24px;
            border-radius: 16px;
            border: 1px solid black;
            outline: none;
        }

        .btn-submit {
            padding: 8px 24px;
            border: none;
            border-radius: 16px;
            background-color: lightblue;
        }
    </style>
</head>

<body>
    <div class="main">
        <?php require_once './header.php'; ?>
        <div class="body__banner" style="background-image: url(/duan1/asset/img/lc-banner.jpg); padding: 10%;">
            <div class="banner-text" style="text-shadow: 0px 1px 2px green;">Thông tin</div>
        </div>
        <div class="body">
            <?php if (isset($_SESSION['thongbao'])) { ?>
                <div id="toast" style="top: 70px;">
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
            <div class="grid">
                <ul class="list-btn">
                    <li class="item-btn" id="okK" style="border-color: red;"><a class="link-btn" onclick="myFunction()">Thông tin</a></li>
                    <li class="item-btn" id="okK1"><a class="link-btn" onclick="myFunction1()">Cập nhật tài khoản</a></li>
                    <li class="item-btn" id="okK2"><a class="link-btn" onclick="myFunction2()">Cập nhật mật khẩu</a></li>
                </ul>
                <div id="acc">
                    <div class="form">
                        <lable class="lable">ID</lable> <br>
                        <input type="text" value="<?= $_SESSION['user']['id_customer']; ?>" class="input" disabled>
                    </div>
                    <div class="form">
                        <lable class="lable">Email</lable> <br>
                        <input type="text" value="<?= $_SESSION['user']['email_customer']; ?>" class="input" disabled>
                    </div>
                    <div class="form">
                        <lable class="lable">Name</lable> <br>
                        <input type="text" value="<?= $_SESSION['user']['name_customer']; ?>" class="input" disabled>
                    </div>
                    <div class="form">
                        <lable class="lable">Phone</lable> <br>
                        <input type="text" value="<?= $_SESSION['user']['phone_customer']; ?>" class="input" disabled>
                    </div>
                    <div class="form">
                        <lable class="lable">CMT</lable> <br>
                        <input type="text" value="<?= $_SESSION['user']['address_customer']; ?>" class="input" disabled>
                    </div>
                </div>
                <div id="update" style="display: none;">
                    <form action="acc.php?id_customer=<?= $_SESSION['user']['id_customer'] ?>" method="post">
                        <div class="form">
                            <lable class="lable">ID</lable> <br>
                            <input type="text" name="id_customer" value="<?= $_SESSION['user']['id_customer']; ?>" class="input">
                        </div>
                        <div class="form">
                            <lable class="lable">Email</lable> <br>
                            <input type="text" name="email_customer" value="<?= $_SESSION['user']['email_customer']; ?>" class="input">
                        </div>
                        <div class="form">
                            <lable class="lable">Name</lable> <br>
                            <input type="text" name="name_customer" value="<?= $_SESSION['user']['name_customer']; ?>" class="input">
                        </div>
                        <div class="form">
                            <lable class="lable">Phone</lable> <br>
                            <input type="text" name="phone_customer" value="<?= $_SESSION['user']['phone_customer']; ?>" class="input">
                        </div>
                        <div class="form">
                            <lable class="lable">CMT</lable> <br>
                            <input type="text" name="address_customer" value="<?= $_SESSION['user']['address_customer']; ?>" class="input">
                        </div>
                        <div class="form">
                            <input type="submit" name="btn-up" class="btn-submit" value="Cập nhật">
                        </div>
                    </form>
                </div>
                <div id="pass" style="display: none;">
                    <form action="acc.php?id_customer=<?= $_SESSION['user']['id_customer'] ?>" method="post">
                        <input type="hidden" name="id_customer" value="<?= $_SESSION['user']['id_customer']; ?>" class="input">
                        <div class="form">
                            <lable class="lable">Nhập mật khẩu cũ</lable> <br>
                            <input type="password" name="password_old" class="input">
                        </div>
                        <div class="form">
                            <lable class="lable">Nhập mật khẩu mới</lable> <br>
                            <input type="password" name="password" class="input">
                        </div>
                        <div class="form">
                            <lable class="lable">Nhập lại mật khẩu mới</lable> <br>
                            <input type="password" name="re_password" class="input">
                        </div>
                        <div class="form">
                            <input type="submit" name="btn-pass" class="btn-submit" value="Cập nhật">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php require_once './footer.php'; ?>
        <script>
            function myFunction() {
                document.getElementById("acc").style = "display: block;";
                document.getElementById("update").style = "display: none;";
                document.getElementById("pass").style = "display: none;";
                document.getElementById("okK").style = "border-color: red;";
                document.getElementById("okK1").style = "border-color: black;";
                document.getElementById("okK2").style = "border-color: black;";
            }

            function myFunction1() {
                document.getElementById("acc").style = "display: none;";
                document.getElementById("update").style = "display: block;";
                document.getElementById("pass").style = "display: none;";
                document.getElementById("okK1").style = "border-color: red;";
                document.getElementById("okK").style = "border-color: black;";
                document.getElementById("okK2").style = "border-color: black;";
            }

            function myFunction2() {
                document.getElementById("acc").style = "display: none;";
                document.getElementById("update").style = "display: none;";
                document.getElementById("pass").style = "display: block;";
                document.getElementById("okK2").style = "border-color: red;";
                document.getElementById("okK").style = "border-color: black;";
                document.getElementById("okK1").style = "border-color: black;";
            }
        </script>
</body>

</html>