<?php include '../auth/admin_auth.php'?>
<?php

include('products2.php');
include('users.php');
include('orders.php');
include('orderFetch.php')

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checks</title>

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
        <a class="navbar-brand" href="#">Checkss</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="products.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="Allproducts.php">Products <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Users</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Manual Orders</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Checks</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>

    <div class="row">

      <div class="col-12" id="things">
        <form action="checks.php" method="GET" id="sendData">
          <div class="row selectUsers align-content-center">
            <input type="date" value="<?= $_GET['fromDate'] ?? null ?>" class="form-input" name="fromDate" id="fromDate">
            <input type="date" value="<?= $_GET['toDate'] ?? null ?>" class="form-input" name="toDate" id="toDate">
          </div>

          <div class="row selectUsers align-content-center">
            <label for="">Add to user</label>
            <select name="users" class="form-input" id="orderUser">
              <option value="">Select user</option>
              <?php foreach ($users as $key => $user) {   ?>
                <option value="<?= $user->Id ?>" <?php if ($user->Id == ($_GET['users'] ?? null)) { ?> selected="selected" <?php } ?>> <?= $user->user_name ?></option>

              <?php } ?>
            </select>

          </div>
        </form>
        <div class="row align-content-center" id="ordersUser">
          <div class="col-12 col-md-6">
            <table class="table table-striped orderTb">
              <tr>
                <td>Name</td>
                <td>Total Amount</td>
              </tr>

              <?php foreach ($userUnique as $key => $user) {
              ?>

                <tr>
                  <td><?= $user['name'] . "<br>";

                      ?> </td>

                  <td><?= $user['sum'] ?></td>
                </tr>

              <?php } ?>
            </table>

            <table class="table table-striped orderTb">
              <tr>
                <td>Name</td>
                <td>Total Amount</td>
              </tr>

              <?php
              foreach ($userUnique as $key => $user) {

              ?>
                <?php foreach ($user['orders'] as $key1 => $order) {  ?>
                  <tr>
                    <td>

                      <?= $user['name'] . "<br>"; ?>
                      <i value="<?= $order['orderId'] ?>" style='margin-right:5px;' onclick="ayhaga(<?= $order['orderId'] ?>)" class='fas fa-plus'></i>
                      <?php echo "Date: " . $order['Date'] . "</br>  Price: EGP " . $order['price'] . "</br>";
                      ?> </td>

                    <td><?= $order['price'] ?></td>
                  </tr>

              <?php }
              } ?>
            </table>
          </div>
          <div class="col-6">
            <div class="row products" id="productFetch">
              <div class='col-3'>

              </div>
            </div>
          </div>


        </div>
      </div>


    </div>



    <script src="../jquery.js"></script>
    <script src="caf.js"></script>

</body>

</html>