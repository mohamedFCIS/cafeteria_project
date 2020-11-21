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
 
class AddCategory
{
  public $pdo;
    public $insertQry;
   public  $dsn;
 public  $user;
   public  $pass;

    public function database()
    {
        $this->dsn = 'mysql:dbname=cafeteria;host:localhost';
       $this->user = 'root';
       $this->pass = '';
        $this->pdo = new PDO( $this->dsn,  $this->user,  $this->pass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ( $this->pdo) {
            // echo "connect with database is success";
        } else {
            echo " connect with database is failed";
        }
       
    }
    public function insertData()
    {
$Category=$_POST['Category'];
$this->insertQry="INSERT INTO `categories`(`catagory_name`) VALUES (?)";
$stmt=$this->pdo->prepare($this->insertQry);
// var_dump($stmt);
$stmt->execute([$Category]);  
}

}
$addC = new AddCategory();
$addC->database();
$addC->insertData();

?>
</body>
</html>