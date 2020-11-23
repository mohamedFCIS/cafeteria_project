<?php 
include '../auth/admin_auth.php';
include 'header.php';



class AddProduct
{
  public $pdo;
  public $insertQry;
  public  $dsn;
  public  $user;
  public  $pass;

  public function __construct()
  {
    $this->dsn = 'mysql:dbname=cafeteria;host:localhost';
    $this->user = 'root';
    $this->pass = '';
    $this->pdo = new PDO($this->dsn,  $this->user,  $this->pass);
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($this->pdo) {
      echo "connect with database is success";
    } else {
      echo " connect with database is failed";
    }
  }
  public function insertData()
  {
    $productName = $_POST['productName'];
    $price = $_POST['price'];
    $Category = $_POST['Category'];
    // echo $productName."".$price."".$Category;
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
      echo "The file " . basename($_FILES["picture"]["name"]) . " has been uploaded." . $target_file;
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
    $image = basename($_FILES["picture"]["name"]);
    $this->insertQry = "INSERT INTO `products` (`product_name`, `product_price`, `product_picture`, `catagory_id`) VALUES ( ?, ?, ?, ?)";
    $stmt = $this->pdo->prepare($this->insertQry);
    // var_dump($stmt);
    $stmt->execute([$productName, $price, $target_file, $Category]);
    if ($stmt) {
      echo "1 row effected";
    } else {
      echo "error in insert";
    }
  }
}

$addp = new AddProduct();
$addp->insertData();
?>
</body>

</html>