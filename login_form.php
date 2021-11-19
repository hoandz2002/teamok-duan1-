<?php
session_start();
require_once "./db/customer.php";
require_once "./db/connection.php";

if (isset($_POST['btn_khongthich'])) {
    if (
        empty($_POST['email_customer']) ||
        empty($_POST['password'])
    ) {
        $_SESSION['thongbao'] = "Không được để trống";
        header("Location:http://localhost/duan1/login_form.php ");
        die;
    }

    $user = login($_POST['email_customer'], $_POST['password']);

    if (empty($user) == true) {
        $_SESSION['thongbao'] = "sai tài khoản mật khẩu";
        header('location: http://localhost/duan1/login_form.php');
        die;
    }
    $_SESSION['user'] = $user;

    if ($user['classify_customer'] == 1) {
        header('location: http://localhost/duan1/admin/index.php');
    }

    if ($user['classify_customer'] == 0) {
        header('location: http://localhost/duan1/index.php');
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>HTH TRAVEL</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="img js-fullheight" style="background-image: url(asset/img/view.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 style="margin-bottom:50px" class="heading-section">HTH TRAVEL</h2>
                </div>
                <?php if (isset($_SESSION['thongbao'])) { ?>
                    <div id="toast">
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
            </div>

            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <form action="login_form.php" method="POST" class="signin-form">
                            <div class="form-group">
                                <input type="text" class="form-control" name="email_customer" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" name="password" class="form-control" placeholder="Password">
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="btn_khongthich" class="form-control btn btn-primary submit px-3">Sign In</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">Remember Me
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="forget_form.php" style="color: #fff">Forgot Password</a>
                                </div>
                            </div>
                        </form>
                        <p class="w-100 text-center">&mdash; Or Don't Have Account? &mdash;</p>
                        <div class="social d-flex text-center">
                            <a href="regist_form.php" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> SIGN UP</a>
                            <!-- <a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="./asset/js/jquery.min.js"></script>
    <script src="./asset/js/popper.js"></script>
    <script src="./asset/js/bootstrap.min.js"></script>
    <script src="./asset/js/main.js"></script>
    <script src="./asset/js/toast.js"></script>
</body>

</html>