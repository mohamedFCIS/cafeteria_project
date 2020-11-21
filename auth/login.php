<?php
session_start();
if (isset($_POST['submit'])){
    $conn = mysqli_connect("localhost", "root" ,"" , "cafeteria");
    if (! $conn){
        echo mysqli_connect_error();
        exit();
    }

        $email = $_POST['email'];
        $password = md5($_POST['password']);
    $query= "SELECT * FROM users WHERE user_email='$email' AND user_password='$password' "  ;

    $result= mysqli_query($conn,$query);
    if (mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                if ($row['user_type'] == 'admin'){
                    $_SESSION['User'] = $row['user_email'];
                    $_SESSION['user_type'] = $row['user_type'];
                    header('location: ../admin_part/products.php');
                }else{
                    $_SESSION['User'] = $row['user_email'];
                    $_SESSION['user_type'] = $row['user_type'];
                    header('location: ../user_part/user_home.php');
                }
            }
    }elseif ($row['email'] != $email || $row['email'] != ''){
            $message = 'Invalid Email Or Password';
    }elseif ($row['passwod'] != $_POST['password'] || $row['passwod'] != ''){
        $message = 'Invalid Email or Password';
    }
    if ($email == '')
        $error1 = 'Email Required';
    if ($_POST['password'] == '')
        $error2 = 'Passwod Required';

}



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        span{
            color: red;
        }
    </style>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container-fluid mt-5 ">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 p-3 mt-5 border edit">
            <h1 class="text-center font-weight-bold">Cafeteria</h1>
            <form method="post">
                <div class="form-group">
                    <label for="">Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter Your Email"
                         value="<?php echo$_POST['email'] ?>"  ">
                        <span><?php echo $error1?></span>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Your Password"
                           value="<?php echo$_POST['password'] ?>"  ">
                    <span><?php echo $error2?></span>
                </div>
                    <span><?php echo $message ?></span>
                <div class="text-center">
                    <button type="submit" name="submit" class="other-btn ">Submit</button>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>