<?php
session_start();
if (!isset($_SESSION['User'])){
    header('location: ../auth/login.php');
}
?>

<!DOCTYPE html>
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
        background-color: #f2f2f2;
        color: #333;
    }

    .img-block {
        float: right;
        margin-right: 20px;
        text-align: center;
        margin-top: 50px;
    }


    img {

        width: 200px;
        min-height: 150px;
        margin-bottom: 10px;
        box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075) !important;
        border: 6px solid #f7f7f7;
    }

    .test {
        /* visibility: hidden; */
        border: 6px solid #f7f7f7;
        float: left;
        width: 300px;
        height: 400px;
        margin-top: 100px;
    }

    input {
        width: 70px;
    }


    .product {
        margin: 10px;
        display: block;
        float: right;

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
                    <li><a href="../auth/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!------end navbar------>
    <div>
        <div class="product">
            <p><strong>5 LE</strong></p>
            <img src="images/shay.png" alt="Tea" onclick="choseTea()">
            <p><strong> Tea</strong></p>
        </div>
        <div class="product">
            <p><strong>10 LE</strong></p>
            <img src="images/milk.jpg" alt="milk" onclick="chosemilk()">
            <p><strong> milk</strong></p>
        </div>
        <div class="product">
            <p><strong>8 LE</strong></p>
            <img src="images/cofe.jpg" alt="cofe" onclick="chosecofe()">
            <p><strong> cofe</strong></p>
        </div>
        <div class="product">
            <p><strong>6 LE</strong></p>
            <img src="images/7elba.jpg" alt="7elba" onclick="chose7elba()">
            <p><strong> 7elba</strong></p>
        </div>
    </div>

    <div class="test">
        <form action="user_send_data.php" method="post">
            <div id="Tea" style="display:none;"> Tea <input type="number" name="tea" id="teaNum" min="0" value="0">
                <strong>price</strong>
                total:$ <span id="teaPrice">0 </span>
            </div>
            <div id="Milk" style="display:none;"> Milk <input type="number" name="milk" id="milkNum" min="0" value="0">
                <strong>price</strong>
                total:$ <span id="milkPrice">0 </span>

            </div>
            <div id="Cofe" style="display:none;"> Cofe <input type="number" name="cofe" id="cofeNum" min="0" value="0">
                <strong>price</strong>
                total:$ <span id="cofePrice">0 </span>

            </div>
            <div id="Helba" style="display:none;"> Helba <input type="number" name="helba" id="helbaNum" min="0" value="0">
                <strong>price</strong>
                total:$ <span id="helbaPrice">0 </span>

            </div>
            <br>

            <input type="submit" value="Submit">
        </form>
    </div>

    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cafeteria";


    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $stmt = $conn->prepare("SELECT p.product_picture,p.product_name,u.quantity FROM userorder u, products p 
    WHERE p.product_Id=u.product_Id AND u.order_Id=(SELECT max(order_Id)FROM userorder)");


    $stmt->execute();

    while ($rows = $stmt->fetch()) {
        $img_name = $rows['product_name'];
        $img_src = $rows['product_picture'];
        $img_quantity = $rows['quantity'];

    ?>
        <div class="img-block">
            <p>Last order</p>
            <p><strong><?php echo $img_name; ?></strong></p>

            <img src="<?php echo $img_src; ?>" alt="" title="<?php echo $img_name; ?>" />
            <p><strong><?php echo $img_quantity; ?></strong></p>

        </div>



    <?php
    }
    ?>

    <!-----------------------------Start footer---------------------------------->
    <!-- Footer -->
    <footer class="page-footer font-small cyan darken-3" style="  text-align: center;">

        <!-- Footer Elements -->
        <div class="container">

            <!-- Grid row-->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-12 py-5">
                    <div class="mb-5 flex-center">

                        <!-- Facebook -->
                        <a class="fb-ic">
                            <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <!-- Twitter -->
                        <a class="tw-ic">
                            <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <!-- Google +-->
                        <a class="gplus-ic">
                            <i class="fab fa-google-plus-g fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <!--Linkedin -->
                        <a class="li-ic">
                            <i class="fab fa-linkedin-in fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <!--Instagram-->
                        <a class="ins-ic">
                            <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <!--Pinterest-->
                        <a class="pin-ic">
                            <i class="fab fa-pinterest fa-lg white-text fa-2x"> </i>
                        </a>
                    </div>
                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row-->

        </div>
        <!-- Footer Elements -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="https://github.com/MahmoudShalma"> Mahmoud Shalma</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
    <!-----------------------------End footer---------------------------------->

    <script src="maths.js"></script>
</body>

</html>