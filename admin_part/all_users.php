<?php include '../auth/admin_auth.php'?>
<?php
require("DataManipulation.php");

use \useDatabase\IUD;



$userinfo = "mysql:dbname=cafeteria;host=localhost";
$username = "root";
$userpass = "";


$newconn = new IUD($userinfo, $username, $userpass);
$connect = $newconn->connDatabase();


//delete from database 


if (isset($_GET["delete-id"])) {
    $id = $_GET["delete-id"];
    var_dump($id);
    $newconn->DeleteData($id);
}
// insert into database


if (isset($_POST["create"])) {
    
    $fname = $_POST["fname"];
    $phone = $_POST["phone"];
    $pass = $_POST["psw"];
    $email = $_POST["email"];
    $user_type = $_POST["user_type"];
    
    if (isset($_FILES["file"])) {
        $imagUpload = $newconn->uploadImage($_FILES["file"]);
        $img = $imagUpload;
    } else {
        echo "error selected file";
    }


    $newconn->setData($fname, $phone, $pass, $email, $img, $user_type);
    $newconn->insertData("users");
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
    <div class="contaner ">
        <div class="row">

            <div class="col-md ml-5 mr-5">
                <div class="modal fade" id="user-modal">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header  ">
                                <h4 class="modal-title "><kbd class="bg-primary  ">New User</kbd></h4>
                                <botton class="close" data-dismiss="modal">&times</botton>
                            </div>
                            <div class="modal-body">

                                <form class="form was-validated" method="post" id="we" action="" enctype="multipart/form-data" >
                                    <label>Full Name :</label>
                                    <input type="text" class="form-control" name="fname" required>

                                    <label>Email :</label>
                                    <input type="email" class="form-control email" name="email" required>
                                    <label>Phone Number :</label>
                                    <input type="number" class="form-control" pattern="[0-9]{11}"  name="phone" required>

                                    <label>Password :</label>
                                    <input type="password" class="form-control psw " name="psw" required>
                                    <label>Re Password :</label>
                                    <input type="password" class="form-control psw2" name="password2" required>
                                    <label>Upload Profile Image :</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input customFile" id="" name="file" required>
                                        
                                        <label class="custom-file-label  " for="customFile">

                                            <img class="custom-file-label p-0 img-fluid" id="myImageID" src="Error.src" onerror="this.style.display='none'" alt="choose file">

                                        </label>
                                    </div>
                                    <label>permission</label>
                                    <select class="form-control" name="user_type" id="user_type" required>
                                        <option value="">select permition</option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                    


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary submite" name="create" value="submit">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>




                <div class="card m-4">
                    <div class="card-header text-center">
                        <button class="btn btn-primary  float-left" data-toggle="modal" data-target="#user-modal">
                            <span class="fa fa-user mr-1">
                            </span> Add User</button>

                        <h3>Users Information</h3>
                    </div>
                    <div class="card-body"> 

                        <table class="table table-light table-hover table-bordered mx-3 mt-3 ">
                            <thead class="thead-light text-center ">

                                <tr>
                                    <th>USer Name</th>
                                    <th>Email</th>
                                    <th>Phon Number</th>
                                    <th>Profle Image</th>
                                    <th>user_Auth</th>
                                    <th>Update</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>

                            <!-- select data from database -->



                            <?php

                            if ($connect) {
                                $users = $newconn->selectData("users");

                                foreach ($users as  $value) {
                            ?>
                                    <!-- table  show data -->

                                    <tr>
                                        <td><?php echo $value["user_name"];  ?></td>
                                        <td><?php echo $value["user_email"];  ?></td>
                                        <td><?php echo $value["user_phone"];  ?></td>


                                        <td class="text-center w-25"> <img class="img w-25 " src="<?php echo $value["user_profile_picture"];  ?>" alt="<?php echo $value["user_profile_picture"]; ?>"></td>
                                        <td><?php echo $value["user_type"];  ?></td>
                                        <td><a href="userUpdate.php?update-id=<?php echo $value["Id"]; ?>" class="btn btn-primary" name="Update">Update</td>
                                        <td><a href="users.php?delete-id=<?php echo $value["Id"]; ?>" class="btn btn-danger" name="delete">delete</td>



                                    </tr>

                            <?php
                                }
                            } else {
                                echo "the fatal error";
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/cafee.js"></script>


</body>

</html>