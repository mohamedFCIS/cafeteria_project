<?php
session_start();
if (!isset($_SESSION['User'])){
    header('location: ../auth/login.php');
}
?>
<?php


$id = $_GET["id"];
$from_date = $_GET["from_date"];
$to_date = $_GET["to_date"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cafeteria";


$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sql = "update orders set status_Id ='4' WHERE order_id=?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
if ($stmt) {
    header("Location: user_orders.php?from_date=".$from_date."&to_date=".$to_date);
    exit();
} else {
    echo "Fail";
}
