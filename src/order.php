<?php
    require_once "lib/bootstrap.php";

    if(empty(getReq("code"))){
        $user_id = getUserInfo('id');
        $ordersQuery = $db->query("SELECT * FROM orders WHERE user_id = $user_id;");
        $orders = [];
        while($r = $ordersQuery->fetch_object()){
            $orders[] = $r;
        }
    }else{

        
        
        $code = getReq('code');
        $order = $db->query("SELECT *, SUM((SELECT (qty * price) FROM order_details_view WHERE order_id = orders.id)) as total FROM orders WHERE code = '$code';")->fetch_object();
        $orderDetailQuery = $db->query("SELECT * FROM order_details_view WHERE order_id = '".$order->id."';");
        $orderDetails = [];
        while($row = $orderDetailQuery->fetch_object()){
            $orderDetails[] = $row; 
        }
        
        if(getReq("action") == "complete"){
            $data['id'] = $order->id;
            $data['status'] = "COMPLETE";
            DBUpdate($db,$data,"orders");
            header('location: order.php');
        }

    }
?>