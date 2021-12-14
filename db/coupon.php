<?php
//List các hàm
function getAllCoupon()
{
    $conn = connect();
    $sql = "SELECT * FROM coupon INNER JOIN bill_tours ON coupon";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = [];
    while (true) {
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'id_coupon' => $data['id_coupon'],
            'name_coupon' => $data['name_coupon'],
            'number_coupon' => $data['number_coupon'],
            'code_coupon' => $data['code_coupon'],
        ];
        array_push($result, $row);
    }
    return $result;
}
function getIdCoupon($id)
{
    $conn = connect();
    $sql = "SELECT * FROM coupon WHERE id_coupon = :id_coupon";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_coupon' => $id]);
    $data = $stmt->fetch();

    $row = [
        'id_coupon' => $data['id_coupon'],
        'name_coupon' => $data['name_coupon'],
        'number_coupon' => $data['number_coupon'],
        'code_coupon' => $data['code_coupon'],
    ];

    return $row;
}
function insertCoupon(array $data)
{
    $conn = connect();
    $sql = "INSERT INTO coupon(name_coupon, number_coupon, code_coupon)"."VALUES( :name_coupon, :number_coupon, :code_coupon)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}
function updateCoupon($data)
{
    $conn = connect();
    $sql = "UPDATE coupon SET name_coupon = :name_coupon, number_coupon = :number_coupon, code_coupon = :code_coupon WHERE id_coupon = :id_coupon";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
    return true;
}
function deleteCoupon($id)
{
    $conn = connect();
    $sql = "DELETE FROM coupon WHERE id_coupon = :id_coupon";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_coupon' => $id]);
}