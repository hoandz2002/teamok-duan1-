<?php 
session_start();
require_once './comment.php';
$id = $_GET['id_comment'];
$data = getid($id);
// var_dump($data); die;

if(isset($_POST['btn_save'])){
    $data = [
        'id_comment' => $_POST['id_comment'],
        'id_customer' => $_POST['id_customer'],
        'content_comment' => $_POST['content_comment'],
        'date_comment' => $_POST['date_comment'],
        'rating' => $_POST['rating'],
    ];

    update($data);
    header("location: ./list_comment.php");
}
?>
   
    <h2 class="alert alert-danger">UPDATE COMMENT</h2>
    <form action="edit.php?id_comment=<?= $data['id_comment'] ?>" method="post" enctype="multipart/form-data">
        <fieldset hidden>
            <div class="mb-3">
                <label for="disabledTextInput" hidden class="form-label">Mã khách hàng</label>
                <input style="background-color: rgba( 0, 0, 0, 0.3);" id="disabledTextInput" name="id_comment" class="form-control" type="hidden" value="<?= $data['id_comment'] ?>">
            </div>
        </fieldset>
        <div>
        <label for="">id_customer</label>
        <input type="text" name="id_customer" value="<?= $data['id_customer'] ?>" id="">
    </div>
    <div>
        <label for="">content_comment</label>
        <input type="text" name="content_comment" value="<?= $data['content_comment'] ?>" id="">
    </div>
    <div>
        <label for="">date_comment</label>
        <input type="date" name="date_comment" value="<?= $data['date_comment'] ?>" id="">
    </div>
    <div>
        <label for="">rating</label>
        <input type="text" name="rating" value="<?= $data['rating'] ?>" id="">
  
        </p>
        <div class="form-group">
            <button name="btn_save" class="btn btn-default">Sửa</button>
        </div>
    </form>
  

    </div>
</body>

</html>