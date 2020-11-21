<?php include '../auth/admin_auth.php'?>
<?php

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    
$dns = "mysql:dbname=cafeteria;host=localhost;";
$username = 'root';
$password = "";

try {
    
    $db = new PDO($dns,$username,$password);
    

    $query = "SELECT `products`.`product_name`,`userorder`.`order_Id`, `userorder`.`quantity` , `products`.`product_picture` , `products`.`product_price` FROM `products`, `userorder` 
    WHERE `products`.`product_Id` = `userorder`.`product_Id` AND `userorder`.`order_Id` = ".$id;
     
    $stmt = $db->prepare($query);
    $stmt->execute();
    $orderProducts = $stmt->fetchAll(PDO::FETCH_OBJ);
    // var_dump($orderProducts);
    //  echo json_encode($orderProducts);

 
    foreach ($orderProducts as $key => $value) { ?>
      <?php echo  "<div class='col-3'>     
            <h1>".$value->product_name."</h1>"
            ."<img src='".$value->product_picture."' alt='' srcset=''>"
            ."<label style='color: #0d0b9c'>Price: $value->product_price </label>"
            ."<label style='color: #0d0b9c'>QTY: $value->quantity </label>"
        ."</div>";
        
    }

} catch (Exception $th) {
    throw $th;
}

}
