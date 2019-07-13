<?php
    if(isset($_GET['id'])){
        $productId = $_GET['id'];
        $productQuery = $db->query("SELECT * FROM product WHERE id = '$productId' ORDER BY id;");
        $product = $productQuery->fetch_object();
    }else{
        $productQuery = $db->query("SELECT * FROM product ORDER BY id;");
        $products = [];
        while($r = $productQuery->fetch_object()){
            $products[] = $r;
        }
        
    }
?>