<?php 
require_once "./customer.php";
$id = $_GET['id_customer'];
$data = getid($id);
if(isset($_POST['btn_save'])){
    $data1 = [
        'id_customer' => $_POST['id_customer'],
        'name_customer' => $_POST['name_customer'],
        'cmt_customer' => $_POST['cmt_customer'],
        'phone_customer' => $_POST['phone_customer'],
        'email_customer' => $_POST['email_customer'],
        'password' => $_POST['password'],
        'classify_customer' => $_POST['classify_customer'],
    ];
    // var_dump($data); die;
     update($data1);
    header("location: ./list_customer.php");
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
<form action="edit.php?id_customer=<?php echo $data['id_customer']; ?>" method="POST">
<input type="text" name="id_customer" hidden id="">
    <div>
        <label for="">name_customer</label>
        <input type="text" name="name_customer" value="<?php echo $data['name_customer'] ?>" id="">
    </div>
    <div>
        <label for="">cmt_customer</label>
        <input type="text" name="cmt_customer" value="<?php echo $data['cmt_customer'] ?>" id="">
    </div>
    <div>
        <label for="">phone_customer</label>
        <input type="text" name="phone_customer" value="<?php echo $data['phone_customer'] ?>" id="">
    </div>
    <div>
        <label for="">email_customer</label>
        <input type="text" name="email_customer" value="<?php echo $data['email_customer'] ?>" id="">
    </div>
    <div>
        <label for="">password</label>
        <input type="password" name="password" value="<?php echo $data['password'] ?>" id="">
    </div>
    <div>
        <label for="">classify_customer</label>
        <input type="text" name="classify_customer" value="<?php echo $data['classify_customer'] ?>" id="">
    </div>
    <input type="submit" name="btn_save" id="">
</form>    
</body>
</html>