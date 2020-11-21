<?php include '../auth/admin_auth.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

<body>

<div class="row">

            <nav class="navbar navbar-expand-lg navbar-light bg-active">

                <a class="navbar-brand" href="#">Cafeteria</a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                  <ul class="navbar-nav mr-auto">

                    <li class="nav-item active">

                        <a class="nav-link" href="products.php">Home <span class="sr-only">(current)</span></a>

                      </li>

                    <li class="nav-item active">

                      <a class="nav-link" href="Addproduct.php">Products <span class="sr-only">(current)</span></a>

                    </li>

                    <li class="nav-item active">

                      <a class="nav-link" href="#">Users</a>

                    </li>

                    <li class="nav-item active">

                        <a class="nav-link" href="#">Manual Orders</a>

                    </li>

                    <li class="nav-item active">

                        <a class="nav-link" href="checks.php">Checks</a>

                    </li>     

                  </ul>

                </div>

              </nav>
            </div>  

    <h2>Add Product</h2>
    <table>
        <form method="POST" action="Addproduct.php" enctype="multipart/form-data" >
            <tr>
                <td><label>Product</label></td>
                <td><input type="text" name="productName"></td>
            </tr>
            <tr>
                <td><label>Price</label></td>
                <td><input type="number" name="price" step=".50" min="3.00" max="60.00">EGP</td>
            </tr>
            <tr>
                <td><label>Category</label></td>
                <td><select name="Category">
                        <option value="1"> hot Drinks</option>
                        <option value="2"> cool Drinks</option>
                    </select><a href="AddCategory.html">Add Category</a></td>
            </tr>
            <tr>
                <td><label>Product picture</label></td>
                <td><input type="file" name="picture"></td>
            </tr>
        
            <td>
                <input type="submit" value="save">
                <input type="reset" value="reset">
            </td>
            
        </form>
    </table>
    
</body>

</html>