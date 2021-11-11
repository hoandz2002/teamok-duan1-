<?php
require_once "./../connection.php";
function getAll()
{
    $conn = connect();
    $sql = "SELECT * FROM cate_post ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = [];
    while (true) {
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'id_cate_post' => $data['id_cate_post'],
            'name_cate_post' => $data['name_cate_post'],
           
        ];
        array_push($result, $row);
    }
    return $result;
}

function getId($id)
{
    $conn = connect();
    $sql = "SELECT * FROM cate_post  WHERE id_cate_post =:id_cate_post";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_cate_post' => $id]);

    $data = $stmt->fetch();

    $row = [
        'id_cate_post' => $data['id_cate_post'],
        'name_cate_post' => $data['name_cate_post'],
    ];

    return $row;
}
function insert(array $data)
{
    $conn = connect();
    $sql  ="INSERT INTO cate_post(name_cate_post)" .
        "VALUES(:name_cate_post)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}
function update($data)
{
    $conn = connect();
    $sql = "UPDATE cate_post SET  name_cate_post =:name_cate_post WHERE id_cate_post = :id_cate_post";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
    return true;
}
function delete($id)
{
    $conn = connect();
    $sql = "DELETE FROM cate_post WHERE id_cate_post = :id_cate_post";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_cate_post' => $id]);
}
