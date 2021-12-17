<?php
function getAllBill()
{
    $conn = connect();
    $sql = "SELECT * FROM bill_tours inner join customer on bill_tours.id_customer = customer.id_customer inner join tours on bill_tours.id_tours = tours.id_tours  inner join service on bill_tours.id_service = service.id_service ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = [];
    while (true) {
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'id_bill_tours' => $data['id_bill_tours'],
            'id_customer' => $data['id_customer'],
            'quantity_pp' => $data['quantity_pp'],
            'price_bill_tours' => $data['price_bill_tours'],
            'id_tours' => $data['id_tours'],
            'name_tours' => $data['name_tours'],
            'image' => $data['image'],
            'date_book' => $data['date_book'],
            'name_service' => $data['name_service'],
            'price_service' => $data['price_service'],
            'date_start' => $data['date_start'],
            'bill_status' => $data['bill_status'],
            'id_coupon' => $data['id_coupon'],

        ];
        array_push($result, $row);
    }
    return $result;
}

function getIdBill($id)
{
    $conn = connect();
    $sql = "SELECT * FROM bill_tours inner join tours on bill_tours.id_tours = tours.id_tours  inner join service on bill_tours.id_service = service.id_service "
        . "WHERE id_customer = :id_customer";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_customer' => $id]);
    $result = [];
    while (true) {
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }

        $row = [
            'id_bill_tours' => $data['id_bill_tours'],
            'id_customer' => $data['id_customer'],
            'quantity_pp' => $data['quantity_pp'],
            'price_bill_tours' => $data['price_bill_tours'],
            'id_tours' => $data['id_tours'],
            'name_tours' => $data['name_tours'],
            'price_tours' => $data['price_tours'],
            'sale_tours' => $data['sale_tours'],
            'image' => $data['image'],
            'date_book' => $data['date_book'],
            'name_service' => $data['name_service'],
            'price_service' => $data['price_service'],
            'date_start' => $data['date_start'],
            'bill_status' => $data['bill_status'],
            'id_coupon' => $data['id_coupon'],
        ];

        array_push($result, $row);
    }
    return $result;
}
function getBillStatus($id)
{
    $conn = connect();
    $sql = "SELECT * FROM bill_tours inner join tours on bill_tours.id_tours = tours.id_tours  inner join customer on bill_tours.id_customer = customer.id_customer" .
        "WHERE bill_status =: bill_status";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['bill_status' => $id]);
    $result = [];
    while (true) {
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }

        $row = [
            'id_bill_tours' => $data['id_bill_tours'],
            'name_customer' => $data['name_customer'],
            'quantity_pp' => $data['quantity_pp'],
            'price_bill_tours' => $data['price_bill_tours'],
            'id_tours' => $data['id_tours'],
            'name_tours' => $data['name_tours'],
            'price_tours' => $data['price_tours'],
            'sale_tours' => $data['sale_tours'],
            'image' => $data['image'],
            'date_book' => $data['date_book'],
            'name_service' => $data['name_service'],
            'price_service' => $data['price_service'],
            'date_start' => $data['date_start'],
            'bill_status' => $data['bill_status'],
            'id_coupon' => $data['id_coupon'],
        ];

        array_push($result, $row);
    }
    return $result;
}
function getIdBill2($id)
{
    $conn = connect();
    $sql = "SELECT * FROM bill_tours inner join tours on bill_tours.id_tours = tours.id_tours  inner join service on bill_tours.id_service = service.id_service 
    WHERE id_bill_tours = :id_bill_tours";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_bill_tours' => $id]);

    $data = $stmt->fetch();
    $row = [
        'id_bill_tours' => $data['id_bill_tours'],
        'id_customer' => $data['id_customer'],
        'quantity_pp' => $data['quantity_pp'],
        'price_bill_tours' => $data['price_bill_tours'],
        'id_tours' => $data['id_tours'],
        'name_tours' => $data['name_tours'],
        'price_tours' => $data['price_tours'],
        'sale_tours' => $data['sale_tours'],
        'image' => $data['image'],
        'date_book' => $data['date_book'],
        'name_service' => $data['name_service'],
        'price_service' => $data['price_service'],
        'id_service' => $data['id_service'],
        'date_start' => $data['date_start'],
        'bill_status' => $data['bill_status'],
        'id_coupon' => $data['id_coupon'],
    ];

    return $row;
}
function insert_bill(array $data)
{
    $conn = connect();
    $sql = "INSERT INTO bill_tours( id_customer, quantity_pp, price_bill_tours, id_tours, date_book, id_service,date_start, bill_status, id_coupon)" .
        "VALUES( :id_customer, :quantity_pp, :price_bill_tours, :id_tours,:date_book, :id_service,:date_start, 0, :id_coupon)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}
function update_bill($data)
{
    $conn = connect();
    $sql = "UPDATE bill_tours SET  id_customer =:id_customer, quantity_pp =:quantity_pp, price_bill_tours =:price_bill_tours, id_tours =:id_tours, date_book =:date_book, id_service =:id_service, date_start =:date_start, bill_status =:bill_status WHERE id_bill_tours = :id_bill_tours";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
    return true;
}
function delete_bill($id)
{
    $conn = connect();
    $sql = "DELETE FROM bill_tours WHERE id_bill_tours = :id_bill_tours";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_bill_tours' => $id]);
}


function couponCustomer($data)
{
    $conn = connect();
    $sql = "SELECT * FROM bill_tours inner join coupon on bill_tours.id_coupon = coupon.id_coupon WHERE id_customer =:id_customer AND id_bill_tours=:id_bill_tours";
    $statement = $conn->prepare($sql);
    $statement->execute($data);

    $data = $statement->fetch();
    $row = [
        'id_bill_tours' => $data['id_bill_tours'],
        'id_coupon' => $data['id_coupon'],
        'code_coupon' => $data['code_coupon'],
        'percent_coupon' => $data['percent_coupon'],
    ];

    return $row;
}
function updateCouponInBill($data)
{
    $conn = connect();
    $sql = "UPDATE bill_tours SET id_coupon =:id_coupon WHERE id_bill_tours =:id_bill_tours";
    $statement = $conn->prepare($sql);
    $statement->execute($data);

    return true;
}
function checkCoupon($coupon)
{
    $conn = connect();
    $sql = "SELECT count(*) FROM `coupon` WHERE code_coupon =:code_coupon";
    $result = $conn->prepare($sql);
    $result->execute(['code_coupon' => $coupon]);
    $number_of_rows = $result->fetchColumn();

    return $number_of_rows;
}

function getPercentCoupon($id)
{
    $conn = connect();
    $sql = "SELECT * FROM bill_tours inner join coupon on bill_tours.id_coupon = coupon.id_coupon WHERE id_bill_tours = :id_bill_tours";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_bill_tours' => $id]);
    $data = $stmt->fetch();
    $row = [
        'id_bill_tours' => $data['id_bill_tours'],
        'id_coupon' => $data['id_coupon'],
        'percent_coupon' => $data['percent_coupon'],
        'code_coupon' => $data['code_coupon'],
    ];

    return $row;
}

function checkSameCoupon($id_customer)
{
    $conn = connect();
    $sql = "SELECT * FROM bill_tours inner join coupon on bill_tours.id_coupon = coupon.id_coupon WHERE id_customer = :id_customer";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_customer' => $id_customer]);
    $result = [];
    while (true) {
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'id_bill_tours' => $data['id_bill_tours'],
            'id_coupon' => $data['id_coupon'],
            'percent_coupon' => $data['percent_coupon'],
            'code_coupon' => $data['code_coupon'],
        ];

        array_push($result, $row);
    }
    return $result;
}
