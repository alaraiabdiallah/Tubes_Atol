<?php
    require_once "lib/bootstrap.php";

    if(empty(getReq('code'))){
        header("location: index.php");
    }else{
        $code = getReq('code');
        $order = $db->query("SELECT *,SUM((SELECT (qty * price) FROM order_details_view WHERE order_id = orders.id)) as total FROM orders WHERE code = '$code';")->fetch_object();
        $orderDetailQuery = $db->query("SELECT * FROM order_details_view WHERE order_id = '".$order->id."';");
        $orderDetails = [];
        while($row = $orderDetailQuery->fetch_object()){
            $orderDetails[] = $row; 
        }
    }

    $formData['bank_name'] = postReq('bank_name');
    $formData['account_number'] = postReq('account_number');
    $formData['account_name'] = postReq('account_name');
    $formData['transfer_at'] = postReq('transfer_at');
    $formData['order_id'] = $order->id;

    if(isButtonSubmit()){
        try{
            DBInsert($db,$formData,'bank_confirmation');
            header("location: index.php");
        }catch(Exception $e){
            header("location: confirmation.php?code=".getReq('code'));
        }
    }

    require_once "views/confirmation.php";
?>