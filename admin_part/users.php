<?php include '../auth/admin_auth.php'?>
<?php


$dns = "mysql:dbname=cafeteria;host=localhost;";
$username = 'root';
$password = "";

try {
    $db = new PDO($dns,$username,$password);

    $query = "SELECT * FROM `users`";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_OBJ);

    // json_encode($users);


} catch (Throwable $th) {
    throw $th;
}
    
    