<?php

function getAllTours()
{
    $conn = connect();
    $sql = "SELECT * FROM tours inner join location on tours.id_location = location.id_location";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = [];
    while (true) {
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'id_tours' => $data['id_tours'],
            'name_tours' => $data['name_tours'],
            'description_tours' => $data['description_tours'],
            'price_tours' => $data['price_tours'],
            'sale_tours' => $data['sale_tours'],
            'image' => $data['image'],
            'name_location' => $data['name_location'],
        ];
        array_push($result, $row);
    }
    return $result;
}
function getAllImage($id_tours)
{
    $conn = connect();
    $sql = "SELECT * FROM img_tours WHERE id_tours = :id_tours";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_tours' => $id_tours]);
    $result = [];
    while (true) {
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'id_tours' => $data['id_tours'],
            'images' => $data['images'],
            'id_img' => $data['id_img'],
        ];
        array_push($result, $row);
    }
    return $result;
}
function getIdTours($id)
{
    $conn = connect();
    $sql = "SELECT * FROM tours inner join location on tours.id_location = location.id_location WHERE id_tours =:id_tours ";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_tours' => $id]);

    $data = $stmt->fetch();

    $row = [
        'id_tours' => $data['id_tours'],
        'name_tours' => $data['name_tours'],
        'description_tours' => $data['description_tours'],
        'price_tours' => $data['price_tours'],
        'id_location' => $data['id_location'],
        'image' => $data['image'],
    ];

    return $row;
}
function insertTours(array $data)
{
    $conn = connect();
    $sql  = "INSERT INTO tours(name_tours, description_tours, price_tours, sale_tours,id_location)" .
        "VALUES(:name_tours, :description_tours, :price_tours, :sale_tours,:id_location)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}

function updateTours($data)
{
    $conn = connect();
    $sql = "UPDATE tours SET name_tours =:name_tours, description_tours =:description_tours, price_tours =:price_tours, id_location =:id_location WHERE id_tours =:id_tours";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
    return true;
}
function deleteTours($id)
{
    $conn = connect();
    $sql = "DELETE FROM tours WHERE id_tours = :id_tours";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_tours' => $id]);
}