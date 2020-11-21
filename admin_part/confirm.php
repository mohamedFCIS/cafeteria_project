<?php include '../auth/admin_auth.php'?>
<?php

$dns = "mysql:dbname=cafeteria;host=localhost;";
$username = 'root';
$password = "";


// echo "<pre>";
var_dump($_POST);
// var_dump($_POST['data']);

// echo"</pre>";


$orderSum = 0;

for ($i = 1 ; $i < count($_POST['data']);$i++){
    $qty = $_POST['data'][$i]['count'];
    $price = $_POST['data'][$i]['price'];
    $productId = $_POST['data'][$i]['id'];

     $orderSum += $qty * $price ;
    
}
    
    $user_id= $_POST['userId'];
    echo $orderSum . "</br>";
    echo $user_id;
    try {
        
        $db = new PDO($dns,$username,$password);
        
    
        $query = "INSERT INTO `orders`(`order_action`, `order_price`, `user_Id`, `status_Id`)
                 VALUES ('Done',".$orderSum.",".$user_id.",'1')";
        var_dump($query);
        $stmt = $db->prepare($query);
        $stmt->execute();
        $lastId =  $db->lastInsertId();
        // $products = $stmt->fetchAll(PDO::FETCH_OBJ);

        for ($i = 1 ; $i < count($_POST['data']);$i++){
            
            $qty = $_POST['data'][$i]['count'];
            $price = $_POST['data'][$i]['price'];
            $productId = $_POST['data'][$i]['id'];
           
            $query2 = "INSERT INTO `userorder`(`product_Id`, `order_Id`, `quantity`) 
            VALUES (".$productId.",".$lastId.",".$qty.")";
            
            var_dump($query2);
            $stmt = $db->prepare($query2);
            $stmt->execute();
        }
       
       
    } catch (Throwable $th) {
        echo "there is a wrong ";
        throw $th;
    }