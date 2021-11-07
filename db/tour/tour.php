<?php 

require_once "./../connection.php";
function getall(){
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
            'time_tours' => $data['time_tours'],
            'name_location' => $data['name_location'],
        ];
        array_push($result, $row);
    }   
    return $result;
}

function getid($id){
    $conn = connect();
    $sql = "SELECT * FROM tours inner join location on tours.id_location = location.id_location";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_tour' => $id]);
    
        $data = $stmt->fetch();
        
        $row = [
            'id_tours' => $data['id_tours'],
            'name_tours' => $data['name_tours'],
            'description_tours' => $data['description_tours'],
            'price_tours' => $data['price_tours'],
            'time_tours' => $data['time_tours'],
            'name_location' => $data['name_location'],
            'city_location' => $data['city_location'],
            'description_location' => $data['description_location']
        ];
   
    return $row;
}
function insert(array $data){
    $conn = connect();
    $sql = "INSERT INTO tours(image_tours,name_tours, description_tours, price_tours, time_tours,id_location)" . 
    "VALUES(:image_tours, :name_tours, :description_tours, :price_tours, :time_tours,:id_location)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}
function update($data){
    $conn = connect();
    $sql = "UPDATE tours SET name_tours =:name_tours, description_tours =:description_tours, price_tours =:price_tours, time_tours =:time_tours, name_location =:name_location, city_location =:city_location, description_location =:description_location, ma_loai =:ma_loai,kho_hang=:kho_hang WHERE ma_hh = :ma_hh";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
    return true;
}
function delete($id){
    $conn = connect();
    $sql = "DELETE FROM tour WHERE ma_hh = :ma_hh";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['ma_hh' => $id]);
}

