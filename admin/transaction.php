<?php
    require_once "src/transaction.php";
    if(empty(getReq('id')))
        require_once "views/transaction.php";
    else
        require_once "views/transaction_detail.php";
?>