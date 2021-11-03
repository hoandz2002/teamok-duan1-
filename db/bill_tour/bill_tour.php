<?php 
require_once "./../connection.php";
function getall(){
    $conn = connect();
    $sql = "SELECT * FROM hang_hoa inner join loai_hang on hang_hoa.ma_loai = loai_hang.ma_loai";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = [];
    while(true){
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'ma_hh' => $data['ma_hh'],
            'ten_hh' => $data['ten_hh'],
            'don_gia' => $data['don_gia'],
            'giam_gia' => $data['giam_gia'],
            'hinh' => $data['hinh'],
            'ngay_nhap' => $data['ngay_nhap'],
            'mo_ta' => $data['mo_ta'],
            'so_luot_xem' => $data['so_luot_xem'],
            'ten_loai' => $data['ten_loai'],
            'kho_hang' => $data['kho_hang']

        ];
        array_push($result, $row);
    }
    return $result;
}
function get_product_4(){
    $conn = connect();
    $sql = "SELECT * FROM hang_hoa 
    WHERE so_luot_xem > 0 
    ORDER BY so_luot_xem DESC LIMIT 0, 4";
    

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = [];
    while(true){
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'ma_hh' => $data['ma_hh'],
            'ten_hh' => $data['ten_hh'],
            'don_gia' => $data['don_gia'],
            'giam_gia' => $data['giam_gia'],
            'hinh' => $data['hinh'],
            'ngay_nhap' => $data['ngay_nhap'],
            'mo_ta' => $data['mo_ta'],
            'so_luot_xem' => $data['so_luot_xem']
        ];
        array_push($result, $row);
    }
    return $result;
}
function get_product_new(){
    $conn = connect();
    $sql = "SELECT * FROM hang_hoa ORDER BY ma_hh DESC LIMIT 0, 4";
    

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = [];
    while(true){
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'ma_hh' => $data['ma_hh'],
            'ten_hh' => $data['ten_hh'],
            'don_gia' => $data['don_gia'],
            'giam_gia' => $data['giam_gia'],
            'hinh' => $data['hinh'],
            'ngay_nhap' => $data['ngay_nhap'],
            'mo_ta' => $data['mo_ta'],
            'so_luot_xem' => $data['so_luot_xem']
        ];
        array_push($result, $row);
    }
    return $result;
}
function getid($id){
    $conn = connect();
    $sql = "SELECT * FROM hang_hoa inner join loai_hang on hang_hoa.ma_loai = loai_hang.ma_loai WHERE ma_hh = :ma_hh";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['ma_hh' => $id]);
    
        $data = $stmt->fetch();
        
        $row = [
            'ma_hh' => $data['ma_hh'],
            'ten_hh' => $data['ten_hh'],
            'don_gia' => $data['don_gia'],
            'giam_gia' => $data['giam_gia'],
            'hinh' => $data['hinh'],
            'ngay_nhap' => $data['ngay_nhap'],
            'mo_ta' => $data['mo_ta'],
            'so_luot_xem' => $data['so_luot_xem'],
            'ten_loai' => $data['ten_loai'],
            'kho_hang' => $data['kho_hang']

        ];
   
    return $row;
}
function getall1(){
    $conn = connect();
    $sql = "SELECT * FROM loai_hang";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = [];
    while(true){
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'ma_loai' => $data['ma_loai'],
            'ten_loai' => $data['ten_loai']
        ];
        array_push($result, $row);
    }
    return $result;
}
function insert(array $data){
    $conn = connect();
    $sql = "INSERT INTO hang_hoa( ten_hh, don_gia, giam_gia, hinh, ngay_nhap, mo_ta, so_luot_xem, ma_loai)" . 
    "VALUES( :ten_hh, :don_gia, :giam_gia, :hinh, :ngay_nhap, :mo_ta, :so_luot_xem, :ma_loai)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}
function update($data){
    $conn = connect();
    $sql = "UPDATE hang_hoa SET ten_hh =:ten_hh, don_gia =:don_gia, giam_gia =:giam_gia, hinh =:hinh, ngay_nhap =:ngay_nhap, mo_ta =:mo_ta, so_luot_xem =:so_luot_xem, ma_loai =:ma_loai,kho_hang=:kho_hang WHERE ma_hh = :ma_hh";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
    return true;
}
function delete($id){
    $conn = connect();
    $sql = "DELETE FROM hang_hoa WHERE ma_hh = :ma_hh";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['ma_hh' => $id]);
}
