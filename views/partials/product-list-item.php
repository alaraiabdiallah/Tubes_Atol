<div class="card product-list-item">
    <img src="uploads/<?php echo $product->image ?>" class="card-img-top" alt="<?php echo $product->name ?> image">
    <div class="card-body">
        <h5 class="card-title"><?php echo $product->name ?></h5>
        <p class="card-text"><?php echo strlen($product->descriptions) > 30? substr($product->descriptions,0,30) : $product->descriptions ?></p>
        <p class="card-text"><strong><?php echo currencyID($product->price) ?></strong></p>
        <a href="product.php?id=<?php echo $product->id ?>" class="btn btn-success">See more</a>
        <a href="cart.php?id=<?php echo $product->id ?>&from=<?php echo getCurrentUrl() ?>" class="btn btn-primary">Add to cart</a>
    </div>
</div>