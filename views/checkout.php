<?php 
require_once "partials/header.php"; 
require_once "partials/navbar.php"; 
?>
<br />
<div class="container">
    <h2>Address Info</h2>
    <form action="checkout.php" method="POST">
        <div class="form-group">
            <label for="order_name">Name</label>
            <input type="text" required class="form-control" id="order_name" name="order_name" aria-describedby="order_name" placeholder="Your name">
        </div>
        <div class="form-group">
            <label for="order_phone">Phone</label>
            <input type="text" required class="form-control" id="order_phone" name="order_phone" aria-describedby="order_phone" placeholder="Your phone">
        </div>
        <div class="form-group">
            <label for="order_address">Address</label>
            <textarea class="form-control" required name="order_address" id="order_address" rows="3" placeholder="Your Address"></textarea>
        </div>
        <div class="form-group">
            <label for="order_zipcode">Zip Code</label>
            <input type="text" required class="form-control" id="order_zipcode" name="order_zipcode" aria-describedby="order_zipcode" placeholder="Your Zip Code">
        </div>
        <h3>Your order</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="10%">No</th>
                    <th>Item</th>
                </tr>
            </thead>
            <tbody>
            <?php $no = 1; foreach(getCarts() as $cart): ?>
                <tr>
                    <td scope="row"><?php echo $no++ ?></td>
                    <td>
                        <?php echo $cart['name'] ?> x <?php echo $cart['qty'] ?><br />
                        <?php echo currencyID($cart['qty'] * $cart['price'])?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Total</th>
                    <th><?php echo currencyID(cartsTotal())?></th>
                </tr>
            </tfoot>
        </table>
        <h3>Payment</h3>
        <div class="card">
            <div class="card-body">
                <h5>Do Bank Transfer for the payment to:</h5>
                <p>Account : 04342342423 <br /> Account Name: Ala Rai  <br />Bank: BNI BANK</p>
            </div>
        </div>
        <br />
        <button type="submit" name="submit" class="btn btn-primary">Order</button>
    </form>
</div>


<?php require_once "partials/footer.php"; ?>