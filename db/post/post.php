<?php
require_once "";
function getAll()
{
    $conn = connect();
    $sql = "SELECT * FROM post inner join cate_post on post.id_post = cate_post.id_post";
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
        ];
        array_push($result, $row);
    }
    return $result;
}

function getId($id)
{
    $conn = connect();
    $sql = "SELECT * FROM post inner join cate_post on post.id_post = cate_post.id_post";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_post' => $id]);

    $data = $stmt->fetch();

    $row = [
        'id_post' => $data['id_post'],
        'image_post' => $data['image_post'],
        'name_post' => $data['name_post'],
        'description_post' => $data['description_post'],
        'name_cate_post' => $data['name_cate_post'],
    ];

    return $row;
}
function insert(array $data)
{
    $conn = connect();
    $sql  = "INSERT INTO post(image_post, name_post, description_post, name_cate_post)" .
        "VALUES(:image_post, :name_post, :description_post, :name_cate_post)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}
function update($data)
{
    $conn = connect();
    $sql = "UPDATE post SET image_post =:image_post, name_post =:name_post, description_post =:description_post, price_tours =:price_tours, time_tours =:time_tours, name_location =:name_location, city_location =:city_location, description_location =:description_location, ma_loai =:ma_loai,kho_hang=:kho_hang WHERE ma_hh = :ma_hh";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
    return true;
}
function delete($id)
{
    $conn = connect();
    $sql = "DELETE FROM post WHERE id_post = :id_post";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_post' => $id]);
}
