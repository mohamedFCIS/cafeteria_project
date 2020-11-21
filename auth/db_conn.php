<?php
$conn = mysqli_connect("localhost", "root" ,"" , "cafeteria");
if (! $conn){
    echo mysqli_connect_error();
    exit();
}