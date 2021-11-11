<?php
session_start();
require_once './cate_post.php';
$id = $_GET['id_cate_post'];
$data = getId($id);
// var_dump($data); die;

if (isset($_POST['btn_save'])) {
    $data = [
        'id_cate_post' => $data['id_cate_post'],
        'name_cate_post' => $_POST['name_cate_post'],
        
    ];
    
    update($data);
    // var_dump(update($data)); die;
    header("location: ./list_cate_post.php");
}
?>

<h2 class="alert alert-danger">UPDATE Cate Post</h2>
<form action="edit.php?id_cate_post=<?= $data['id_cate_post'] ?>" method="post" enctype="multipart/form-data">
    <fieldset hidden>
        <div class="mb-3">
            <label for="disabledTextInput" hidden class="form-label">Mã khách hàng</label>
            <input style="background-color: rgba( 0, 0, 0, 0.3);" id="disabledTextInput" name="id_cate_post" class="form-control" type="hidden" value="<?= $data['id_cate_post'] ?>">
        </div>
    </fieldset>
   
    <div>
        <label for="">name Cate Post</label>
        <input type="text" name="name_cate_post" value="<?php echo $data['name_cate_post'] ?>" id="">
    </div>
  

    </p>
    <div class="form-group">
        <button name="btn_save" class="btn btn-default">Sửa</button>
    </div>
</form>


</div>
</body>

</html>