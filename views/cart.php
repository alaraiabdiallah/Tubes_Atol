<?php 
require_once "partials/header.php"; 
require_once "partials/navbar.php"; 
?>
<br />
<div class="container">
    <h2>Shopping Cart</h2>
    <?php if(count(getCarts()) > 0):?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1; foreach(getCarts() as $cart): ?>
            <tr>
                <td scope="row"><?php echo $no++ ?></td>
                <td>
                    <a href="product.php?id=<?php echo $cart['id'] ?>"><?php echo $cart['name'] ?></a> x <?php echo $cart['qty'] ?><br />
                    <?php echo currencyID($cart['qty'] * $cart['price'])?>
                </td>
                <td>
                    <form action="cart.php?id=<?php echo $cart['id'] ?>" method="POST">
                        <input type="number" value="<?php echo $cart['qty'] ?>" name="qty" style="width: 40px"/>
                        <a href="cart.php?id=<?php echo $cart['id'] ?>&action=delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        
            <tfoot>
                <tr>
                    <th>Total</th>
                    <th><?php echo currencyID(cartsTotal())?></th>
                    <th><a href="checkout.php" class="btn btn-primary">Checkout</a></th>
                </tr>
            </tfoot>
    </table>
    <?php else:?>
        <div class="card">
            <div class="card-body">Empty Cart, <a href="product.php">click here to start shopping</a></div>
        </div>
    <?php endif;?>
</div>


<?php require_once "partials/footer.php"; ?>