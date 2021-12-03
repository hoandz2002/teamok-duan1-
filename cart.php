<?php
session_start();
require_once './db/connection.php';
require_once './db/bill_tour.php';
$id_customer = $_GET['id_customer'];
// var_dump($_SESSION['user']['id_customer']);die;
$data_ds = getid_bill($id_customer);


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
            <table cellspacing="0" class="table1"  style="margin: 0 auto; width: 90%;">
                <tr class="thead" colspan="6">
                    <th>&nbsp</th>
                    <th>Image</th>
                    <th>Name Tours</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Date book</th>
                    <th>Name service</th>
                    <th>Price service</th>
                    <th>Date start</th>
                    <th>Total</th>
                    <th>Status</th>
                    <!-- <th>Function</th> -->
                </tr>
                <!-- <tr class="tbody" colspan="6">
                    <td><i class="fas fa-times" style="color:red;"></i></td>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Date book</td>
                    <td>Name price</td>
                    <td>Price service</td>
                    <td>Date start</td>
                    <td>Total</td>

                </tr> -->
                <!-- <a href="./tours.php"><button class="update">UPDATE CART</button></a> -->
                <?php foreach($data_ds as $ds) { ?>
                    <tr>
                        <?php $total = intval($ds['price_bill_tours']) + intval($ds['price_service']) ?>
                        <td><a href="./db/bill_tour/delete_bill.php?id_bill_tours=<?=$ds['id_bill_tours']?>"><i class="fas fa-times" style="color:red;"></i></a></td>
                        <td><img src="./asset/img/<?=$ds['image']?>" width="100px" alt=""></td>
                        <td style="max-width: 250px;"><?=$ds['name_tours']?></td>
                        <td><?=$ds['price_bill_tours']?></td>
                        <td><?=$ds['quantity_pp']?></td>
                        <td><?=$ds['date_book']?></td>
                        <td><?=$ds['name_service']?></td>
                        <td><?=$ds['price_service']?></td>
                        <td><?=$ds['date_start']?></td>
                        <td><?=$total?></td>
                        <td><?php 
                            if ($ds['bill_status'] == 0) {
                                echo "Chưa thanh toán";
                            }else {
                                echo "Đã thanh toán";
                            }
                        ?></td>
                        <td><a href="./tours.php"><button style="width: 80px;" class="update">PAYMENT</button></a></td>
                    </tr>
                <?php } ?>
            </table>
            <!-- <div style="margin-left: 780px;margin-top:100px;">
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
            </div> -->
        </div>
        <?php require_once './footer.php'; ?>

</body>

</html>