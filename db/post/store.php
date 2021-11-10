<?php
require_once "./post.php";
$data = [
    'image_post' => $_FILES['image_post']['name'],
    'name_post' => $_POST['name_post'],
    'description_post' => $_POST['description_post'],
];

$file = $_FILES['image_post'];
$file_name = $file['name'];
move_uploaded_file($file['tmp_name'], './../../asset/img/' . $file_name);

insert($data);
header('location: ./list_post.php');
