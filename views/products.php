<?php 
require_once "partials/header.php"; 
require_once "partials/navbar.php"; 
?>
<br />
<div class="container">
    <h1>Our Products</h1>
    <div class="row">
        <?php foreach($products as $product): ?>
            <div class="col-3 col-md-3 col-sm-6 col-xs-12">
                <?php require "partials/product-list-item.php"?>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<?php require_once "partials/footer.php"; ?>