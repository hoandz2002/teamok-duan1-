<?php 
require_once "./../connection.php";
function getall(){
    $conn = connect();
    $sql = "SELECT * FROM customer ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = [];
    while(true){
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'id_customer' => $data['id_customer'],
            'name_customer' => $data['name_customer'],
            'cmt_customer' => $data['cmt_customer'],
            'phone_customer' => $data['phone_customer'],
            'email_customer' => $data['email_customer'],
            'password' => $data['password'],
            'classify_customer' => $data['classify_customer'],
        ];
        array_push($result, $row);
    }   
    return $result;
}

function getid($id){
    $conn = connect();
    $sql = "SELECT * FROM customer WHERE id_customer =:id_customer";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_customer' => $id]);
    
        $data = $stmt->fetch();
        
        $row = [
            'id_customer' => $data['id_customer'],
            'name_customer' => $data['name_customer'],
            'cmt_customer' => $data['cmt_customer'],
            'phone_customer' => $data['phone_customer'],
            'email_customer' => $data['email_customer'],
            'password' => $data['password'],
            'classify_customer' => $data['classify_customer'],
        ];
   
    return $row;
}
function insert(array $data){
    $conn = connect();
    $sql = "INSERT INTO customer(name_customer,cmt_customer, phone_customer, email_customer, password,classify_customer)" . 
    "VALUES(:name_customer, :cmt_customer, :phone_customer, :email_customer, :password,:classify_customer)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}
function update($data){
    $conn = connect();
    $sql = "UPDATE customer SET name_customer =:name_customer,cmt_customer =:cmt_customer, phone_customer =:phone_customer, email_customer =:email_customer, password =:password, classify_customer =:classify_customer WHERE id_customer =:id_customer";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
    return true;
}
function delete($id){
    $conn = connect();
    $sql = "DELETE FROM customer WHERE id_customer = :id_customer";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_customer' => $id]);
}

