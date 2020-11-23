<?php

namespace useDatabase {

    use PDO;

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    class IUD
    {

        public $fname;
        public $lname;
        public  $pass;
        public  $email;
        public  $phone;
        public $imag;
        public $user_type;

        public $dbinfo;
        public $userinfo;
        public $dbpass;
        public $dbconn;
        public function __construct($ginfo, $guserinfo, $gpass)
        {
            $this->dbinfo = $ginfo;
            $this->userinfo = $guserinfo;
            $this->pass = $gpass;
        }

        public function connDatabase()
        {

            $this->dbconn = new PDO($this->dbinfo, $this->userinfo, $this->dbpass);
            

            return $this->dbconn;
        }
        //set data
        public function setData($sfname, $sphone, $spass, $semail, $simag, $suser_type)
        {
            $this->fname = $sfname;
            $this->phone = $sphone;
            $this->pass = $spass;
            $this->email = $semail;
            $this->imag = $simag;
            $this->user_type = $suser_type;
        }

        //select data
        public function selectData($tableName)
        {
            $query = "SELECT * FROM  $tableName ";
            $preparData = $this->dbconn->prepare($query);
            $result = $preparData->execute();
            $users = $preparData->fetchAll();

            return $users;
        }






        //insert function


        public function insertData($table)
        {


            $instQry = "INSERT INTO users (`user_name` , `user_email` , `user_password` , `user_profile_picture` ,`user_phone`,`user_type`) 
        VALUES(:usfname  , :usemail , :uspassword  ,:usimage ,:usphone ,:ususer_type)";
            $instmt = $this->dbconn->prepare($instQry);




            $instmt->bindParam(":usfname", $this->fname);
            $instmt->bindParam(":usemail", $this->email);
            $instmt->bindParam(":uspassword", $this->pass);
            $instmt->bindParam("usimage", $this->imag);
            $instmt->bindParam(":usphone", $this->phone);
            $instmt->bindParam(":ususer_type", $this->user_type);
         

            $excute = $instmt->execute();
           
        }

        //update function 

        public function UpdateData($table, $id)
        {


            $upQary = "UPDATE $table SET `user_name`=:usfname , `user_email`= :usemail, 
            `user_password`=:uspassword , `user_profile_picture`=:usimage ,`user_phone`=:usphone,`user_type`=:ususer_type WHERE Id=$id";

            $prepData = $this->dbconn->prepare($upQary);

            $prepData->bindParam(":usfname", $this->fname);
            $prepData->bindParam(":usemail", $this->email);
            $prepData->bindParam(":uspassword", $this->pass);
            $prepData->bindParam("usimage", $this->imag);
            $prepData->bindParam(":usphone", $this->phone);
            $prepData->bindParam(":ususer_type", $this->user_type);
            $prepData->execute();
            header("Refresh:2 url=all_users.php");

            if ($prepData->execute()) {
                print "<div class='alert alert-success text-center'>Updated Successfully </div>";
            }
        }
        public function DeleteData($id)
        {


            $delQuary = "DELETE FROM users  WHERE `Id`=$id";
            $prepData = $this->dbconn->prepare($delQuary);
            $prepData->execute();
            header("Refresh:0 url= all_users.php");
        }








        // function upload image 

        public function uploadImage($upimag)
        {
            $target_dir = "images/";
            $target_file = $target_dir . basename($upimag["name"]);

            $checkUP = 1;


            // Check if image file is a actual image or fake image

            $check = getimagesize($upimag["tmp_name"]);

            if ($check !== false) {

                $checkUP = 1;
            } else {
                $checkUP = 0;
            }
            if (file_exists($target_file)) {
                $checkUP = 0;
            }

            if ($checkUP == 1) {
                move_uploaded_file($upimag["tmp_name"], $target_file);
            } else {
                
            }

            return $target_file;
        }
    }
}
