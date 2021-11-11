<?php
session_start();
require_once './post.php';
$id = $_GET['id_post'];
$data = getId($id);
// var_dump($data); die;

if (isset($_POST['btn_save'])) {
    $data = [
        'id_post' => $data['id_post'],
        'image_post' => $_FILES['image_post']['name'],
        'name_post' => $_POST['name_post'],
        'description_post' => $_POST['description_post'],
        'id_cate_post' => $_POST['id_cate_post'],
    ];
    $file = $_FILES['image_post'];
    $file_name = $file['name'];
    move_uploaded_file($file['tmp_name'], './../../asset/img/' . $file_name);

    update($data);
    // var_dump(update($data)); die;
    header("location: ./list_post.php");
}
?>

<h2 class="alert alert-danger">UPDATE Post</h2>
<form action="edit.php?id_post=<?= $data['id_post'] ?>" method="post" enctype="multipart/form-data">
    <fieldset hidden>
        <div class="mb-3">
            <label for="disabledTextInput" hidden class="form-label">Mã khách hàng</label>
            <input style="background-color: rgba( 0, 0, 0, 0.3);" id="disabledTextInput" name="id_post" class="form-control" type="hidden" value="<?= $data['id_post'] ?>">
        </div>
    </fieldset>
    <div>
        <label for="">image Post</label>
        <input type="file" name="image_post" value="<?php echo $data['image_post'] ?>" id="">
    </div>
    <div>
        <label for="">name Post</label>
        <input type="text" name="name_post" value="<?php echo $data['name_post'] ?>" id="">
    </div>
    <div>
        <label for="">description Post</label>
        <input type="text" name="description_post" value="<?php echo $data['description_post'] ?>" id="">
    </div>
    <div>
        <label for="">Loại Post</label>
        <input type="text" name="id_cate_post" value="<?php echo $data['id_cate_post'] ?>" id="">
    </div>

    </p>
    <div class="form-group">
        <button name="btn_save" class="btn btn-default">Sửa</button>
    </div>
</form>


</div>
</body>

</html>