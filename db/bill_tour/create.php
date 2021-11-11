
<?php 
require_once "./bill_tour.php";
if(isset($_POST['btn_submit'])){
    $data = [
        'name_customer' => $_POST['name_customer'],
        'id_customer' => $_POST['id_customer'],
        'quantity_pp' => $_POST['quantity_pp'],
        'price_bill_tours' => $_POST['price_bill_tours'],
        'id_tours' => $_POST['id_tours'],
        'date_book' => $_POST['date_book'],
        'id_service' => $_POST['id_service'],
        'date_start' => $_POST['date_start'],
    ];
    insert($data);
    header("location: ./list_bill_tour.php");
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
        <label for="">id_customer</label>
        <input type="text" name="id_customer" id="">
    </div>
    <div>
        <label for="">quantity_pp</label>
        <input type="text" name="quantity_pp" id="">
    </div>
    <div>
        <label for="">price_bill_tours</label>
        <input type="text" name="price_bill_tours" id="">
    </div>
    <div>
        <label for="">id_tours</label>
        <input type="text" name="id_tours" id="">
    </div>
    <div>
        <label for="">date_book</label>
        <input type="date" name="date_book" id="">
    </div>
  
    <div>
        <label for="">id_service</label>
        <input type="text" name="id_service" id="">
    </div>
    <div>
        <label for="">date_start</label>
        <input type="date" name="date_start" id="">
    </div>
    <input type="submit" name="btn_submit" id="">
</form>    
</body>
</html>