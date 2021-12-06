<?php
function getAll_post()
{
    $conn = connect();
    $sql = "SELECT * FROM post inner join cate_post on post.id_cate_post = cate_post.id_cate_post";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = [];
    while (true) {
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'id_post' => $data['id_post'],
            'image_post' => $data['image_post'],
            'name_post' => $data['name_post'],
            'description_post' => $data['description_post'],
            'name_cate_post' => $data['name_cate_post'],
            'short_description_post' => $data['short_description_post'],
        ];
        array_push($result, $row);
    }
    return $result;
}
function getAllId($id)
{
    $conn = connect();
    $sql = "SELECT * FROM post WHERE id_cate_post = :id_cate_post";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_cate_post' => $id]);
    $result = [];
    while (true) {
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'id_post' => $data['id_post'],
            'image_post' => $data['image_post'],
            'name_post' => $data['name_post'],
            'description_post' => $data['description_post'],
            'id_cate_post' => $data['id_cate_post'],
            'short_description_post' => $data['short_description_post'],
        ];
        array_push($result, $row);
    }
    return $result;
}
function get4Id($id)
{
    $conn = connect();
    $sql = "SELECT * FROM post WHERE id_cate_post = :id_cate_post ORDER BY RAND() LIMIT 4";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_cate_post' => $id]);
    $result = [];
    while (true) {
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'id_post' => $data['id_post'],
            'image_post' => $data['image_post'],
            'name_post' => $data['name_post'],
            'description_post' => $data['description_post'],
            'id_cate_post' => $data['id_cate_post'],
            'short_description_post' => $data['short_description_post'],
        ];
        array_push($result, $row);
    }
    return $result;
}
function getId_post($id)
{
    $conn = connect();
    $sql = "SELECT * FROM post inner join cate_post on post.id_cate_post = cate_post.id_cate_post WHERE id_post =:id_post";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_post' => $id]);

    $data = $stmt->fetch();

    $row = [
        'id_post' => $data['id_post'],
        'image_post' => $data['image_post'],
        'name_post' => $data['name_post'],
        'description_post' => $data['description_post'],
        'id_cate_post' => $data['id_cate_post'],
        'short_description_post' => $data['short_description_post'],
    ];

    return $row;
}
function insert_post(array $data)
{
    $conn = connect();
    $sql  = "INSERT INTO post(short_description_post,image_post, name_post, description_post, id_cate_post)" .
        "VALUES(:short_description_post,:image_post, :name_post, :description_post, :id_cate_post)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}
function update_post($data)
{
    $conn = connect();
    $sql = "UPDATE post SET short_description_post =:short_description_post, image_post =:image_post, name_post =:name_post, description_post =:description_post, id_cate_post =:id_cate_post WHERE id_post = :id_post";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
    return true;
}
function delete_post($id)
{
    $conn = connect();
    $sql = "DELETE FROM post WHERE id_post = :id_post";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_post' => $id]);
}
