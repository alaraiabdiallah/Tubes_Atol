<?php
    require_once "lib/bootstrap.php";
    require_once "src/product.php";
    if(isset($_GET['id']))
        require_once "views/product-detail.php";
    else
        require_once "views/products.php";

?>