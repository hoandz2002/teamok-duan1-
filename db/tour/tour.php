<?php 

require_once "./../connection.php";
function getAll(){
    $conn = connect();
    $sql = "SELECT * FROM tours inner join location on tours.id_location = location.id_location";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = [];
    while(true){
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'id_tours' => $data['id_tours'],
            'image_tours' => $data['image_tours'],
            'name_tours' => $data['name_tours'],
            'description_tours' => $data['description_tours'],
            'price_tours' => $data['price_tours'],
            'name_location' => $data['name_location'],
        ];
        array_push($result, $row);
    }   
    return $result;
}

function getid($id){
    $conn = connect();
    $sql = "SELECT * FROM tours inner join location on tours.id_location = location.id_location WHERE id_tours =:id_tours ";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_tours' => $id]);
    
        $data = $stmt->fetch();
        
        $row = [
            'id_tours' => $data['id_tours'],
            'image_tours' => $data['image_tours'],
            'name_tours' => $data['name_tours'],
            'description_tours' => $data['description_tours'],
            'price_tours' => $data['price_tours'],
            'id_location' => $data['id_location'],
        ];
   
    return $row;
}
function insert(array $data){
    $conn = connect();
    $sql  = "INSERT INTO tours(image_tours, name_tours, description_tours, price_tours,id_location)" .
    "VALUES(:image_tours, :name_tours, :description_tours, :price_tours, :id_location)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}
function update($data){
    $conn = connect();
    $sql = "UPDATE tours SET image_tours =:image_tours, name_tours =:name_tours, description_tours =:description_tours, price_tours =:price_tours, id_location =:id_location WHERE id_tours =:id_tours";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
    return true;
}
function delete($id){
    $conn = connect();
    $sql = "DELETE FROM tours WHERE id_tours = :id_tours";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_tours' => $id]);
}

