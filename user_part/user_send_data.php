<?php
session_start();
if (!isset($_SESSION['User'])){
    header('location: ../auth/login.php');
}
?>
<?php
$tea = $_POST["tea"];
$milk = $_POST["milk"];
$cofe = $_POST["cofe"];
$helba = $_POST["helba"];

$user_id = 6;
$orderSum = $tea * 5 + $milk * 10 + $cofe * 8 + $helba * 6;
if ($orderSum != 0) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cafeteria";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql = "INSERT INTO `orders`(`order_action`, `order_price`, `user_Id`, `status_Id`)
VALUES ('Done'," . $orderSum . "," . $user_id . ",'3')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $lastId =  $conn->lastInsertId();

    if ($tea != 0) {
        $query = "INSERT INTO `userorder`(`product_Id`, `order_Id`, `quantity`) 
    VALUES (" . "1" . "," . $lastId . "," . $tea . ")";
        $stmt = $conn->prepare($query);
        $stmt->execute();
    }

    if ($milk != 0) {
        $query = "INSERT INTO `userorder`(`product_Id`, `order_Id`, `quantity`) 
    VALUES (" . "4" . "," . $lastId . "," . $milk . ")";
        $stmt = $conn->prepare($query);
        $stmt->execute();
    }
    if ($cofe != 0) {
        $query = "INSERT INTO `userorder`(`product_Id`, `order_Id`, `quantity`) 
    VALUES (" . "2" . "," . $lastId . "," . $cofe . ")";
        $stmt = $conn->prepare($query);
        $stmt->execute();
    }
    if ($helba != 0) {
        $query = "INSERT INTO `userorder`(`product_Id`, `order_Id`, `quantity`) 
    VALUES (" . "3" . "," . $lastId . "," . $helba . ")";
        $stmt = $conn->prepare($query);
        $stmt->execute();
    }


    if ($stmt) {
        header("Location: user_home.php");
    } else {
        echo "Fail";
    }
} else {
    echo "You need to choose order first";
    header("Location: user_home.php");
}
