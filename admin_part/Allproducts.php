<?php

include 'header.php';
class allproducts
{
  private $dsn = 'mysql:dbname=cafeteria;host:localhost';
  private $user = 'root';
  private $pass = '';
  private $pdo;



  function __construct()
  {
    $this->pdo = new PDO($this->dsn, $this->user, $this->pass);
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($this->pdo) {
      //   echo "connect with database is success";
    } else {
      echo " connect with database is failed";
    }
  }

  public function showProducts()
  {



    $selectQry = "SELECT `product_Id`,`product_name`, `product_price`, `product_picture`FROM `products` WHERE 1";
    echo "<a style='margin-left: 500px;' href='Addprodu.php'>Addproduct</a>";
    echo "<table border='1px' cellpadding='10' cellspacing='5'>
          <tr>
          <th>product_id</th>
          <th>product_name</th>
					<th>product_price</th>
                    <th>product_picture</th>
                    <th>Action</th>
          </tr>";

    foreach ($this->pdo->query($selectQry) as $row) {

      echo " <tr>
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
    echo "</table>";
  }

  //  public function hello(){
  //      $edit=$_POST['edit'];
  //     echo"hello";
  // }

}




$all = new allproducts();
$all->showProducts();
// $all->hello();

?>
</body>

</html>