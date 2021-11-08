<?php
require_once "./../connection.php";
function getAllCustomer()
{
    $conn = connect();
    $sql = "SELECT * FROM customer";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $result = [];
    while (true) {
        $data = $statement->fetch();
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


function findCustomerById($id)
{
    $conn = connect();
    $sql = "SELECT * FROM customer WHERE id_customer = :id_customer";
    $statement = $conn->prepare($sql);
    $statement->execute(['id_customer' => $id]);

    $data = $statement->fetch();

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

function insertCustomer(array $data)
{
    $conn = connect();
    $sql = "INSERT INTO customer( id_customer, name_customer, cmt_customer, phone_customer, email_customer, password, classify_customer)" .
        "VALUES( :id_customer, :name_customer, :cmt_customer, :phone_customer, :email_customer, :password, :classify_customer)";
    $statement = $conn->prepare($sql);
    $statement->execute($data);
}
function updateCustomer($data)
{
    $conn = connect();
    $sql = "UPDATE customer SET id_customer =:id_customer, name_customer =:name_customer, cmt_customer =:cmt_customer, phone_customer =:phone_customer," .
        "email_customer =:email_customer, password =:password, classify_customer =:classify_customer WHERE id_customer = :id_customer";
    $statement = $conn->prepare($sql);
    $statement->execute($data);
    return true;
}

function deleteCustomer($id)
{
    $conn = connect();
    $sql = "DELETE FROM customer WHERE id_customer = :id_customer";
    $statement = $conn->prepare($sql);
    $statement->execute(['id_customer' => $id]);
}
