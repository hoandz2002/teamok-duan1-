<?php 
require_once "./customer.php";
if(isset($_POST['btn_submit'])){
    $data = [
        'name_customer' => $_POST['name_customer'],
        'cmt_customer' => $_POST['cmt_customer'],
        'phone_customer' => $_POST['phone_customer'],
        'email_customer' => $_POST['email_customer'],
        'password' => $_POST['password'],
        'classify_customer' => $_POST['classify_customer'],
    ];
    insert($data);
    header("location: ./list_customer.php");
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
        <label for="">name_customer</label>
        <input type="text" name="name_customer" id="">
    </div>
    <div>
        <label for="">cmt_customer</label>
        <input type="text" name="cmt_customer" id="">
    </div>
    <div>
        <label for="">phone_customer</label>
        <input type="text" name="phone_customer" id="">
    </div>
    <div>
        <label for="">email_customer</label>
        <input type="text" name="email_customer" id="">
    </div>
    <div>
        <label for="">password</label>
        <input type="password" name="password" id="">
    </div>
    <div>
        <label for="">classify_customer</label>
        <input type="text" name="classify_customer" id="">
    </div>
    <input type="submit" name="btn_submit" id="">
</form>    
</body>
</html>