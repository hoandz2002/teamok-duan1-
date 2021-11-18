<?php
require_once './../../db/connection.php';
require_once './../../db/tour.php';
$data = getAllTours();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/duan1/asset/fonts/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="/duan1/asset/css/css_admin/main.css">
    <style>
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.35);
            display: flex;
            align-items: center;
            justify-content: center;
            display: none;
        }

        .modal.open {
            display: flex;
        }

        .modal-container {
            width: 900px;
            max-width: calc(100% - 32px);
            min-height: 300px;
            background-color: #fff;
            position: relative;
            animation: modalFadeIn ease 0.3s;
        }

        .modal-close {
            cursor: pointer;
            position: absolute;
            right: 0;
            top: 0;
            color: #fff;
            padding: 12px;
            opacity: 0.9;
        }

        .modal-close:hover {
            opacity: 1;
            background-color: #f44336;
        }

        /*  */
        .modal-header {
            height: 43px;
            background-color: #009688;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 30px;
            color: #fff;
        }

        .header-name-modal {
            flex: 0;
            font-size: 18px;
            display: contents;
        }

        .modal-body {
            padding: 16px;
            color: #000;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="left">
                <?php require_once './../sidebar.php'; ?>
            </div>
            <!--left : siderbar-->
            <div class="right">
                <?php require_once './../header.php'; ?>
                <!-- Nội dung ở đây  -->
                <div class="right-heading">
                    <h2>List manager post</h2>
                </div>
                <div class="right_body">
                    <table class="table" cellspacing="8">
                        <thead class="thead">
                            <tr>
                                <th>ID</th>
                                <th>Ảnh đại diện</th>
                                <th>Tên tour</th>
                                <th>Mô tả</th>
                                <th>Giá tour</th>
                                <th>Giảm giá</th>
                                <th>Địa điểm</th>
                                <th>Bộ sưu tập</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            <?php for ($i = 0; $i < count($data); $i++) { ?>
                                <tr>
                                    <td><?php echo $data[$i]['id_tours'] ?></td>
                                    <td><img width="100px" src="./../../asset/img/<?php echo $data[$i]['image'] ?>"></td>
                                    <td><?php echo $data[$i]['name_tours'] ?></td>
                                    <td><?php echo $data[$i]['description_tours'] ?></td>
                                    <td><?php echo $data[$i]['price_tours'] ?></td>
                                    <td>
                                        <?php if ($data[$i]['sale_tours'] == null) {
                                            echo 'null';
                                        } else {
                                            echo $data[$i]['sale_tours'];
                                        } ?>
                                    </td>
                                    <td><?php echo $data[$i]['name_location'] ?></td>
                                    <td>
                                        <!-- <button class=" btn js-modal-click">Xem</button>
                                        <div class="modal js-modal">
                                            <div class="modal-container js-modal-container">
                                                <div class="modal-close js-modal-close">
                                                    <i class="fas fa-times"></i>
                                                </div>
                                                <div class="modal-header">
                                                    <div class="header-name-modal">Thư viện ảnh</div>

                                                </div>
                                                <div class="modal-body"> -->
                                                    <?php
                                                    for ($k = 0; $k < count($data); $k++) {
                                                        $data_img = getAllImage($data[$k]['id_tours']);
                                                        // var_dump($data[$k]); die;
                                                    }
                                                    ?>
                                                    <?php for ($j = 0; $j < count($data_img); $j++) { ?>
                                                        <img width="100px" src="./../../asset/img/<?php echo $data_img[$j]['images'] ?>" alt="">
                                                    <?php } ?>
                                                <!-- </div>
                                            </div>
                                        </div> -->
                                    </td>
                                    <td>
                                        <a class="js-modal-click1"><i class="mr-8 fas fa-cogs"></i></a>
                                        <a href="" onclick="confirm('Bạn muốn xóa thông tin này!');"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                    </table>
                    <div class="form_group-list">
                        <a href="/duan1/admin/tours/add_tours.php" class="btn">Thêm mới</a>
                    </div>
                </div>
                <?php require_once './../footer.php'; ?>
            </div>
            <!--right : content-->
        </div>
    </div>


    <script>
        const buyBtns = document.querySelectorAll('.js-modal-click');
        const modal = document.querySelector('.js-modal');
        const modalContainer = document.querySelector('.js-modal-container');
        const modalClose = document.querySelector('.js-modal-close');
        //hàm hiển thị modal xem(thêm class open vào modal)
        function showBuyTickets() {
            modal.classList.add('open');
        }
        //hàm ẩn modal xem(gỡ bỏ class open vào modal)
        function hideBuyTickets() {
            modal.classList.remove('open');
        }
        //lặp qua từng thẻ button và nghe theo hành vi click
        for (const buyBtn of buyBtns) {
            buyBtn.addEventListener('click', showBuyTickets);
        }

        //nghe hành vi click vào button close
        modalClose.addEventListener('click', hideBuyTickets);

        modal.addEventListener('click', hideBuyTickets);
        modalContainer.addEventListener('click', function(even) {
            event.stopPropagation();
        });
    </script>
    <!-- update -->
    
</body>

</html>