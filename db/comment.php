<?php
function getall_comment()
{
    $conn = connect();
    $sql = "SELECT * FROM comment inner join customer on comment.id_customer = customer.id_customer ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = [];
    while (true) {
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'id_comment' => $data['id_comment'],
            'name_customer' => $data['name_customer'],
            'content_comment' => $data['content_comment'],
            'date_comment' => $data['date_comment'],
        ];
        array_push($result, $row);
    }
    return $result;
}


function getid_comment($id)
{
    $conn = connect();
    $sql = "SELECT * FROM comment inner join customer on comment.id_customer = customer.id_customer WHERE id_comment = :id_comment";
    $statement = $conn->prepare($sql);
    $statement->execute(['id_comment' => $id]);

    $data = $statement->fetch();

    $row = [
        'id_comment' => $data['id_comment'],
        'id_tours' => $data['id_tours'],
        'id_customer' => $data['id_customer'],
        'content_customer' => $data['content_customer'],
        'date_comment' => $data['date_comment']
    ];

    return $row;
}
function getall_bl_id($id)
{
    $conn = connect();
    $sql = "SELECT * FROM comment inner join customer on comment.id_customer = customer.id_customer where id_tours = :id_tours";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_tours' => $id]);
    $result = [];
    while (true) {
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'id_comment' => $data['id_comment'],
            'id_tours' => $data['id_tours'],
            'content_comment' => $data['content_comment'],
            'id_customer' => $data['id_customer'],
            'name_customer' => $data['name_customer'],
            'date_comment' => $data['date_comment']
        ];
        array_push($result, $row);
    }
    return $result;
}
function insert_comment(array $data)
{
    $conn = connect();
    $sql = "INSERT INTO comment( id_comment, content_comment, id_tours, id_customer, date_comment)" .
    "VALUES( :id_comment, :content_comment, :id_tours, :id_customer, :date_comment)";
    $statement = $conn->prepare($sql);
    $statement->execute($data);
}
function update_comment($data)
{
    $conn = connect();
    $sql = "UPDATE comment SET id_tours=:id_tours,id_customer =:id_customer, content_comment =:content_comment, date_comment =:date_comment  WHERE id_comment = :id_comment";
    $statement = $conn->prepare($sql);
    $statement->execute($data);
    return true;
}

function delete_comment($id)
{
    $conn = connect();
    $sql = "DELETE FROM comment WHERE id_comment = :id_comment";
    $statement = $conn->prepare($sql);
    $statement->execute(['id_comment' => $id]);
}
