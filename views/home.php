<?php 
require_once "partials/header.php"; 
require_once "partials/navbar.php"; 
?>
<br />
<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Selamat Datang di Rai Shop</h1>
        <p class="lead">Kami menyediakan komponen elektronik murah.</p>
        <a class="btn btn-primary btn-lg" href="product.php" role="button">Mulai Belanja</a>
    </div>
    <h2>New Release</h2>
    <div class="row">
        <?php foreach($products as $product): ?>
            <div class="col-3 col-md-3 col-sm-6 col-xs-12">
                <?php require "partials/product-list-item.php"?>
            </div>
        <?php endforeach; ?>
    </div>
    <?php if(count($products) > 4):?>
        <br />
        <div class="text-center">
            <a href="product.php" class="btn btn-primary">More Product</a>
        </div>
        <br />
    <?php endif;?>
</div>


<?php require_once "partials/footer.php"; ?>