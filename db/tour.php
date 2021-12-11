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
            'short_description_tours' => $data['short_description_tours'],
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
function getcount($id)
{
    $conn = connect();
    $sql = "SELECT * FROM tours inner join location on tours.id_location = location.id_location WHERE id_location = :id_location";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_location' => $id]);
    $result = [];
    while (true) {
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'id_tours' => $data['id_tours'],
            'name_tours' => $data['name_tours'],
            'short_description_tours' => $data['short_description_tours'],
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
        'short_description_tours' => $data['short_description_tours'],
        'description_tours' => $data['description_tours'],
        'price_tours' => $data['price_tours'],
        'id_location' => $data['id_location'],
        'sale_tours' => $data['sale_tours'],
        'name_location' => $data['name_location'],
        'image' => $data['image'],
    ];

    return $row;
}
function getToursByIdLocation($id)
{
    $conn = connect();
    $sql = "SELECT * FROM tours WHERE id_location =:id_location";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_location' => $id]);
    $result = [];
    while (true) {
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'id_tours' => $data['id_tours'],
            'name_tours' => $data['name_tours'],
            'short_description_tours' => $data['short_description_tours'],
            'description_tours' => $data['description_tours'],
            'price_tours' => $data['price_tours'],
            'sale_tours' => $data['sale_tours'],
            'image' => $data['image'],
        ];
        array_push($result, $row);
    }
    return $result;
}
function randTourLoca($id)
{
    $conn = connect();
    $sql = "SELECT * FROM tours WHERE id_location =:id_location ORDER BY RAND() LIMIT 4";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_location' => $id]);
    $result = [];
    while (true) {
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'id_tours' => $data['id_tours'],
            'name_tours' => $data['name_tours'],
            'short_description_tours' => $data['short_description_tours'],
            'description_tours' => $data['description_tours'],
            'price_tours' => $data['price_tours'],
            'sale_tours' => $data['sale_tours'],
            'image' => $data['image'],
        ];
        array_push($result, $row);
    }
    return $result;
}
function insertTours(array $data)
{
    $conn = connect();
    $sql  = "INSERT INTO tours(name_tours, short_description_tours, description_tours, price_tours, sale_tours,id_location)" .
        "VALUES(:name_tours, :short_description_tours, :description_tours, :price_tours, :sale_tours,:id_location)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}

function updateTours($data)
{
    $conn = connect();
    $sql = "UPDATE tours SET name_tours =:name_tours, short_description_tours =:short_description_tours, description_tours =:description_tours, price_tours =:price_tours, id_location =:id_location WHERE id_tours =:id_tours";
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

function deleteToursImage($id)
{
    $conn = connect();
    $sql = "DELETE FROM img_tours WHERE id_tours = :id_tours";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_tours' => $id]);
}

function price()
{
    $conn  = connect();
    $sql = "SELECT * FROM price WHERE status = 1";
    $statement = $conn->prepare($sql);
    $statement->execute();

    $result = [];
    while (true) {
        $data = $statement->fetch();
        if ($data == false) {
            break;
        }

        $row = [
            'id' => $data['id'],
            'rangePrice' => $data['rangePrice'],
            'status' => $data['status'],
        ];

        array_push($result, $row);
    }

    return $result;
}

function findPrice($id)
{
    $conn  = connect();
    $sql = "SELECT * FROM price WHERE id=:id";
    $statement = $conn->prepare($sql);
    $statement->execute(['id'=>$id]);

    $data = $statement->fetch();
    $row = [
        'id' => $data['id'],
        'rangePrice' => $data['rangePrice'],
        'status' => $data['status'],
    ];

    return $row;
}
