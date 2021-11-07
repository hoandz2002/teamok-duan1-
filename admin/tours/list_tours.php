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
                                <th>Thời gian</th>
                                <th>Thư viện ảnh</th>
                                <th>Địa điểm</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            <tr>
                                <td>1</td>
                                <td>Ảnh</td>
                                <td>Sapa 3N2D</td>
                                <td>Du lịch sapa 3N2D là trải nghiệm tuyệt con mẹ nói vời luôn ae à. Đi với ny thì hết nước chấm</td>
                                <td>5.000.000đ</td>
                                <td>0%</td>
                                <td>26/11/2021</td>
                                <td><button class="btn js-modal-click">Xem</button></td>
                                <div class="modal js-modal">
                                    <div class="modal-container js-modal-container">
                                        <div class="modal-close js-modal-close">
                                            <i class="fas fa-times"></i>
                                        </div>
                                        <div class="modal-header">
                                            <div class="header-name-modal">Thư viện ảnh</div>
                                        </div>
                                        <div class="modal-body">
                                            <!-- để ảnh ở đây -->
                                        </div>
                                    </div>
                                </div>
                                <td>Lào cai</td>
                                <td>
                                    <a class="js-modal-click1"><i class="mr-8 fas fa-cogs"></i></a>
                                    <a href="" onclick="confirm('Bạn muốn xóa thông tin này!');"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Ảnh</td>
                                <td>Sapa 3N2D</td>
                                <td>Du lịch sapa 3N2D là trải nghiệm tuyệt con mẹ nói vời luôn ae à. Đi với ny thì hết nước chấm</td>
                                <td>5.000.000đ</td>
                                <td>0%</td>
                                <td>26/11/2021</td>
                                <td><button class="btn js-modal-click">Xem</button></td>
                                <div class="modal js-modal">
                                    <div class="modal-container js-modal-container">
                                        <div class="modal-close js-modal-close">
                                            <i class="fas fa-times"></i>
                                        </div>
                                        <div class="modal-header">
                                            <div class="header-name-modal">Thư viện ảnh</div>
                                        </div>
                                        <div class="modal-body">
                                            <!-- để ảnh ở đây -->
                                        </div>
                                    </div>
                                </div>
                                <td>Lào cai</td>
                                <td>
                                    <a class="js-modal-click1"><i class="mr-8 fas fa-cogs"></i></a>
                                    <a href="" onclick="confirm('Bạn muốn xóa thông tin này!');"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Ảnh</td>
                                <td>Sapa 3N2D</td>
                                <td>Du lịch sapa 3N2D là trải nghiệm tuyệt con mẹ nói vời luôn ae à. Đi với ny thì hết nước chấm</td>
                                <td>5.000.000đ</td>
                                <td>0%</td>
                                <td>26/11/2021</td>
                                <td><button class="btn js-modal-click">Xem</button></td>
                                <div class="modal js-modal">
                                    <div class="modal-container js-modal-container">
                                        <div class="modal-close js-modal-close">
                                            <i class="fas fa-times"></i>
                                        </div>
                                        <div class="modal-header">
                                            <div class="header-name-modal">Thư viện ảnh</div>
                                        </div>
                                        <div class="modal-body">
                                            <!-- để ảnh ở đây -->
                                        </div>
                                    </div>
                                </div>
                                <td>Lào cai</td>
                                <td>
                                    <a href="" class="js-modal-click1"><i class="mr-8 fas fa-cogs"></i></a>
                                    <a href="" onclick="confirm('Bạn muốn xóa thông tin này!');"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Ảnh</td>
                                <td>Sapa 3N2D</td>
                                <td>Du lịch sapa 3N2D là trải nghiệm tuyệt con mẹ nói vời luôn ae à. Đi với ny thì hết nước chấm</td>
                                <td>5.000.000đ</td>
                                <td>0%</td>
                                <td>26/11/2021</td>
                                <td><button class="btn js-modal-click">Xem</button></td>
                                <div class="modal js-modal">
                                    <div class="modal-container js-modal-container">
                                        <div class="modal-close js-modal-close">
                                            <i class="fas fa-times"></i>
                                        </div>
                                        <div class="modal-header">
                                            <div class="header-name-modal">Thư viện ảnh</div>
                                        </div>
                                        <div class="modal-body">
                                            <!-- để ảnh ở đây -->
                                        </div>
                                    </div>
                                </div>
                                <td>Lào cai</td>
                                <td>
                                    <a class="js-modal-click1"><i class="mr-8 fas fa-cogs"></i></a>
                                    <a href="" onclick="confirm('Bạn muốn xóa thông tin này!');"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Ảnh</td>
                                <td>Sapa 3N2D</td>
                                <td>Du lịch sapa 3N2D là trải nghiệm tuyệt con mẹ nói vời luôn ae à. Đi với ny thì hết nước chấm</td>
                                <td>5.000.000đ</td>
                                <td>0%</td>
                                <td>26/11/2021</td>
                                <td><button class="btn js-modal-click">Xem</button></td>
                                <div class="modal js-modal">
                                    <div class="modal-container js-modal-container">
                                        <div class="modal-close js-modal-close">
                                            <i class="fas fa-times"></i>
                                        </div>
                                        <div class="modal-header">
                                            <div class="header-name-modal">Thư viện ảnh</div>
                                        </div>
                                        <div class="modal-body">
                                            <!-- để ảnh ở đây -->
                                        </div>
                                    </div>
                                </div>
                                <td>Lào cai</td>
                                <td>
                                    <a class="js-modal-click1"><i class="mr-8 fas fa-cogs"></i></a>
                                    <a href="" onclick="confirm('Bạn muốn xóa thông tin này!');"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Ảnh</td>
                                <td>Sapa 3N2D</td>
                                <td>Du lịch sapa 3N2D là trải nghiệm tuyệt con mẹ nói vời luôn ae à. Đi với ny thì hết nước chấm</td>
                                <td>5.000.000đ</td>
                                <td>0%</td>
                                <td>26/11/2021</td>
                                <td><button class="btn js-modal-click">Xem</button></td>
                                <div class="modal js-modal">
                                    <div class="modal-container js-modal-container">
                                        <div class="modal-close js-modal-close">
                                            <i class="fas fa-times"></i>
                                        </div>
                                        <div class="modal-header">
                                            <div class="header-name-modal">Thư viện ảnh</div>
                                        </div>
                                        <div class="modal-body">
                                            <!-- để ảnh ở đây -->
                                        </div>
                                    </div>
                                </div>
                                <td>Lào cai</td>
                                <td>
                                    <a class="js-modal-click1"><i class="mr-8 fas fa-cogs"></i></a>
                                    <a href="" onclick="confirm('Bạn muốn xóa thông tin này!');"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
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
    <div class="modal js-modal1">
        <div class="modal-container js-modal-container1">
            <div class="modal-close js-modal-close1">
                <i class="fas fa-times"></i>
            </div>
            <div class="modal-header">
                <div class="header-name-modal">Sửa Tour</div>
            </div>
            <div class="modal-body">
                <!--form sửa ở đây -->
                <div class="form_add">
                    <form action="" method="post" style="display: flex; flex-wrap: wrap; justify-content: space-between;">
                        <div class="form_group-2">
                            <lable class="form_lable">Mã tour</lable>
                            <input type="text" name="" disabled class="form_input" placeholder="Tự động tăng">
                        </div>
                        <div class="form_group-2">
                            <lable class="form_lable">Ảnh đại diện</lable>
                            <input type="file" name="image_tours" class="form_input">
                        </div>
                        <div class="form_group-2">
                            <lable class="form_lable">Tên tour</lable>
                            <input type="text" name="name_tours" class="form_input">
                        </div>
                        <div class="form_group-2">
                            <lable class="form_lable">Mô tả</lable>
                            <input type="text" name="description_tours" class="form_input">
                        </div>
                        <div class="form_group-2">
                            <lable class="form_lable">Giá tour</lable>
                            <input type="number" name="price_tours" class="form_input">
                        </div>
                        <div class="form_group-2">
                            <lable class="form_lable">Giảm giá</lable>
                            <input type="number" name="sale_tours" class="form_input">
                        </div>
                        <div class="form_group-2">
                            <lable class="form_lable">Thời gian</lable>
                            <input type="date" name="time_tours" class="form_input">
                        </div>
                        <div class="form_group-2">
                            <lable class="form_lable">Thư viện ảnh</lable>
                            <input type="file" name="gallery_tours" class="form_input">
                        </div>
                        <div class="form_group-2">
                            <lable class="form_lable">Địa điểm</lable>
                            <select class="form_input">
                                <option value="">--Chọn địa điểm--</option>
                                <option name="id_location" value="">Hà Nội</option>
                                <option name="id_location" value="">Đà Nẵng</option>
                                <option name="id_location" value="">Sài Gòn</option>
                            </select>
                        </div>
                        <div class="form_group-2" style="display: flex; align-items: end; justify-content: center;">
                            <input type="submit" value="Thêm mới" class="btn btn-add">
                            <input type="reset" value="Nhập lại" class="btn btn-reset">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const buyBtns1 = document.querySelectorAll('.js-modal-click1');
        const modal1 = document.querySelector('.js-modal1');
        const modalContainer1 = document.querySelector('.js-modal-container1');
        const modalClose1 = document.querySelector('.js-modal-close1');
        //hàm hiển thị modal xem(thêm class open vào modal)
        function showBuyTickets1() {
            modal1.classList.add('open');
        }
        //hàm ẩn modal xem(gỡ bỏ class open vào modal)
        function hideBuyTickets1() {
            modal1.classList.remove('open');
        }
        //lặp qua từng thẻ button và nghe theo hành vi click
        for (const buyBtn1 of buyBtns1) {
            buyBtn1.addEventListener('click', showBuyTickets1);
        }

        //nghe hành vi click vào button close
        modalClose1.addEventListener('click', hideBuyTickets1);

        modal1.addEventListener('click', hideBuyTickets1);
        modalContainer1.addEventListener('click', function(even) {
            event.stopPropagation();
        });
    </script>
</body>

</html>