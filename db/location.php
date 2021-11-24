<?php
//List các hàm
function getall_location()
{
    $conn = connect();
    $sql = "SELECT * FROM location";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = [];
    while (true) {
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'id_location' => $data['id_location'],
            'name_location' => $data['name_location'],
            'description_location' => $data['description_location'],
            'img_location' => $data['img_location'],
        ];
        array_push($result, $row);
    }
    return $result;
}
function getid_location($id)
{
    $conn = connect();
    $sql = "SELECT * FROM location WHERE id_location = :id_location";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_location' => $id]);
    $data = $stmt->fetch();

    $row = [
        'id_location' => $data['id_location'],
        'name_location' => $data['name_location'],
        'description_location' => $data['description_location'],
        'img_location' => $data['img_location'],
    ];

    return $row;
}
function insert_location(array $data)
{
    $conn = connect();
    $sql = "INSERT INTO location(name_location, description_location, img_location)"."VALUES( :name_location, :description_location, :img_location)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}
function update_location($data)
{
    $conn = connect();
    $sql = "UPDATE location SET name_location = :name_location, description_location = :description_location,img_location = :img_location WHERE id_location = :id_location";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
    return true;
}
function delete_location($id)
{
    // $conn = connect();
    // $sql = "DELETE FROM location WHERE id_location = :id_location";
    // $stmt = $conn->prepare($sql);
    // $stmt->execute(['id_location' => $id]);
    $conn = connect();
    $sql = "DELETE FROM location WHERE id_location = :id_location";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_location' => $id]);
}