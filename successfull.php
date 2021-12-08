<?php
require_once './db/bill_tour.php';
require_once './db/connection.php';
$id_customer = $_GET['id_customer'];
$id_bill_tours = $_GET['id_bill_tours'];
if(isset($_POST['btn_payment'])) {
    function payment($id)
    {
        $conn = connect();
        $sql = "UPDATE bill_tours SET bill_status = 2 WHERE id_bill_tours =:id_bill_tours";
        $statement = $conn->prepare($sql);
        $statement->execute(['id_bill_tours' => $id]);

        return true;
    }

    payment($id_bill_tours);
}
?>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
</head>
<style>
    body {
        text-align: center;
        padding: 40px 0;
        background: #fff;
        background-image: url(https://deeglazerdesign.com/wp-content/uploads/2020/03/AdobeStock_227207295.jpeg);
    }

    h1 {
        color: #288061;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-weight: 900;
        font-size: 40px;
        margin-bottom: 10px;
    }

    p {
        color: #000;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-size: 20px;
        margin: 0;
    }

    i {
        color: #000;
        font-size: 100px;
        line-height: 200px;
        margin-left: -15px;
    }

    .card {
        background: #f5f5f5;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #4b4b4b;
        display: inline-block;
        margin: 0 auto;
        border: none;
    }

    .c-container {
        max-width: 27rem;
        margin: 1rem auto 0;
        padding: 1rem;
    }

    .o-circle {
        display: flex;
        width: 10.555rem;
        height: 10.555rem;
        justify-content: center;
        align-items: flex-start;
        border-radius: 50%;
        animation: circle-appearance .8s ease-in-out 1 forwards, set-overflow .1s 1.1s forwards;
    }

    .c-container__circle {
        margin: 0 auto 5.5rem;
    }

    /*=======================
    C-Circle Sign
=========================*/

    .o-circle__sign {
        position: relative;
        opacity: 0;
        background: #fff;
        animation-duration: .8s;
        animation-delay: .2s;
        animation-timing-function: ease-in-out;
        animation-iteration-count: 1;
        animation-fill-mode: forwards;
    }

    .o-circle__sign::before,
    .o-circle__sign::after {
        content: "";
        position: absolute;
        background: inherit;
    }

    .o-circle__sign::after {
        left: 100%;
        top: 0%;
        width: 500%;
        height: 95%;
        transform: translateY(4%) rotate(0deg);
        border-radius: 0;
        opacity: 0;
        animation: set-shaddow 0s 1.13s ease-in-out forwards;
        z-index: -1;
    }

    .o-circle__sign--success {
        background: rgb(56, 176, 131);
    }

    .o-circle__sign--success .o-circle__sign {
        width: 1rem;
        height: 6rem;
        border-radius: 50% 50% 50% 0% / 10%;
        transform: translateX(130%) translateY(35%) rotate(45deg) scale(.11);
        animation-name: success-sign-appearance;
    }

    .o-circle__sign--success .o-circle__sign::before {
        bottom: -17%;
        width: 100%;
        height: 44%;
        transform: translateX(-130%) rotate(90deg);
        border-radius: 50% 50% 50% 50% / 20%;

    }

    /*--shadow--*/
    .o-circle__sign--success .o-circle__sign::after {
        background: rgb(40, 128, 96);
    }

    @keyframes circle-appearance {
        0% {
            transform: scale(0);
        }

        50% {
            transform: scale(1.5);
        }

        60% {
            transform: scale(1);
        }

        100% {
            transform: scale(1);
        }
    }

    @keyframes success-sign-appearance {
        50% {
            opacity: 1;
            transform: translateX(130%) translateY(35%) rotate(45deg) scale(1.7);
        }

        100% {
            opacity: 1;
            transform: translateX(130%) translateY(35%) rotate(45deg) scale(1);
        }
    }


    @keyframes set-shaddow {
        to {
            opacity: 1;
        }
    }

    @keyframes set-overflow {
        to {
            overflow: hidden;
        }
    }
    button{
    background-color: #000;
    color: #fff;
    box-shadow: 0 2px 3px #000;
    border: none;
  }
</style>

<body>
    <form action="./cart.php?id_customer=<?=$id_customer?>" method="post">
    <div class="card">
        <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
            <div class="o-circle c-container__circle o-circle__sign--success">
                <div class="o-circle__sign"></div>
            </div>
        </div>
        <h1>Success</h1>
        <p>Thanh toán thành công<br /> Chúng tôi sẽ liên hệ trong thời gian ngắn nhất!</p>
   
        <button name="btn_back" style="margin-top: 30px; padding:15px 35px;cursor:pointer">
            Back 
        </button>

    </div>
    </form>

</body>

</html>