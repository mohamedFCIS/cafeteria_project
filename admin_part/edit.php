<?php include '../auth/admin_auth.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="row">

<nav class="navbar navbar-expand-lg navbar-light bg-active">

    <a class="navbar-brand" href="#">Cafeteria</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav mr-auto">

        <li class="nav-item active">

            <a class="nav-link" href="prpducts.php">Home <span class="sr-only">(current)</span></a>

          </li>

        <li class="nav-item active">

          <a class="nav-link" href="Allproducts.php">Products <span class="sr-only">(current)</span></a>

        </li>

        <li class="nav-item active">

          <a class="nav-link" href="#">Users</a>

        </li>

        <li class="nav-item active">

            <a class="nav-link" href="#">Manual Orders</a>

        </li>

        <li class="nav-item active">

            <a class="nav-link" href="checks.php">Checks</a>

        </li>     

      </ul>

    </div>

  </nav>
  </div>  
<?php
 
     $dsn = 'mysql:dbname=cafeteria;host:localhost';
    $user = 'root';
     $pass = '';
     $pdo;
    

  
   $pdo=new PDO($dsn,$user,$pass);
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
            $updateQry="UPDATE `products` SET `product_Id`=:product_Id,`product_name`=:product_name,`product_price`=:product_price,`product_picture`=:product_picture WHERE product_Id=:product_Id";     
         $count=$pdo->prepare($updateQry);
         
        //  $count->bindParam(":product_Id",$product_Id,PDO::PARAM_INT);
         $count->execute(array(":product_Id"=>$product_Id, ":product_name"=>$product_name,":product_price"=>$product_price, ":product_picture"=>$product_picture));
          echo $count->rowCount();
         
    
  


?>