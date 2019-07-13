<?php
    require_once "src/order.php";
    redirectWhenGuest('index.php');
    if(empty(getReq("code")))
        require_once "views/order.php";
    else
        require_once "views/order_detail.php";
?>