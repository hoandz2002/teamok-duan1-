<?php
session_start();
require_once './service.php';
$id = $_GET['id_service'];
$data = getid($id);
// var_dump($data); die;

if(isset($_POST['btn_save'])){
    $data = [
        'id_service' => $data['id_service'],
        'name_service' => $_POST['name_service'],
        'description_service' => $_POST['description_service'],
        'price_service' => $_POST['price_service'],
    ];

    update($data);
    header("location: ./list_service.php");
}
?>
   
    <h2 class="alert alert-danger">UPDATE TOURS</h2>
    <form action="edit.php?id_service=<?= $data['id_service'] ?>" method="post" enctype="multipart/form-data">
        <fieldset hidden>
            <div class="mb-3">
                <label for="disabledTextInput" hidden class="form-label">Mã khách hàng</label>
                <input style="background-color: rgba( 0, 0, 0, 0.3);" id="disabledTextInput" name="id_service" class="form-control" type="hidden" value="<?= $data['id_service'] ?>">
            </div>
        </fieldset>
       
    <div>
        <label for="">name tours</label>
        <input type="text" name="name_service" value="<?php echo $data['name_service'] ?>" id="">
    </div>
    <div>
        <label for="">description tours</label>
        <input type="text" name="description_service" value="<?php echo $data['description_service'] ?>" id="">
    </div>
    <div>
        <label for="">price service</label>
        <input type="text" name="price_service" value="<?php echo $data['price_service'] ?>" id="">
    </div>
   
        </p>
        <div class="form-group">
            <button name="btn_save" class="btn btn-default">Sửa</button>
        </div>
    </form>
  

    </div>
</body>

</html>