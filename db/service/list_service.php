<?php
require_once "./service.php";
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
        <li><a href="./../tour/list_tours.php">Tours</a></li>
            <li><a href="./../location/">Location</a></li>
            <li><a href="./../service/list_service.php">Service</a></li>
            <li><a href="./../loaihang/list_loaihang.php">Loại hàng</a></li>
            <li><a href="./../thong-ke/list.php">Thông kê</a></li>
        </ul>
    </div>
    <table class="table" border="1">
        <thead>
            <tr>
                <th style="font-size: 20px;text-align: center;border: solid 1px black;font-weight: bold;background-color: wheat;">id service</th>
                <th style="font-size: 20px;text-align: center;border: solid 1px black;font-weight: bold;background-color: wheat;">Tên service</th>
                <th style="font-size: 20px;text-align: center;border: solid 1px black;font-weight: bold;background-color: wheat;">Mô tả</th>
                <th style="font-size: 20px;text-align: center;border: solid 1px black;font-weight: bold;background-color: wheat;">giá dich vu</th>

                <!-- <th style="font-size: 20px;text-align: center;border: solid 1px black;font-weight: bold;background-color: wheat;">người giới thiệu</th> -->

                <th style="font-size: 20px;text-align: center;border: solid 1px black;font-weight: bold;background-color: wheat;" colspan="2">thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $datas) { ?>
                <tr>
                    <td style="border: solid 1px black;font-weight: bold; text-align: center;height: 50px;"><?= $datas['id_service'] ?></td>
                    <td style="border: solid 1px black;font-weight: bold; text-align: center;"><?= $datas['name_service'] ?></td>
                    <td style="border: solid 1px black;font-weight: bold; text-align: center;"><?= $datas['description_service'] ?></td>
                    <td style="border: solid 1px black;font-weight: bold; text-align: center;"><?= $datas['price_service'] ?> </td>
                   
                    <td><button><a href="./edit.php?id_service=<?= $datas['id_service'] ?>">Cập nhật</a></button></td>

                   
                    <td><button><a href="./delete.php?id_service=<?= $datas['id_service'] ?>">Xóa</a></button></td>

                </tr>
            <?php } ?>
        </tbody>
    </table>
    <button style="background-color: black; width: 100%; height: 60%;"><a style="color: white; font-weight: bold;text-decoration: none; font-size: 30px;" href="create.php">Thêm mới</a></button>

</body>

</html>