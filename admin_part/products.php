<?php include '../auth/admin_auth.php'?>
<?php
include('products2.php');
include('users.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafateria</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-active">
                <a class="navbar-brand" href="#">Cafeteria</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="Allproducts.php">Products <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="all_users.php">Users</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Manual Orders</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="checks.php">Checks</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link alert-danger" href="../auth/logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="row">
            <div class="col-5 bg-sucsses" id="bell">
                <div>
                    <span id='totalPrice' style='font-size:30px;'>
                    </span>
                    <div>
                        <button class='btn btn-primary' onclick="save()">Save</button>
                    </div>

                </div>
            </div>

            <div class="col-6" id="things">
                <div class="row selectUsers align-content-center">

                    <label for="">Add to user</label>
                    <select name="users" id="usersName">
                        <option value="">Select user</option>
                        <?php
                        foreach ($users as $key => $user) { ?>
                            <option value='<?= $user->Id ?>'><?= $user->user_name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="row products" id="products">
                    <?php foreach ($products as $product) { ?>
                        <div class='col-3'>
                            <img src='<?= $product->product_picture ?>' alt='' srcset=''>
                            <label>Price: <?= $product->product_price ?></label>
                            <button class='btn btn-success addTo' onclick="addToCard('<?= $product->product_name ?>','<?= $product->product_price ?>','<?= $product->product_Id ?>')" value='<?= $product->product_Id ?>'><?= $product->product_name ?></button>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>


    </div>
    <script src="../jquery.js"></script>
    <script src="caf.js"></script>
    <script src="bells.js"></script>
</body>

</html>