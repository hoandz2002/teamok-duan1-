<?php
function getall_bill()
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

        ];
        array_push($result, $row);
    }
    return $result;
}

function getid_bill($id)
{
    $conn = connect();
    $sql = "SELECT * FROM bill_tours inner join tours on bill_tours.id_tours = tours.id_tours  inner join service on bill_tours.id_service = service.id_service 
    WHERE id_customer = :id_customer";
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
            'bill_status' => $data['bill_status']
        ];

        array_push($result, $row);
    }
    return $result;
}
function getid_bill2($id)
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
            'bill_status' => $data['bill_status']
        ];

    return $row;
}
function insert_bill(array $data)
{
    $conn = connect();
    $sql = "INSERT INTO bill_tours( id_customer, quantity_pp, price_bill_tours, id_tours, date_book, id_service,date_start, bill_status)" .
        "VALUES( :id_customer, :quantity_pp, :price_bill_tours, :id_tours,:date_book, :id_service,:date_start, 0)";
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
