
<?php
function login($email_customer, $password)
{
    $conn = connect();
    $sql = "SELECT * FROM customer " .
        " WHERE email_customer = :email_customer AND password = :password";
    $stmt = $conn->prepare($sql);
    $params = [
        'email_customer' => $email_customer,
        'password' => $password
    ];

    $stmt->execute($params);
    $result = [];
    $data = $stmt->fetch();

    if ($data == false) {
        // Truy vấn không tìm đc bản ghi tương ứng hoặc truy vấn có lỗi
        return [];
    }

    $result = [
        'id_customer' => $data['id_customer'],
        'name_customer' => $data['name_customer'],
        'cmt_customer' => $data['cmt_customer'],
        'phone_customer' => $data['phone_customer'],
        'email_customer' => $data['email_customer'],
        'password' => $data['password'],
        'classify_customer' => $data['classify_customer']
    ];

    return $result;
}
function getall_customer()
{
    $conn = connect();
    $sql = "SELECT * FROM customer ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = [];
    while (true) {
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

function getall_customer_byid($id)
{
    $conn = connect();
    $sql = "SELECT * FROM customer WHERE id_customer = :id_customer ";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_customer' => $id]);
    $result = [];

    $data = $stmt->fetch();
  
    $row = [
        'id_customer' => $data['id_customer'],
        'name_customer' => $data['name_customer'],
        'cmt_customer' => $data['cmt_customer'],
        'phone_customer' => $data['phone_customer'],
        'email_customer' => $data['email_customer'],
    ];
    return $row;
}


function getid_customer($id)
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

function insert_customer(array $data)
{
    $conn = connect();
    $sql = "INSERT INTO customer(name_customer, cmt_customer, phone_customer, email_customer, password, classify_customer)" .
        "VALUES(:name_customer, :cmt_customer, :phone_customer, :email_customer, :password, 0)";
    $statement = $conn->prepare($sql);
    $statement->execute($data);
}
function update_customer_pass($data)
{
    $conn = connect();
    $sql = "UPDATE customer SET password =:password WHERE id_customer = :id_customer";
    $statement = $conn->prepare($sql);
    $statement->execute($data);
    return true;
}
function update_customer($data)
{
    $conn = connect();
    $sql = "UPDATE customer SET name_customer =:name_customer, cmt_customer =:cmt_customer, phone_customer =:phone_customer," .
        "email_customer =:email_customer WHERE id_customer = :id_customer";
    $statement = $conn->prepare($sql);
    $statement->execute($data);
    return true;
}

function delete_customer($id)
{
    $conn = connect();
    $sql = "DELETE FROM customer WHERE id_customer = :id_customer";
    $statement = $conn->prepare($sql);
    $statement->execute(['id_customer' => $id]);
}
