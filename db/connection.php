<?php
 function connect()
{
    $dbHost = ("mysql:host=localhost; dbname=duan1");
    $dbUser = "root";
    $dbPass = "";
    $conn = new PDO($dbHost, $dbUser, $dbPass);
    // $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn; 
}
