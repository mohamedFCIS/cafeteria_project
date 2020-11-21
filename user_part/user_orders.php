<?php
session_start();
if (!isset($_SESSION['User'])){
    header('location: ../auth/login.php');
}
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">
</head>
<style>
    body {
        position: absolute;
        width: 100%;
        text-align: center;
        font-size: 18px;
        background-color: #f2f2f2;
        color: #333;
    }

    .img-block {
        float: right;
        margin-right: 100px;
        text-align: center;
        margin-bottom: 30px;
        margin-top: 250px;
    }




    img {
        width: 200px;
        min-height: 100px;
        margin-bottom: 10px;
        box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075) !important;
        border: 6px solid #f7f7f7;
    }
</style>

<body>
    <!------------------------------------------------startbody----------------------------------------------------------------->
    <!------navbar------>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="user_home.php"> Site</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="user_home.php">Home</a></li>
                    <li><a href="user_orders.php">My Orders</a></li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!------end navbar------>
    <div class="test">
        <form action="user_orders.php" method="POST">

            <label for="orders date">
                <h2>My orders</h2>
            </label><br>
            From <input type="date" name="from_date" value="dateFirst"> TO
            <input type="date" name="to_date" value="dateSecond">
            <input type="submit" name="submit" value="Submit"><br><br>

        </form>

        <?php

        $user_id = 1;
        $from_date = isset($_POST["from_date"]) ? $_POST["from_date"] : (isset($_GET["from_date"]) ? $_GET["from_date"] : "");
        $to_date = isset($_POST["to_date"]) ? $_POST["to_date"] : (isset($_GET["to_date"]) ? $_GET["to_date"] : "");

        if ($from_date == '' || $to_date == '') {
            echo "<p style='color:blue'>place choose date to search for!</p> <br>";
        }
        if ($from_date > $to_date) {
            echo "<p style='color:red'>place choose correct date to search for!</p> <br>";
        }

        if ($from_date != '' && $to_date != '' && $from_date <= $to_date) {
            echo "Date from " . $from_date . " to " . $to_date;

            echo "<table style='border: solid 1px black; position: absolute;
            width: 80%;
            right:10%;
            text-align: center;
            font-size: 18px;'>";
            echo "<tr><th style='width:auto;border:1px solid black;text-align: center;'>Order Date</th><th style='width:auto;border:1px solid black;text-align: center;'>Status</th><th style='width:auto;border:1px solid black; text-align: center;'>Amount</th><th style='width:auto;border:1px solid black;text-align: center;'>Action</th></tr>";

            $x = 0;

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "cafeteria";
            try {


                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare("SELECT o.order_id,o.date,s.status_name ,o.order_price as total 
        FROM orders o, status s where s.status_Id =o.status_Id and o.user_id =" . $user_id . " and
        s.status_name !='" . "cancel" . "'  and o.date >='" . $from_date . "' and o.date<='" . $to_date . "' 
        GROUP BY o.order_id desc");


                $stmt->execute();


                while ($row = $stmt->fetch()) {

                    echo "<tr><td style='width:auto;border:1px solid black;'>" . "<a href='user_orders.php?id_date=" . $row["order_id"] . "&from_date=" . $from_date . "&to_date=" . $to_date . "'>" . $row["date"] . "</a>" .
                        "</td><td style='width:auto;border:1px solid black;'>" . $row["status_name"] .
                        "</td><td style='width:auto;border:1px solid black;'>"  . $row["total"] . "</td>" .
                        (($row["status_name"] == "processing") ? " <td style='width:auto;border:1px solid black;'>
             <a href='user_cancel.php?id=" . $row["order_id"] . "&from_date=" . $from_date . "&to_date=" . $to_date . "'>cancel </a> </td> " : "") . "</tr>";
                    $x += $row["total"];
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }


            echo " <br><p style='position: absolute;
        font-size: 20px;
        bottom: 1px;
        right: 45%;'><b> Total : </b>   EGP " . $x . "</p>";
            echo "</table>";
        }
        ?>
    </div>
    <?php

    if (isset($_GET["id_date"])) {
        $id = $_GET["id_date"];
        $image_query = $conn->prepare("select p.product_price,p.product_name,p.product_picture, u.quantity 
    from products p,userorder u WHERE p.product_Id=u.product_Id and order_id=$id");
        $image_query->execute();

        while ($rows = $image_query->fetch()) {
            $img_price = $rows['product_price'];
            $img_name = $rows['product_name'];
            $img_src = $rows['product_picture'];
            $img_quantity = $rows['quantity'];


    ?>
            <div class="img-block">
                <p><strong><?php echo $img_price . " LE"; ?></strong></p>
                <img src="<?php echo $img_src; ?>" alt="" title="<?php echo $img_name; ?>" />
                <p><strong><?php echo $img_name; ?></strong></p>
                <p><strong><?php echo $img_quantity; ?></strong></p>

            </div>

    <?php
        }
    }
    $conn = null;
    ?>


</body>

</html>