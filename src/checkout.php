<?php
    require_once "lib/bootstrap.php";
    redirectWhenGuest("login.php");
    $order_name = $db->escape_string(postReq('order_name'));
    $order_phone = $db->escape_string(postReq('order_phone'));
    $order_address = $db->escape_string(postReq('order_address'));
    $order_zipcode = $db->escape_string(postReq('order_zipcode'));
    if(isButtonSubmit()){
        try{
            $user_id = getUserInfo('id');
            $code    = "TRX-".substr(md5(date('ymdhisa').$user_id),0,10); 
            $db->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
            $insertSql = "INSERT INTO orders 
                VALUES(NULL, '$user_id','$code','$order_name','$order_phone','$order_address','$order_zipcode','WAIT FOR PAYMENT','BANK');";
            $orderQuery = $db->query($insertSql);
            if(!$orderQuery)
                throw new Exception("Insert order Failed"); 
            $last_id = $db->insert_id;
            $values = [];
            foreach(getCarts() as $cart){
                $values[] = "(NULL,'$last_id','".$cart['id']."','".$cart['qty']."')";
            }
            $insertDetailSql = "INSERT INTO order_details VALUES ".implode(",",$values).";"; 
            $orderDetailQuery = $db->query($insertDetailSql);
            if(!$orderDetailQuery)
                throw new Exception("Insert order detail Failed");

            $db->commit();
            unset($_SESSION['carts']);
            header("location: confirmation.php?code=$code");
        }catch(Exception $e){
            $db->rollback();
            header('location: checkout.php');
        }
    }
?>
