
<?php
  include 'header.php';
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