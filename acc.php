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
                        <input type="text" value="<?= $_SESSION['user']['cmt_customer']; ?>" class="input" disabled>
                    </div>
                </div>
                <div id="update" style="display: none;">
                    <form action="account.php" method="post">
                        <div class="form">
                            <lable class="lable">ID</lable> <br>
                            <input type="text" value="<?= $_SESSION['user']['id_customer']; ?>" class="input">
                        </div>
                        <div class="form">
                            <lable class="lable">Email</lable> <br>
                            <input type="text" value="<?= $_SESSION['user']['email_customer']; ?>" class="input">
                        </div>
                        <div class="form">
                            <lable class="lable">Name</lable> <br>
                            <input type="text" value="<?= $_SESSION['user']['name_customer']; ?>" class="input">
                        </div>
                        <div class="form">
                            <lable class="lable">Phone</lable> <br>
                            <input type="text" value="<?= $_SESSION['user']['phone_customer']; ?>" class="input">
                        </div>
                        <div class="form">
                            <lable class="lable">CMT</lable> <br>
                            <input type="text" value="<?= $_SESSION['user']['cmt_customer']; ?>" class="input">
                        </div>
                        <div class="form">
                            <input type="submit" name="btn-up" class="btn-submit" value="Cập nhật">
                        </div>
                    </form>
                </div>
                <div id="pass" style="display: none;">
                    <form action="account.php" method="post">
                        <div class="form">
                            <lable class="lable">Nhập mật khẩu cũ</lable> <br>
                            <input type="text" class="input">
                        </div>
                        <div class="form">
                            <lable class="lable">Nhập mật khẩu mới</lable> <br>
                            <input type="text" class="input">
                        </div>
                        <div class="form">
                            <lable class="lable">Nhập lại mật khẩu mới</lable> <br>
                            <input type="text" class="input">
                        </div>
                        <div class="form">
                            <input type="submit" name="btn-up" class="btn-submit" value="Cập nhật">
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