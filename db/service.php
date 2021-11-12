<?php 

function getall(){
    $conn = connect();
    $sql = "SELECT * FROM service";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = [];
    while(true){
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'id_service' => $data['id_service'],
            'name_service' => $data['name_service'],
            'description_service' => $data['description_service'],
            'price_service' => $data['price_service'],
        ];
        array_push($result, $row);
    }   
    return $result;
}

function getid($id){
    $conn = connect();
    $sql = "SELECT * FROM service  WHERE id_service =:id_service ";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_service' => $id]);
    
        $data = $stmt->fetch();
        
        $row = [
            'id_service' => $data['id_service'],
            'name_service' => $data['name_service'],
            'description_service' => $data['description_service'],
            'price_service' => $data['price_service'],
        ];
   
    return $row;
}
function insert(array $data){
    $conn = connect();
    $sql = "INSERT INTO service(name_service, description_service,price_service)" . 
    "VALUES(:name_service, :description_service, :price_service)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}
function update($data){
    $conn = connect();
    $sql= "UPDATE service SET name_service=:name_service, description_service=:description_service, price_service=:price_service WHERE id_service=:id_service";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
    return true;
}
function delete($id){
    $conn = connect();
    $sql = "DELETE FROM service WHERE id_service = :id_service";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_service' => $id]);
}

