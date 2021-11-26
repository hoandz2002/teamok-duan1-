<?php

session_start();
require_once "./db/tour.php";
if (isset($_POST['thanh_toan'])) {
    if (isset($_SESSION['user'])) {
        if (is_numeric($_POST['phone']) == false) {
            $_SESSION['error'] = "Vui lòng nhập số điện thoại nhận hàng";
        } else if (empty($_SESSION['giohang']) == true) {
            $_SESSION['error'] = "Giỏ hàng trống! Mời bạn mua hàng!";
        } else {
            $_SESSION['error'] = "Mua hàng thành công!";
            unset($_SESSION['giohang']);
        }
    } else {
        $_SESSION['error'] = "Vui lòng đăng nhập để sử dụng tính năng thanh toán!";
    }
}
if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];
if (empty($_SESSION['giohang']) == true) {
    $_SESSION['checkgiohang'] = "Giỏ hàng trống! Mời bạn mua thêm hàng!";
}
//xóa sp trong giỏ
if (isset($_GET['delgiohang']) && ($_GET['delgiohang'] == 1)) unset($_SESSION['giohang']);
//lấy dữ liệu từ form
if (isset($_POST['addgiohang']) && ($_POST['addgiohang'])) {
    // $id_tours = $data['id_tours'];
    $image = $_POST['image'];
    $name_tours = $_POST['name_tours'];
    // $description_tours = $data['description_tours'];
    $quantity_pp = $_POST['quantity_pp'];
    $price_tours = $_POST['price_tours'];
    // $sale_tours = $data['sale_tours'];
    // $name_location = $_POST['name_location'];  
    //ktra sp có trong giỏ hàng k 

    $fl = 0; //ktra sp co trùng hay k
    for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
        if ($_SESSION['giohang'][$i][1] == $name_tours) {
            $fl = 1;
            // $quantity_pp = $so_luong + $_SESSION['giohang'][$i][3];
            $_SESSION['giohang'][$i][3] = $quantity_pp;
            break;
        }
    }
    //neu k trung gio hang thi them moi 
    if ($fl == 0) {

        //them mới vào giỏ hàng
        $prd = [$image, $name_tours,$quantity_pp, $price_tours];
        $_SESSION['giohang'][] = $prd;
        // var_dump($_SESSION['giohang']);
    }
}
if (isset($_GET['delid']) && ($_GET['delid'] >= 0)) {
    array_splice($_SESSION['giohang'], $_GET['delid'], 1);
} 
function showgiohang()
{
    if (isset($_SESSION['giohang']) && (is_array($_SESSION['giohang']))) {
        $tong = 0;
        for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {

            $tt = intval($_SESSION['giohang'][$i][2]) * intval($_SESSION['giohang'][$i][3]);
            $tong += $tt;
            echo '<tr>
            <td>
            <a href="cart.php?delid=' . $i . '"><i class="fas fa-times" style="color:red;"></i></a>
            </td>            <td>
                    <img style="width:100px;" src="./asset/img/' . $_SESSION['giohang'][$i][0] . '">
            </td>
            <td>' . $_SESSION['giohang'][$i][1] . '</td>

            <td>' . $_SESSION['giohang'][$i][3] . '</td>
            <td>' . $_SESSION['giohang'][$i][2] . '</td>
            <td>
                <div>' . $tt . '</div>
            </td>
          
             
        </tr>';
        }
        echo '<tr>
        <th colspan="5">Tổng đơn hàng</th>
        <th>
            <div>' . $tong . '</div>
        </th> 

    </tr>';
    }
}
// var_dump( $_SESSION['giohang'][$i][0] ); die;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tours Detail</title>
    <link rel="stylesheet" href="/duan1/asset/fonts/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="/duan1/asset/css/base.css">
    <link rel="stylesheet" href="/duan1/asset/css/main.css">
    <link rel="stylesheet" href="/duan1/asset/css/tours_detail.css">
    <link rel="stylesheet" href="/duan1/asset/css/responsive.css">
    <style>
        .table1 {
            font-size: 14px;
            color: #555;
            width: 1171px;
            margin-left: 175px;
            text-align: center;
        }

        .thead,
        .tfoot {
            height: 70px;
            background-color: #EAE7E7;
        }

        .tbody {
            height: 70px;
        }

        .update {
            width: 100px;
            height: 30px;
            border-radius: 16px;
            border: none;
            outline: none;
            background-color: #87D9E7;
            color: #fff;
            cursor: pointer;
            font-size: 10px;
        }

        .update:hover {
            background-color: #14B9D5;
        }

        .table2 {
            width: 560px;
            margin-top: 20px;
            height: 122px;
            border: 1px solid #9a9a9a;
            display: grid;
            grid-template-rows: 1fr 1fr;
            text-align: center;
        }

        .submit {
            width: 560px;
            height: 61px;
            border: none;
            margin-top: 20px;
            color: #fff;
            background-color: #14B9D5;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="main">
        <?php require_once './header.php'; ?>
        <div class="body__banner" style="background-image: url(/duan1/asset/img/cart-banner.jpg); padding: 10%;">
            <div class="banner-text" style="text-shadow: 0px 1px 2px green;">Cart</div>
        </div>
        <div class="body">
            <table cellspacing="0" class="table1">
                <tr class="thead" colspan="6">
                    <th>&nbsp</th>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
                <tr class="tbody" colspan="6">
                    <td><i class="fas fa-times" style="color:red;"></i></td>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total</td>
                </tr>
                <?php showgiohang(); ?>

                <a href="./tours.php"><button class="update">UPDATE CART</button></a>
                </td>
                </tr>
            </table>
            <div style="margin-left: 780px;margin-top:100px;">
                <span style="font-size: 24px;">Cart total</span>
                <div class="table2">
                    <div class="grid__row" style="border-bottom:1px solid #9a9a9a;padding:23px 0px;color:#9a9a9a;font-size:13px">
                        <div class="grid__column-2"> Subtotal: </div>
                        <div class="grid__column-2">100000</div>
                    </div>
                    <div class="grid__row" style="padding:23px 0px;font-size:13px">
                        <div class="grid__column-2"> Subtotal:</div>
                        <div class="grid__column-2">100000</div>
                    </div>
                </div>

                <button class="submit">
                    PROCEED TO CHECKOUT
                </button>
            </div>
        </div>
        <?php require_once './footer.php'; ?>

</body>

</html>