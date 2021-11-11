<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Post</title>
</head>
<body>
  <form action="./store.php" method="POST" enctype="multipart/form-data">
  <div>
        <label for="">image Post</label>
        <input type="file" name="image_post" id="">
    </div>
    <div>
        <label for="">name post</label>
        <input type="text" name="name_post" id="">
    </div>
    <div>
        <label for="">Mô tả</label>
        <input type="text" name="description_post" id="">
    </div>
    <div>
        <label for="">loại post</label>
        <input type="text" name="id_cate_post" id="">
    </div>
    <input type="submit" name="btn_submit" value="Thêm mới" id="">
  </form>
</body>
</html>