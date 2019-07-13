<?php

    $productQuery = $db->query("SELECT * FROM product ORDER BY id LIMIT 4;");
    $products = [];
    while($r = $productQuery->fetch_object()){
        $products[] = $r;
    }
?>