<?php
session_start();
require_once './db/connection.php';
require_once './db/customer.php';
$data = getAllCustomer();
if (isset($_POST['btn-regist'])) {
    if (
        empty($_POST['name_customer']) ||
        empty($_POST['address_customer']) ||
        empty($_POST['phone_customer']) ||
        empty($_POST['email_customer']) ||
        empty($_POST['password'])
    ) {
        $_SESSION['thongbao'] = "Không được để trống";
        header("location: /duan1/regist_form.php");
        die;
    }
    if (!filter_var($_POST['email_customer'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['thongbao'] = "Nhập đúng định dạng email";
        header("location: /duan1/regist_form.php");
        die;
    }
    foreach ($data as $dt) {
        if (
           ($_POST['email_customer']) == $dt['email_customer']
        ) {
            $_SESSION['thongbao'] = "Email này đã tồn tại!";
            header("Location: /duan1/regist_form.php");
            die;
        }
    }
    if (!is_numeric($_POST['phone_customer'])) {
        $_SESSION['thongbao'] = "Nhập đúng định dạng số điện thoại";
        header("location: /duan1/regist_form.php");
        die;
    }
    $data = [
        'name_customer' => $_POST['name_customer'],
        'cmt_customer' => $_POST['cmt_customer'],
        'phone_customer' => $_POST['phone_customer'],
        'email_customer' => $_POST['email_customer'],
        'password' => $_POST['password']
    ];
    insert_customer($data);
    header("location: /duan1/login_form.php");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="asset/css/style.css">
    <style>
        .form-control {
            border: 1px solid #f4f4ff;
        }

        .ftco-section {
            padding: 1em 0;
        }

        .mb-5 {
            margin-bottom: 6em;
        }
    </style>
</head>

<body class="img js-fullheight" style="background-image: url(asset/img/a6f79e99-93ad-4208-8fac-437875275c3f.png);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">HTH TRAVEL</h2>
                </div>
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
            </div>

            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <!-- <h3 class="mb-4 text-center">Have an account?</h3> -->
                        <form action="regist_form.php" method="POST" class="signin-form">
                            <div class="form-group">
                                <input type="text" name="name_customer" class="form-control" placeholder="Full name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="email_customer" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="cmt_customer" class="form-control" placeholder="Address" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone_customer" class="form-control" placeholder="Phone number" required>
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" name="password" class="form-control" placeholder="Password" required>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="btn-regist" class="form-control btn btn-primary submit px-3">Sign Up</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <!-- <div class="w-50"> -->
                                <label class="checkbox-wrap checkbox-primary">Agree Terms and Conditions
                                    <input type="checkbox" checked>
                                    <span class="checkmark"></span>
                                </label>
                                <!-- </div> -->
                                <!-- <div class="w-50 text-md-right">
                                    <a href="#" style="color: #fff">Forgot Password</a>
                                </div> -->
                            </div>
                        </form>
                        <p class="w-100 text-center">&mdash; Or Have Account? &mdash;</p>
                        <div class="social d-flex text-center">
                            <a href="login_form.php" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> SIGN IN</a>
                            <!-- <a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="asset/js/jquery.min.js"></script>
    <script src="asset/js/popper.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/main.js"></script>
    <script src="asset/js/toast.js"></script>
</body>

</html>