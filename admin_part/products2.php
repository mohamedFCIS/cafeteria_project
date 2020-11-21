<?php include '../auth/admin_auth.php'?>
<?php



$dns = "mysql:dbname=cafeteria;host=localhost;";
$username = 'root';
$password = "";

try {
    
    $db = new PDO($dns,$username,$password);
    

    $query = "SELECT * FROM `products`";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_OBJ);
    
} catch (Throwable $th) {
    throw $th;
}