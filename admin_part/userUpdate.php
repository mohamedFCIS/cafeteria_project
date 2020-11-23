<?php include '../auth/admin_auth.php'?>
<?php
require("DataManipulation.php");

use \useDatabase\IUD;

$userinfo = "mysql:dbname=cafeteria;host=localhost;port=3306";
$username = "root";
$userpass = "";


$newconn = new IUD($userinfo, $username, $userpass);
$connect = $newconn->connDatabase();

if (isset($_GET["update-id"])) {
    $id = $_GET["update-id"];

    $data = $newconn->selectData("users");

   
    foreach ($data as $value) {
        if ($value["Id"] == $id) {
            $fname = $value["user_name"];
            $phone = $value["user_phone"];
            $email = $value["user_email"];
            $user_type = $value["user_type"];
            $img = $value["user_profile_picture"];
        } else {
            continue;
        }
    }
} else {
    echo 'error connction';
}


// update data into database 


if (isset($_POST["create"])) {
  
    $fname = $_POST["fname"];
    $phone = $_POST["phone"];
    $pass = $_POST["psw"];
    $email = $_POST["email"];
    $user_type = $_POST["user_type"];
    
    if (isset($_FILES["file"])) {
        
        $imagUpload = $newconn->uploadImage($_FILES["file"]);
        $img = $imagUpload;
    } 
    else {
        echo "error selected file";
    }



    $newconn->setData($fname, $phone, $pass, $email, $img, $user_type);
  
    $newconn->UpdateData("users", $id);
}




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafeteria</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery.js"></script>

    <script src="js/bootstrap.bundle.js"></script>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2 "></div>
            <div class="col-md-8 col-sm-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-primary  text-center">Update User</h3>

                    </div>
                    <div class="card-body">

                        <form class="form was-validated" method="post" action="" enctype="multipart/form-data">
                            <label>Full Name :</label>
                            <input type="text" class="form-control" name="fname" value="<?php echo $fname ?>" required>

                            <label>Email :</label>
                            <input type="email" class="form-control email" name="email" value="<?php echo $email ?>" required>
                            <label>Phone Number :</label>
                            <input type="tel" class="form-control" name="phone" pattern="[0-9]{11}" value="<?php echo $phone ?>" placeholder="11 number" required>

                            <label>Password :</label>
                            <input type="password" class="form-control psw" name="psw" required>
                            <label>Re Password :</label>
                            <input type="password" class="form-control psw2" name="password2" required>
                            <label>Upload Profile Image :</label>



                            <div class="custom-file p-3">
                                <input type="file" class="custom-file-input customFile" id="customFile2"  name="file" >
                                
                                <label class="custom-file-label"  for="customFile"> 
                                    
                                <img class="custom-file-label p-0  img-fluid" id="myImageID"   src="<?php echo $img ?>" alt=" ">
                                
                                </label>
                            </div>




                            <label>permission</label>
                            <select class="form-control" name="user_type" id="mySelect" required>
                                <option value="">select permition</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>

                    </div>
                    <div class="card-footer">

                        <input type="submit" class="btn btn-primary submite"  name="create" value="submit">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="js/cafee.js"></script>

    <script>
        
        //change select item in update page
        $(document).ready(function() {
            document.getElementById("mySelect").value = "<?php echo $user_type ?>";


        });
    </script>
</body>

</html>