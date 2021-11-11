<?php 
require_once "./../connection.php";
function getall(){
    $conn = connect();
    $sql = "SELECT * FROM bill_tours inner join customer on bill_tours.id_customer = customer.id_customer inner join tours on bill_tours.id_tours = tours.id_tours  inner join service on bill_tours.id_service = service.id_service ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = [];
    while(true){
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [	
            'id_bill_tours' => $data['id_bill_tours'],
            'name_customer' => $data['name_customer'],
            'id_customer' => $data['id_customer'],
            'quantity_pp' => $data['quantity_pp'],
            'price_bill_tours' => $data['price_bill_tours'],
            'name_tours' => $data['name_tours'],
            'date_book' => $data['date_book'],
            'name_service' => $data['name_service'],
            'date_start' => $data['date_start'],
        ];
        array_push($result, $row);
    }
    return $result;
}

function getid($id){
    $conn = connect();
    $sql = "SELECT * FROM bill_tours inner join customer on bill_tour.id_customer = customer.id_customer inner join tour on bill_tour.id_tours = tour.id_tours  inner join service on bill_tour.id_service = service.id_service 
    WHERE id_bill_tours = :id_bill_tours";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_bill_tours' => $id]);
    
        $data = $stmt->fetch();
        
        $row = [
            'id_bill_tours' => $data['id_bill_tours'],
            'name_customer' => $data['name_customer'],
            'id_customer' => $data['id_customer'],
            'quantity_pp' => $data['quantity_pp'],
            'price_bill_tours' => $data['price_bill_tours'],
            'id_tours' => $data['id_tours'],
            'date_book' => $data['date_book'],
            'id_service' => $data['id_service'],
            'date_start' => $data['date_start'],

        ];
   
    return $row;
}

function insert(array $data){
    $conn = connect();
    $sql = "INSERT INTO bill_tours( name_customer, id_customer, quantity_pp, price_bill_tours, id_tours, date_book, id_service,date_start)" . 
    "VALUES( :name_customer, :id_customer, :quantity_pp, :price_bill_tours, :id_tours,:date_book, :id_service,:date_start)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}
function update($data){
    $conn = connect();
    $sql = "UPDATE bill_tours SET name_customer =:name_customer, id_customer =:id_customer, quantity_pp =:quantity_pp, price_bill_tours =:price_bill_tours, id_tours =:id_tours, date_boook =:date_book id_service =:id_service, date_start =:date_start WHERE id_bill_tours = :id_bill_tours";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
    return true;
}
function delete($id){
    $conn = connect();
    $sql = "DELETE FROM bill_tours WHERE id_bill_tours = :id_bill_tours";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_bill_tours' => $id]);
}
