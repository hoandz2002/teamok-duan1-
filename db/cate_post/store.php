<?php
require_once "./cate_post.php";
$data = [
    'name_cate_post' => $_POST['name_cate_post'],
];


insert($data);
header('location: ./list_cate_post.php');
