<?php
//List các hàm
function getAllTourGuide()
{
    $conn = connect();
    $sql = "SELECT * FROM tour_guide";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = [];
    while (true) {
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'id_tour_guide' => $data['id_tour_guide'],
            'name_tour_guide' => $data['name_tour_guide'],
            'phone_tour_guide' => $data['phone_tour_guide'],
            'status' => $data['status'],
        ];
        array_push($result, $row);
    }
    return $result;
}
function getActive()
{
    $conn = connect();
    $sql = "SELECT * FROM tour_guide WHERE status = 0";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = [];
    while (true) {
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'id_tour_guide' => $data['id_tour_guide'],
            'name_tour_guide' => $data['name_tour_guide'],
            'phone_tour_guide' => $data['phone_tour_guide'],
        ];
        array_push($result, $row);
    }
    return $result;
}
function getStatus($status)
{
    $conn = connect();
    $sql = "SELECT * FROM tour_guide WHERE status =:status";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['status' => $status]);
    $result = [];
    while (true) {
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'id_tour_guide' => $data['id_tour_guide'],
            'name_tour_guide' => $data['name_tour_guide'],
            'phone_tour_guide' => $data['phone_tour_guide'],
            'status' => $data['status'],
        ];
        array_push($result, $row);
    }
    return $result;
}
function getIdTourGuide($id)
{
    $conn = connect();
    $sql = "SELECT * FROM tour_guide WHERE id_tour_guide = :id_tour_guide";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_tour_guide' => $id]);
    $data = $stmt->fetch();

    $row = [
        'id_tour_guide' => $data['id_tour_guide'],
        'name_tour_guide' => $data['name_tour_guide'],
        'phone_tour_guide' => $data['phone_tour_guide'],
    ];

    return $row;
}
function insertTourGuide(array $data)
{
    $conn = connect();
    $sql = "INSERT INTO tour_guide(name_tour_guide, phone_tour_guide) VALUES( :name_tour_guide, :phone_tour_guide)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}
function updateTourGuide($data)
{
    $conn = connect();
    $sql = "UPDATE tour_guide SET name_tour_guide =:name_tour_guide, phone_tour_guide =:phone_tour_guide WHERE id_tour_guide =:id_tour_guide";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
    return true;
}
function updateActive($data)
{
    $conn = connect();
    $sql = "UPDATE tour_guide SET status =:status WHERE id_tour_guide =:id_tour_guide";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
    return true;
}
function deleteTourGuide($id)
{
    $conn = connect();
    $sql = "DELETE FROM tour_guide WHERE id_tour_guide = :id_tour_guide";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_tour_guide' => $id]);
}

