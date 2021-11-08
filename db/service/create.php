<?php 
require_once "./service.php";

if(isset($_POST['btn_submit'])){
    $data=[
        'name_service' => $_POST['name_service'],
        'description_service' => $_POST['description_service'],
        'price_service' => $_POST['price_service'],
    ];
    insert($data);
    header("location: ./list_service.php");

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./create.php" method="POST">
        <div>
            <label for="">Name service</label>
            <input type="text" name="name_service" id="">
        </div>
        <div>
            <label for="">description_service</label>
            <input type="text" name="description_service" id="">
        </div>
        <div>
            <label for="">Price service</label>
            <input type="text" name="price_service" id="">
        </div>

        <input type="submit" name="btn_submit" id="">
    </form>
</body>
</html>