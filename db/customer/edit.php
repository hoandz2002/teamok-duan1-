<?php 
session_start();
require_once './customer.php';
$id = $_GET['id_customer'];
$data = getid($id);
// var_dump($data); die;

if(isset($_POST['btn_save'])){
    $data = [
        'id_customer' => $_POST['id_customer'],
            'name_customer' => $_POST['name_customer'],
            'cmt_customer' => $_POST['cmt_customer'],
            'phone_customer' => $_POST['phone_customer'],
            'email_customer' => $_POST['email_customer'],
            'password' => $_POST['password'],
            'classify_customer' => $_POST['classify_customer'],
    ];

    update($data);
    header("location: ./list_customer.php");
}
?>
   
    <h2 class="alert alert-danger">UPDATE TOURS</h2>
    <form action="edit.php?id_customer=<?= $data['id_customer'] ?>" method="post" enctype="multipart/form-data">
        <fieldset hidden>
            <div class="mb-3">
                <label for="disabledTextInput" hidden class="form-label">Mã khách hàng</label>
                <input style="background-color: rgba( 0, 0, 0, 0.3);" id="disabledTextInput" name="id_customer" class="form-control" type="hidden" value="<?= $data['id_customer'] ?>">
            </div>
        </fieldset>
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
        </p>
        <div class="form-group">
            <button name="btn_save" class="btn btn-default">Sửa</button>
        </div>
    </form>
  

    </div>
</body>

</html>