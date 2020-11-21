<?php
session_start();
if (!isset($_SESSION['User'])){
    header('location: login.php');
}
if (isset($_SESSION['user_type'])){
    if ($_SESSION['user_type'] != 'admin_part'){
        header('location: user_home.php');
    }
}
?>
<a href="logout.php">logout</a>
<h1>welcome <?php echo $_SESSION['User']?></h1>
