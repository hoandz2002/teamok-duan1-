<?php
function getall()
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
            'rating' => $data['rating'],

        ];
        array_push($result, $row);
    }
    return $result;
}


function getid($id)
{
    $conn = connect();
    $sql = "SELECT * FROM comment inner join customer on comment.id_customer = customer.id_customer
    WHERE id_comment = :id_comment";
    $statement = $conn->prepare($sql);
    $statement->execute(['id_comment' => $id]);

    $data = $statement->fetch();

    $row = [
      
        'id_comment' => $data['id_comment'],
        'id_customer' => $data['id_customer'],
        'content_comment' => $data['content_comment'],
        'date_comment' => $data['date_comment'],
        'rating' => $data['rating'],
    
    ];

    return $row;
}

function insert(array $data)
{
    $conn = connect();
    $sql = "INSERT INTO comment(id_customer, content_comment, date_comment, rating)" .
        "VALUES(:id_customer, :content_comment, :date_comment, :rating)";
    $statement = $conn->prepare($sql);
    $statement->execute($data);
}
function update($data)
{
    $conn = connect();
    $sql = "UPDATE comment SET id_customer =:id_customer, id_customer =:id_customer, content_comment =:content_comment, date_comment =:date_comment,rating =:rating WHERE id_comment = :id_comment";
    $statement = $conn->prepare($sql);
    $statement->execute($data);
    return true;
}

function delete($id)
{
    $conn = connect();
    $sql = "DELETE FROM comment WHERE id_comment = :id_comment";
    $statement = $conn->prepare($sql);
    $statement->execute(['id_comment' => $id]);
}
