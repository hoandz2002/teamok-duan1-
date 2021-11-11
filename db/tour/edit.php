<?php
session_start();
require_once './tour.php';
$id = $_GET['id_tours'];
$data = getid($id);
// var_dump($data); die;
?>
   
    <h2 class="alert alert-danger">UPDATE TOURS</h2>
    <form action="update.php?id_tours=<?= $data['id_tours'] ?>" method="post" enctype="multipart/form-data">
        <fieldset hidden>
            <div class="mb-3">
                <label for="disabledTextInput" hidden class="form-label">Mã khách hàng</label>
                <input style="background-color: rgba( 0, 0, 0, 0.3);" id="disabledTextInput" name="id_tours" class="form-control" type="hidden" value="<?= $data['id_tours'] ?>">
            </div>
        </fieldset>
        <div>
        <label for="">image tours</label>
        <input type="file" name="image_tours" value="<?php echo $data['image_tours'] ?>" id="">
    </div>
    <div>
        <label for="">image tours1</label>
        <input type="file" name="image_tours" value="<?php echo $data['image_tours'] ?>" id="">
    </div>
    <div>
        <label for="">image tours2</label>
        <input type="file" name="image_tours" value="<?php echo $data['image_tours'] ?>" id="">
    </div>
    <div>
        <label for="">name tours</label>
        <input type="text" name="name_tours" value="<?php echo $data['name_tours'] ?>" id="">
    </div>
    <div>
        <label for="">description tours</label>
        <input type="text" name="description_tours" value="<?php echo $data['description_tours'] ?>" id="">
    </div>
    <div>
        <label for="">price tours</label>
        <input type="text" name="price_tours" value="<?php echo $data['price_tours'] ?>" id="">
    </div>
   
    <div>
        <label for="">id location</label>
        <input type="text" name="id_location" value="<?php echo $data['id_location'] ?>" id="">
    </div>
        </p>
        <div class="form-group">
            <button name="btn_save" class="btn btn-default">Sửa</button>
            <a href="/xshop/SourceFile/admin/khach-hang?btn_list" class="btn btn-default">Danh sách</a>
        </div>
    </form>
  

    </div>
</body>

</html>