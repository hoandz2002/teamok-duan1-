<?php
require_once "./../../db/tour/tour.php";
$data = getAll();
// var_dump($data);die;
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
                <th style="font-size: 20px;text-align: center;border: solid 1px black;font-weight: bold;background-color: wheat;">id tours</th>
                <th style="font-size: 20px;text-align: center;border: solid 1px black;font-weight: bold;background-color: wheat;">Hình ảnh</th>

                <th style="font-size: 20px;text-align: center;border: solid 1px black;font-weight: bold;background-color: wheat;">Tên tours</th>
                <th style="font-size: 20px;text-align: center;border: solid 1px black;font-weight: bold;background-color: wheat;">Mô tả</th>
                <th style="font-size: 20px;text-align: center;border: solid 1px black;font-weight: bold;background-color: wheat;">giá tours</th>
                <th style="font-size: 20px;text-align: center;border: solid 1px black;font-weight: bold;background-color: wheat;">Thời gian</th>
                <th style="font-size: 20px;text-align: center;border: solid 1px black;font-weight: bold;background-color: wheat;">tên địa danh</th>

                <!-- <th style="font-size: 20px;text-align: center;border: solid 1px black;font-weight: bold;background-color: wheat;">người giới thiệu</th> -->

                <th style="font-size: 20px;text-align: center;border: solid 1px black;font-weight: bold;background-color: wheat;" colspan="2">thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $datas) { ?>
                <tr>
                    <td style="border: solid 1px black;font-weight: bold; text-align: center;height: 50px;"><?= $datas['id_tours'] ?></td>
                    <td style="border: solid 1px black;font-weight: bold; text-align: center;"><img width="60px" src="./../../asset/img/<?= $datas['image_tours'] ?>" alt=""></td>
                    <td style="border: solid 1px black;font-weight: bold; text-align: center;"><?= $datas['name_tours'] ?></td>
                    <td style="border: solid 1px black;font-weight: bold; text-align: center;"><?= $datas['description_tours'] ?></td>
                    <td style="border: solid 1px black;font-weight: bold; text-align: center;"><?= $datas['price_tours'] ?> </td>
                    <td style="border: solid 1px black;font-weight: bold; text-align: center;"><?= $datas['time_tours']  ?></td>
                    <td style="border: solid 1px black;font-weight: bold; text-align: center;"><?= $datas['name_location']  ?></td>
                    <!-- <td style="border: solid 1px black;font-weight: bold; text-align: center;">
                    <button style="background-color: blue; width: 100%; height: 90%;"><a style="color: white; font-weight: bold;text-decoration: none;" href="./edit.php?ma_kh=<?= $datas['ma_kh'] ?>" class="btn btn-sm btn-default">cập nhật</a></button>
                    </td> -->
                    <td><button>Cập nhật</button></td>

                    <!-- <td style="border: solid 1px black;font-weight: bold; text-align: center;">
                        <button style="background-color: red; width: 100%; height: 90%;"> <a style="color: white; font-weight: bold;text-decoration: none;" href="delete.php?ma_kh=<?= $datas['ma_kh'] ?>" onclick="return confirm('ban co muon xo du lieu khong??')" class="btn btn-sm btn-default">Xóa</a>
                        </button>
                    </td> -->
                    <td><button>Xóa</button></td>

                </tr>
            <?php } ?>
        </tbody>
    </table>
    <button style="background-color: black; width: 100%; height: 60%;"><a style="color: white; font-weight: bold;text-decoration: none; font-size: 30px;" href="create.php">Thêm mới</a></button>

</body>

</html>