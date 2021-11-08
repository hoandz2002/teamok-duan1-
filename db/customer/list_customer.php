<?php
require_once "./customer.php";
$data = getall();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            width: 1400px;
            height: 100px;
        }

        * {
            margin: 0 auto;
            padding: 0;
        }

        ul {
            display: flex;
            float: left;
            margin-left: 50px;
        }

        ul li {
            padding-left: 100px;
            list-style: none;
            color: white;
            line-height: 60px;
        }

        ul li a {
            text-decoration: none;
            font-weight: bold;
            font-size: 24px;
            color: white;
        }

        ul li a:hover {
            text-decoration: none;
            font-weight: bold;
            font-size: 28px;
            color: white;
            text-decoration: underline;
        }
    </style>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">


<body style="margin-left: 250px;">
    <div style="width: 100%;height: 100px;background-color: #BBBBBB;">
        <h1 style="margin-left: 20px; color: #333;font-weight: bold;font-size: 50px;line-height: 100px;">ADMIN</h1>
    </div>
    <br>
    <hr> <br>
    <div style="width: 100%;height: 60px;background-color: black;">

        <ul>
        <li><a href="./../hanghoa/list.php">Hàng hóa</a></li>
            <li><a href="./../khach-hang/list.php">Tài khoản</a></li>
            <li><a href="./../binh-luan/list_bl.php">Bình luận</a></li>
            <li><a href="./../loaihang/list_loaihang.php">Loại hàng</a></li>
            <li><a href="./../thong-ke/list.php">Thông kê</a></li>
        </ul>
    </div>
    <table class="table" border="1">
        <thead>
            <tr>
                <th style="font-size: 20px;text-align: center;border: solid 1px black;font-weight: bold;background-color: wheat;">id_customer</th>
                <th style="font-size: 20px;text-align: center;border: solid 1px black;font-weight: bold;background-color: wheat;">name_customer</th>

                <th style="font-size: 20px;text-align: center;border: solid 1px black;font-weight: bold;background-color: wheat;">cmt_customer</th>
                <th style="font-size: 20px;text-align: center;border: solid 1px black;font-weight: bold;background-color: wheat;">phone_customer</th>
                <th style="font-size: 20px;text-align: center;border: solid 1px black;font-weight: bold;background-color: wheat;">email_customer</th>
                <th style="font-size: 20px;text-align: center;border: solid 1px black;font-weight: bold;background-color: wheat;">password</th>
                <th style="font-size: 20px;text-align: center;border: solid 1px black;font-weight: bold;background-color: wheat;">classify_customer</th>

                <!-- <th style="font-size: 20px;text-align: center;border: solid 1px black;font-weight: bold;background-color: wheat;">người giới thiệu</th> -->

                <th style="font-size: 20px;text-align: center;border: solid 1px black;font-weight: bold;background-color: wheat;" colspan="2">thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $datas) { ?>
                <tr>
                    <td style="border: solid 1px black;font-weight: bold; text-align: center;height: 50px;"><?= $datas['id_customer'] ?></td>
                    <td style="border: solid 1px black;font-weight: bold; text-align: center"><?= $datas['name_customer'] ?></td>
                    <td style="border: solid 1px black;font-weight: bold; text-align: center;"><?= $datas['cmt_customer'] ?></td>
                    <td style="border: solid 1px black;font-weight: bold; text-align: center;"><?= $datas['phone_customer'] ?></td>
                    <td style="border: solid 1px black;font-weight: bold; text-align: center;"><?= $datas['email_customer'] ?> </td>
                    <td style="border: solid 1px black;font-weight: bold; text-align: center;"><?= $datas['password']  ?></td>
                    <td style="border: solid 1px black;font-weight: bold; text-align: center;"><?= $datas['classify_customer']  ?></td>
                   
                    <td><button><a href="./edit.php?id_customer=<?= $datas['id_customer'] ?>">Cập nhật</a></button></td>

                   
                    <td><button><a href="./delete.php?id_customer=<?= $datas['id_customer'] ?>">Xóa</a></button></td>

                </tr>
            <?php } ?>
        </tbody>
    </table>
    <button style="background-color: black; width: 100%; height: 60%;"><a style="color: white; font-weight: bold;text-decoration: none; font-size: 30px;" href="create.php">Thêm mới</a></button>

</body>

</html>

