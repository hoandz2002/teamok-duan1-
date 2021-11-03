<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới</title>
</head>
<body>
<form action="./insert.php" method="POST" enctype="multipart/form-data">
    <div>
        <label for="">image tours</label>
        <input type="file" name="image_tours" id="">
    </div>
    <div>
        <label for="">name tours</label>
        <input type="text" name="name_tours" id="">
    </div>
    <div>
        <label for="">description tours</label>
        <input type="text" name="description_tours" id="">
    </div>
    <div>
        <label for="">price tours</label>
        <input type="text" name="price_tours" id="">
    </div>
    <div>
        <label for="">time tours</label>
        <input type="date" name="time_tours" id="">
    </div>
    <div>
        <label for="">id location</label>
        <input type="text" name="id_location" id="">
    </div>
    <button>Thêm mới</button>
</form>    
</body>
</html>