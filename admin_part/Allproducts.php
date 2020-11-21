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

            <a class="nav-link" href="products.php">Home <span class="sr-only">(current)</span></a>

          </li>

        <li class="nav-item active">

          <a class="nav-link" href="#">Products <span class="sr-only">(current)</span></a>

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
 
class allproducts{
    private $dsn = 'mysql:dbname=cafeteria;host:localhost';
    private $user = 'root';
    private $pass = '';
    private $pdo;
    
   
   
   function __construct()
  {
    $this->pdo=new PDO($this->dsn,$this->user,$this->pass);
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      if ($this->pdo) {
        //   echo "connect with database is success";
      } else {
          echo " connect with database is failed";
      }
  }
 
  public function showProducts(){
     
    
     
      $selectQry="SELECT `product_Id`,`product_name`, `product_price`, `product_picture`FROM `products` WHERE 1";
         echo"<a style='margin-left: 500px;' href='Addprodu.php'>Addproduct</a>";
          echo"<table border='1px' cellpadding='10' cellspacing='5'>
          <tr>
          <th>product_id</th>
          <th>product_name</th>
					<th>product_price</th>
                    <th>product_picture</th>
                    <th>Action</th>
          </tr>";
          
          foreach ($this->pdo->query($selectQry) as $row) {

         echo" <tr>
         <td>$row[product_Id]</td>
          <td>$row[product_name]</td>
          <td>$row[product_price]</td>
          <td>$row[product_picture]</td>
          <td>
          <form method='POST' action='test.php'>
          <input type='hidden' name='product_Id' value='$row[product_Id]' >
          <input style='width:80px' type='submit' name='delete' value='delete'>
          </form>
          <form method='POST' action='test.php'>
          <input type='hidden' name='product_Id' value='$row[product_Id]' >
          <input type='hidden' name='product_name' value='$row[product_name]' >
          <input type='hidden' name='product_price' value='$row[product_price]' >
          <input type='hidden' name='product_picture' value='$row[product_picture]' >
          <input style='width:80px' type='submit' name='update' value='Update'>
          </form>
  
    </td>
          </tr>";       
          }
   echo"</table>";
   
 }
 
//  public function hello(){
//      $edit=$_POST['edit'];
//     echo"hello";
// }
 
}




$all=new allproducts();
$all->showProducts();
// $all->hello();

?>
</body>
</html>