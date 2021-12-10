<?php
require_once './../../db/connection.php';
require_once './../../db/cate_post.php';
$data = getAll_cate();

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
                    <h2>Danh sách loại bài viết</h2>
                </div>
                <div class="right_body">
                    <table class="table">
                        <thead class="thead">
                            <tr>
                                <th>ID</th>
                                <th>Tên loại</th>
                                <th colspan="2">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                        <?php
                            require_once './../connect_list.php';
                            $results_per_page = 5;
                            $query = "select *from cate_post";
                            $result = mysqli_query($conn, $query);
                            $number_of_result = mysqli_num_rows($result);
                            $number_of_page = ceil($number_of_result / $results_per_page);
                            if (!isset($_GET['page'])) {
                                $page = 1;
                            } else {
                                $page = $_GET['page'];
                            }
                            $page_first_result = ($page - 1) * $results_per_page;
                            $query = "SELECT *FROM cate_post LIMIT " . $page_first_result . ',' . $results_per_page;
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) { ?>
                               <tr>
                                    <td><?= $row['id_cate_post'] ?></td>
                                    <td><?= $row['name_cate_post'] ?></td>
                                    <td>
                                        <a href="/duan1/admin/manager_post/update_mng_post.php?id_cate_post=<?= $row['id_cate_post'] ?>"><i class="mr-8 fas fa-cogs"></i></a>
                                        <a href="/duan1/admin/manager_post/delete_mng_post.php?id_cate_post=<?= $row['id_cate_post'] ?>" onclick="return confirm('Bạn muốn xóa loại bài viết này!');"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>

                            <?php } ?>
                            <div style="width: 100%; padding: 0px 40px;">
                                <?php for ($page = 1; $page <= $number_of_page; $page++) {
                                    echo '<a style="text-decoration: none;
                                    width: 30px;
                                    text-align: center;
                                    line-height: 30px;
                                    display: inline-block;
                                    margin: 0px 8px;
                                    background-color: #007bff;
                                    color: white;" href = "list_mng_post.php?page=' . $page . '">' . $page . ' </a>';
                                }
                                ?>
                            </div>
                        </tbody>
                    </table>
                    <div class="form_group-list">
                        <a href="/duan1/admin/manager_post/add_mng_post.php" class="btn">Thêm mới</a>
                    </div>
                </div>
                <?php require_once './../footer.php'; ?>
            </div>
            <!--right : content-->
        </div>
    </div>
</body>

</html>