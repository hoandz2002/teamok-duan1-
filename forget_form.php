<!doctype html>
<html lang="en">

<head>
    <title>HTH TRAVEL</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="asset/css/style.css">
    <style>
        .form-control {
            background-color: rgba(0, 0, 0, 0.2);
            border: 1px solid #f4f4ff;
        }

        .ftco-section {
            padding: 4em 0;
        }
    </style>
</head>

<body class="img js-fullheight" style="background-image: url(asset/img/pexels-photo-24377.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5" style="margin-bottom:5.5em;">
                    <h2 class="heading-section">HTH TRAVEL</h2>
                </div>
                <div id="toast" style="top: 135px;">
                    <div class="tst_test tst--error">
                        <div class="toast__icon">
                            <i class="fas fa-exclamation"></i>
                        </div>
                        <div class="toast__body">
                            <h3 class="toast__title" style="font-weight: 600;color: #333;">
                                Error
                            </h3>
                            <p class="toast__msg">
                                Không được để trống
                            </p>
                        </div>
                        <div class="toast__close">
                            <i class='fas fa-times'></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <!-- <h3 class="mb-4 text-center">Have an account?</h3> -->
                        <form action="#" class="signin-form">
                            <div class="form-group">
                                <input id="password-field" type="password" class="form-control" placeholder="Email" required>
                                <span toggle="#password-field" class="fa fa-fw field-icon "><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                            </div>
                        </form>
                        <p class="w-100 text-center">&mdash;Your email &mdash;</p>
                        <div class="form-group d-md-flex">
                            <div class="w-50 text-md-left">
                                <a href="login_form.php" style="color: #fff">Back sign in</a>
                            </div>
                            <div class="w-50 text-md-right">
                                <a href="regist_form.php" style="color: #fff">Back sign up</a>
                            </div>
                        </div>

                        <div class="social d-flex text-center">
                            <a href="login_form.php" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> SUBMIT</a>
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