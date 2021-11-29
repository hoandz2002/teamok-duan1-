<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giới thiệu</title>
    <link rel="stylesheet" href="/duan1/asset/fonts/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="/duan1/asset/css/base.css">
    <link rel="stylesheet" href="/duan1/asset/css/main.css">
    <link rel="stylesheet" href="/duan1/asset/css/about.css">
    <link rel="stylesheet" href="/duan1/asset/css/responsive.css">
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
            z-index: 100;
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
    <div class="main">
        <?php require_once './header.php'; ?>
        <div class="body__banner" style="background-image: url(/duan1/asset/img/ab-bannner1.jpg); padding: 10%;">
            <div class="banner-text">ABOUT US</div>
        </div>
        <div class="body">
            <div class="grid">
                <div class="grid__row">
                    <div class="grid__column-2">
                        <div class="body__heading">Hello. Our agency has been present for over 20 years in the market. We make the most of all our customers.</div>
                    </div>
                    <div class="grid__column-2" style="display: flex;">
                        <div class="grid__column-2">
                            <div class="body__text"> Phasellus enim libero, blandit vel sapien vitae, condimentum ultricies magna et. Quisque euismod orci ut.

                                Phasellus enim libero, blandit vel sapien vitae, condimentum ultricies magna et. Quisque euismod orci ut.ss</div>
                        </div>
                        <div class="grid__column-2">
                            <div class="body__text"> Phasellus enim libero, blandit vel sapien vitae, condimentum ultricies magna et. Quisque euismod orci ut.

                                Phasellus enim libero, blandit vel sapien vitae, condimentum ultricies magna et. Quisque euismod orci ut.ss</div>
                        </div>
                    </div>

                    <div class="grid-with-width">
                        <div class="body__video">
                            <img src="/duan1/asset/img/ab-vd.jpg" alt="" class="body__img">
                            <img src="/duan1/asset/img/icon-play.png" alt="" class="icon-play js-modal-click">
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div style="position: relative;">
            <div class="grid-with-width body-bottom">
                <img src="/duan1/asset/img/ab-banner2.jpg" alt="" class="body__banner-img">
                <div class="banner__content">
                    <h1>Our Staff</h1>
                    <p>LOREM IPSUM DOLOR SIT AMET, CONSECTETURADIPISCING ELIT. DONEC AT LIGULA IN LIGULA ULTRICESVULPUTATE AT AC SAPIEN. IN JUSTO NEQUE, MALESUADAA LIBERO ET, LOREM IPSUM DOLOR SIT AMET,CONSECTETUR ADIPISCING ELIT
                        CONTACT US</p>
                </div>
            </div>
            <div class="banner__user">
                <div class="grid user">
                    <div class="grid__column-3">
                        <img src="./asset/img/hoandc.jpg" alt="" class="img-user">
                        <div class="content-user">
                            <h3>Hoàn ĐC</h3>
                            <p>admin</p>
                            <span>LOREM IPSUM DOLOR SIT AMET, CONSECTETURADIPISCING ELIT. DONEC AT LIGULA IN LIGULA ULTRICESVULPUTATE AT AC SAPIEN. IN JUSTO NEQUE, MALESUADAA LIBERO ET, LOREM IPSUM DOLOR SIT AMET,CONSECTETUR ADIPISCING ELIT

                                CONTACT US</span>
                        </div>
                    </div>
                    <div class="grid__column-3">
                        <img src="https://scontent.fhan5-5.fna.fbcdn.net/v/t1.6435-9/84137987_826821847834106_3858982331104624640_n.jpg?_nc_cat=107&ccb=1-5&_nc_sid=174925&_nc_ohc=d6X2hXkwG04AX_iwSRk&tn=8yHR42e8YXFEkpjg&_nc_ht=scontent.fhan5-5.fna&oh=535593ebe0cd1ca138fd5e42ab0d4bfb&oe=61AE5D13" alt="" class="img-user">
                        <div class="content-user">
                            <h3>Hiếu NT</h3>
                            <p>admin</p>
                            <span>LOREM IPSUM DOLOR SIT AMET, CONSECTETURADIPISCING ELIT. DONEC AT LIGULA IN LIGULA ULTRICESVULPUTATE AT AC SAPIEN. IN JUSTO NEQUE, MALESUADAA LIBERO ET, LOREM IPSUM DOLOR SIT AMET,CONSECTETUR ADIPISCING ELIT

                                CONTACT US</span>
                        </div>
                    </div>
                    <div class="grid__column-3">
                        <img src="https://scontent.fhan5-5.fna.fbcdn.net/v/t1.6435-9/84137987_826821847834106_3858982331104624640_n.jpg?_nc_cat=107&ccb=1-5&_nc_sid=174925&_nc_ohc=d6X2hXkwG04AX_iwSRk&tn=8yHR42e8YXFEkpjg&_nc_ht=scontent.fhan5-5.fna&oh=535593ebe0cd1ca138fd5e42ab0d4bfb&oe=61AE5D13" alt="" class="img-user">
                        <div class="content-user">
                            <h3>Trọng TĐ</h3>
                            <p>admin</p>
                            <span>LOREM IPSUM DOLOR SIT AMET, CONSECTETURADIPISCING ELIT. DONEC AT LIGULA IN LIGULA ULTRICESVULPUTATE AT AC SAPIEN. IN JUSTO NEQUE, MALESUADAA LIBERO ET, LOREM IPSUM DOLOR SIT AMET,CONSECTETUR ADIPISCING ELIT

                                CONTACT US</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div style="height: 640px;"></div>
        <?php require_once './footer.php'; ?>
        <div class="modal js-modal">
            <div class="modal-container js-modal-container">
                <div class="modal-close js-modal-close">
                    <i class="fas fa-times"></i>
                </div>
                <div class="modal-header">
                    <div class="header-name-modal">Giới thiệu về các địa điểm</div>
                </div>
                <div class="modal-body">
                    <!-- để ảnh ở đây -->
                    <iframe width="100%" height="500px" src="https://www.youtube.com/embed/Au6LqK1UH8g" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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