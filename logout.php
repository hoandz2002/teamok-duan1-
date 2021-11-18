<?php
session_start();
if (isset($_SESSION['user']) && $_SESSION['user'] != NULL) {
    unset($_SESSION['user']);
    header("location: /duan1/login_form.php");
   
}