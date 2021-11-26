<?php 
require_once "./comment.php";
if(isset($_POST['btn_submit'])){
    $data = [
        'id_customer' => $_POST['id_customer'],
        'content_comment' => $_POST['content_comment'],
        'date_comment' => $_POST['date_comment'],
        'rating' => $_POST['rating'],
    ];
    insert_comment($data);
    header("location: ./list_comment.php");
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới</title>
</head>
<body>
<form action="./create.php" method="POST" enctype="multipart/form-data">
    <div>
        <label for="">id_customer</label>
        <input type="text" name="id_customer" id="">
    </div>
    <div>
        <label for="">content_comment</label>
        <input type="text" name="content_comment" id="">
    </div>
    <div>
        <label for="">date_comment</label>
        <input type="date" name="date_comment" id="">
    </div>
    <div>
        <label for="">rating</label>
        <input type="text" name="rating" id="">
    </div>
   
    <input type="submit" name="btn_submit" id="">
</form>    
</body>
</html>