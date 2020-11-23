<?php
include '../auth/admin_auth.php';
include 'header.php';
include('products2.php');
include('users.php');
?>

<div class="container">

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