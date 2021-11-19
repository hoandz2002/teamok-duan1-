<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="right_header">
        <div class="header-bgr">
            <img src="/duan1/asset/img/logohthtravel.png" alt="" class="header-img">
            <p class="header-heading">
                TRAVEL MANAGEMENT SYSTEM
            </p>
        </div>
        <label for="account" class="header-name">
            <input type="checkbox" name="" id="account" class="check_menu" hidden>
            <i class="far fa-user-circle" style="font-size: 72px;"></i>
            <div>
                <h3>Welcome</h3>
                <p>Administrator</p>
            </div>
            <i class="fas fa-angle-down"></i>
            <ul class="acc_list">
                <li class="acc_item"><a class="acc_link" href="/duan1/admin/account.php"><i class="mr-8 fas fa-user"></i>Profile</a></li>
                <li class="acc_item"><a class="acc_link" href="/duan1/logout.php"><i class="mr-8 fas fa-sign-out-alt"></i>Log out</a></li>
            </ul>
        </label>
    </div>
    <div class="right_nav">
        <p class="nav_title">Home</p>
    </div>
</body>

</html>