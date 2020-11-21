<?php
session_start();
if (!isset($_SESSION['User'])){
    header('location: ../auth/login.php');
}
if (isset($_SESSION['user_type'])){
    if ($_SESSION['user_type'] != 'admin'){
        header('location: ../user_part/user_home.php');
    }
}
