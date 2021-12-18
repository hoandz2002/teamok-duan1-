<?php
session_start();
require_once './../db/connection.php';
require_once './../db/cate_post.php';
require_once './../db/post.php';
require_once './../db/location.php';
require_once './../db/tour.php';
require_once './../db/service.php';
require_once './../db/customer.php';
require_once './../db/bill_tour.php';
require_once './../db/comment.php';
$tour = getAllTours();
$post = getAll_post();
$location = getAllLocation();
$comment = getAllComment();
$bill = getAllBill();
$customer = getAllCustomer();
$cate = getAll_cate();
$service = getAllService();
if (!isset($_SESSION['user']) || $_SESSION['user'] != null && $_SESSION['user']['classify_customer'] != 1) {
    unset($_SESSION['user']);
    header("location: /duan1/login_form.php");
}
function getAlldm()
{
    $conn = connect();
    $sql = "SELECT location.id_location as iddm, location.name_location as namedm, count(tours.id_tours) as countsp, min(tours.price_tours) as minprice, max(tours.price_tours) as maxprice, avg(tours.price_tours) as tbprice FROM tours JOIN location on location.id_location = tours.id_location GROUP BY location.id_location, location.name_location";

    //$conn->prepare($sql): tạo ra đối tượng $statement
    //statement: đối tượng giúp thực thi truy vấn
    $statement = $conn->prepare($sql);

    //thực thi truy vấn
    $statement->execute();


    $result = [];
    while (true) {
        // lấy ra dong dữ liệu tiếp theo
        $data = $statement->fetch();

        if ($data == false) {
            break;
        }
        $row = [
            'iddm' => $data['iddm'],
            'namedm' => $data['namedm'],
            'countsp' => $data['countsp'],
            'minprice' => $data['minprice'],
            'maxprice' => $data['maxprice'],
            'tbprice' => $data['tbprice'],
        ];

        array_push($result, $row);
    }
    return $result;
}
$data = getAlldm();
?>
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./../asset/fonts/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="./../asset/css/css_admin/main.css">
    <link rel="stylesheet" href="./../asset/css/css_admin/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300&family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito Sans', sans-serif;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="left">
                <?php require_once './sidebar.php'; ?>
            </div>
            <!--left : siderbar-->
            <div class="right">
                <?php require_once './header.php'; ?>
                <!-- Nội dung ở đây  -->
                <div class="right-heading">
                    <h2>Thống kê số lượng</h2>
                </div>
                <div class="right_body">
                    <div class="box" style="background-color: #2255a4;">
                        <i class="box-icon fas fa-users"></i>
                        <div class="box-name">Customer</div>
                        <div class="box-quantity"> <?php echo count($customer); ?></div>
                    </div>
                    <div class="box" style="background-color: #999999;">
                        <i class="box-icon fas fa-torii-gate"></i>
                        <div class="box-name">Tours</div>
                        <div class="box-quantity"> <?php echo count($tour); ?></div>
                    </div>
                    <div class="box" style="background-color: #da542e;">
                        <i class="box-icon fas fa-compass"></i>
                        <div class="box-name">Location</div>
                        <div class="box-quantity"> <?php echo count($location); ?></div>
                    </div>
                    <div class="box" style="background-color: #ffb848;">
                        <i class="box-icon fab fa-servicestack"></i>
                        <div class="box-name">Service</div>
                        <div class="box-quantity"> <?php echo count($service); ?></div>
                    </div>
                    <div class="box" style="background-color: #005500;">
                        <i class="box-icon fas fa-file-invoice-dollar"></i>
                        <div class="box-name">Bill Tours</div>
                        <div class="box-quantity"> <?php echo count($bill); ?></div>
                    </div>
                    <div class="box" style="background-color: #28b779;">
                        <i class="box-icon fas fa-book-open"></i>
                        <div class="box-name">Post</div>
                        <div class="box-quantity"> <?php echo count($post); ?></div>
                    </div>
                    <div class="box" style="background-color: #FF3366;">
                        <i class="box-icon fas fa-tasks"></i>
                        <div class="box-name">Manage post</div>
                        <div class="box-quantity"> <?php echo count($cate); ?></div>
                    </div>
                    <div class="box" style="background-color: #FE0805;">
                        <i class="box-icon fas fa-comment"></i>
                        <div class="box-name">Comment</div>
                        <div class="box-quantity"> <?php echo count($comment); ?></div>
                    </div>
                </div>
                <div class="">
                    <h1 style="text-align: center;">Thống kê giá tours</h1>
                    <table class="table" border="1">

                        <tr>
                            <th>Mã địa điểm</th>
                            <th>Tên địa điểm</th>
                            <th>Số lượng tours</th>
                            <th>Giá thấp nhất</th>
                            <th>Giá cao nhất</th>
                            <th>Giá trung bình</th>
                        </tr>
                        <?php for ($i = 0; $i < count($data); $i++) { ?>
                            <tr style="text-align: center;">
                                <td>
                                    <?php echo $data[$i]['iddm'] ?>
                                </td>
                                <td>
                                    <?php echo $data[$i]['namedm'] ?>
                                </td>
                                <td>
                                    <?php echo $data[$i]['countsp'] ?>
                                </td>
                                <td>
                                    <?php echo number_format($data[$i]['minprice']) ?>
                                </td>
                                <td>
                                    <?php echo number_format($data[$i]['maxprice']) ?>
                                </td>
                                <td>
                                    <?php echo number_format($data[$i]['tbprice']) ?>
                                </td>
                            </tr>
                        <?php } ?>

                    </table>
                </div>
                <div class="">
                    <div id="piechart"></div>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        // Load google charts
                        google.charts.load('current', {
                            'packages': ['corechart']
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        // Draw the chart and set the chart values
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([

                                ['Danh mục', 'Số lượng sản phẩm'],
                                <?php
                                $tongdm = count($data);
                                $i = 1;
                                foreach ($data as $thongke) {
                                    extract($thongke);
                                    if ($i == $tongdm) $dauphay = "";
                                    else $dauphay = ",";
                                    echo "['" . $thongke['namedm'] . "'," . $thongke['countsp'] . " ]" . $dauphay;
                                    $i += 1;
                                }
                                ?>
                            ]);

                            // Optional; add a title and set the width and height of the chart
                            var options = {
                                'title': 'Biểu đồ thống kê',
                                'width': 700,
                                'height': 500
                            };

                            // Display the chart inside the <div> element with id="piechart"
                            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                            chart.draw(data, options);
                        }
                    </script>
                </div>
                <?php require_once './footer.php'; ?>
            </div>
            <!--right : content-->
        </div>
    </div>
</body>

</html>