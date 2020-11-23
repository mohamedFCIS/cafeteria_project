<?php include '../auth/admin_auth.php';
include 'header.php';


$dsn = 'mysql:dbname=cafeteria;host:localhost';
$user = 'root';
$pass = '';
$pdo;



$pdo = new PDO($dsn, $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if ($pdo) {
  //   echo "connect with database is success";
} else {
  echo " connect with database is failed";
}


$product_Id = $_POST['product_Id'];
$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$product_picture = $_POST['product_picture'];

//   echo  $product_Id."". $product_name."".$product_price. $product_picture;
$updateQry = "UPDATE `products` SET `product_Id`=:product_Id,`product_name`=:product_name,`product_price`=:product_price,`product_picture`=:product_picture WHERE product_Id=:product_Id";
$count = $pdo->prepare($updateQry);

//  $count->bindParam(":product_Id",$product_Id,PDO::PARAM_INT);
$count->execute(array(":product_Id" => $product_Id, ":product_name" => $product_name, ":product_price" => $product_price, ":product_picture" => $product_picture));
echo $count->rowCount();
