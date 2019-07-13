<?php 
require_once "partials/header.php"; 
require_once "partials/navbar.php"; 
?>
<br />
<div class="container product-detail">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <img src="uploads/<?php echo $product->image ?>" alt="<?php echo $product->name ?>" class="img-fluid">
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <h1><?php echo $product->name; ?></h1>
            <p><?php echo $product->descriptions; ?></p>
            <div class="price">
                <span ><?php echo currencyID($product->price); ?></span>
            </div>
            <form action="cart.php?id=<?php echo $product->id ?>&from=<?php echo getCurrentUrl() ?>" method="POST">
                <label>
                    Qty<br />
                    <input type="number" value="0" name="qty" style="width: 100px"/>
                </label>
                <br />
                <button class="btn btn-primary">Add to cart</button>
            </form>
        </div>
    </div>
</div>


<?php require_once "partials/footer.php"; ?>