<?php
session_start();
require_once './db/connection.php';
require_once './db/contacts.php';
if (isset($_POST['btn-submit'])) {
    // filter_var($_POST['email_contacts'], FILTER_VALIDATE_EMAIL)
    if (empty($_POST['email_contacts']) || empty($_POST['mess_contacts'])) {
        $_SESSION['thongbao'] = "Vui lòng nhập đầy đủ nội dung!";
        header("location: ./contact.php");
        die;
    }
    if (!filter_var($_POST['email_contacts'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['thongbao'] = "Vui lòng nhập đúng định dạng email!";
        header("location: ./contact.php");
        die;
    }
    $data = [
        'email_contacts' => $_POST['email_contacts'],
        'mess_contacts' => $_POST['mess_contacts'],
        'date_contacts' => $_POST['date_contacts']
    ];
    insert_contacts($data);
    header("location: ./contact.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ</title>
    <link rel="stylesheet" href="/duan1/asset/fonts/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="/duan1/asset/css/base.css">
    <link rel="stylesheet" href="/duan1/asset/css/main.css">
    <link rel="stylesheet" href="/duan1/asset/css/contact.css">
    <link rel="stylesheet" href="/duan1/asset/css/responsive.css">
    <link rel="stylesheet" href="/duan1/asset/css/css_admin/error_mess.css">
    <style>

    </style>
</head>

<body>
    <div class="main">
        <?php require_once './header.php'; ?>
        <div class="body__banner" style="background-image: url(/duan1/asset/img/ct-banner.jpg); padding: 10%;">
            <div class="banner-text">Liên hệ</div>
        </div>
        <div class="body">
            <div class="grid">
                <?php if (isset($_SESSION['thongbao'])) { ?>
                    <div id="toast">
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
                        </div>
                    </div>
                <?php } ?>
                <div class="grid-with-width">
                    <div class="grid__row">
                        <div class="grid__column-2-3">
                            <p class="top-text">
                                <span>V</span> Việt Nam-đất nước cong cong hình chữ S được biết đến qua hàng loạt các danh lam thắng cảnh cùng nền văn hòa đậm đà bản sắc của nền văn hóa lúa nước. Miền Bắc có SaPa Hạ Long, Hà Nội, Tràng An Ninh Bình.... Miền Trung có Hội An, Đà Nẵng, Huế, Nha Trang .Hãy để HTH Travel giới thiệu những địa điểm nên đi du lịch ở Việt Nam cho sự lựa chọn chuyến đi sắp tới
                            </p>
                            <p class="top-text">
                                Mọi thắc mắc của bạn vui lòng liên hệ với chúng tôi. Xin chân thành cảm ơn!
                            </p>
                        </div>
                        <div class="grid__column-3">
                            <div class="body-top">
                                <div class="top-contact">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <div class="top-contact-text">
                                        <p>ADDRESS</p>
                                        <p>FPT - Hà Nội</p>
                                    </div>
                                </div>
                                <div class="top-contact">
                                    <i class="fas fa-mobile-alt"></i>
                                    <div class="ml-8 top-contact-text">
                                        <p>Phone</p>
                                        <p>0987654321</p>
                                    </div>
                                </div>
                                <div class="top-contact">
                                    <i class="fas fa-pencil-alt"></i>
                                    <div class="top-contact-text">
                                        <p>Email</p>
                                        <p>hthtravel@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-with-width">
                    <div class="grid__row">
                        <div class="grid__column-2-3">
                            <div class="grid__row">
                                <div class="grid__column-2-3">
                                    <div class="grid-with-width">
                                        <div class="grid__row">
                                            <div class="grid__column-2" style="margin-top: 16px;">
                                                <img src="/duan1/asset/img/ct-img4.jpg" alt="" class="img">
                                            </div>
                                            <div class="grid__column-2" style="margin-top: 16px;">
                                                <img src="/duan1/asset/img/ct-img2.jpg" alt="" class="img">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid-with-width" style="margin-top: 16px;">
                                        <img src="/duan1/asset/img/ct-img3.jpg" alt="" class="img">
                                    </div>
                                </div>
                                <div class="grid__column-3">
                                    <img src="/duan1/asset/img/ct-img1.jpg" alt="" class="img">
                                </div>
                            </div>
                        </div>
                        <div class="grid__column-3">
                            <div class="form-text">
                                <p>Form liên hệ</p>
                                <h1>Giải đáp thắc mắc</h1>
                            </div>
                            <form action="./contact.php" class="form-contact" method="POST">
                                <div>
                                    <lable class="lable">Email :</lable> <br>
                                    <input type="text" class="input" name="email_contacts">
                                    <input type="text" class="input" value="<?php echo date('Y-m-d'); ?>" hidden name="date_contacts">
                                </div>
                                <div>
                                    <lable class="lable">Message :</lable> <br>
                                    <textarea class="input" name="mess_contacts" id="" cols="30" rows="6"></textarea>
                                </div>
                                <div>
                                    <input type="submit" style="width: 100%;" name="btn-submit" class="btn" value="SEND NOW">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid">
                <div class="grid__row">
                    <div class="grid__column-4 div-icon">
                        <img src="/duan1/asset/img/icon-boat.png" width="70px" style="color: grey;" alt="">
                        <p class="icon">Cruise Tours</p>
                    </div>
                    <div class="grid__column-4 div-icon">
                        <img src="/duan1/asset/img/icon-landmark.png" width="70px" style="color: grey;" alt="">
                        <p class="icon">City Travel</p>
                    </div>
                    <div class="grid__column-4 div-icon">
                        <img src="/duan1/asset/img/icon-tree.png" width="70px" style="color: grey;" alt="">
                        <p class="icon">RELAX LOCATION</p>
                    </div>
                    <div class="grid__column-4 div-icon">
                        <img src="/duan1/asset/img/icon-map.png" width="70px" style="color: grey;" alt="">
                        <p class="icon">COOL TOURS</p>
                    </div>
                </div>
            </div>
            <div class="grid-with-width body-bottom">
                <img src="/duan1/asset/img/ct-banner2.jpg" alt="" class="img">
                <div class="sale-video">
                    <div class="grid">
                        <div class="grid__row">
                            <div class="grid__column-2">
                                <div class="sale-content">
                                    <div class="sale-block">
                                        <h2>Destinations</h2>
                                        <p>
                                            Các tua du lịch 3 miền hấp dẫn giúp bạn có cảm giác thoải mái thích thú.
                                        </p>
                                        <p>
                                            Liên kết với hệ thống nhà hàng khách sạn Ở mọi miền đất nước.
                                        </p>
                                        <p>
                                            Với đội ngũ nhân viên, cán bộ dày dặn kinh nghiệm sẽ tư vấn cho bạn.
                                        </p>
                                        <p>
                                            HTH Travel Với nhiều khuyến mãi ưu đãi hấp dẫn với mọi người, uy tín - an toàn - chất lượng.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="grid__column-2">
                                <div class="video-content">
                                    <img src="/duan1/asset/img/slide-pk-1.jpg" alt="" class="img">
                                    <img src="/duan1/asset/img/icon-play.png" alt="" class="icon-play js-modal-click">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once "./call.php" ?>
    </div>
    <?php require_once './footer.php'; ?>
    <div class="modal js-modal">
        <div class="modal-container js-modal-container">
            <div class="modal-close js-modal-close">
                <i class="fas fa-times"></i>
            </div>
            <div class="modal-header">
                <div class="header-name-modal">Video</div>
            </div>
            <div class="modal-body">
                <!-- để ảnh ở đây -->
                <iframe width="100%" height="500" src="https://www.youtube.com/embed/DIgv-e18OzA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
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
</body>

</html>