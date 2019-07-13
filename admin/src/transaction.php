<?php
    require_once "../lib/bootstrap.php";

    if(empty(getReq('id'))){
        $ordersQuery = $db->query("SELECT * FROM orders");
        $orders = [];
        while($r = $ordersQuery->fetch_object()) $orders[] = $r; 
    }else{
        $id = getReq('id');
        $order = $db->query("SELECT *, SUM((SELECT (qty * price) FROM order_details_view WHERE order_id = orders.id)) as total FROM orders WHERE id = $id;")->fetch_object();
        $confirmation = $db->query("SELECT * FROM bank_confirmation WHERE order_id = $id ORDER BY id DESC;")->fetch_object();
        $detailQuery = $db->query("SELECT * FROM order_details_view WHERE order_id = $id;");
        $details = [];

        $statuses = ["WAIT FOR PAYMENT","ON PROCESS","ON DELIVERY","COMPLETE"];
        while($r = $detailQuery->fetch_object()) $details[] = $r;

        if(isButtonSubmit()){
            $formData['id'] = $id;
            $formData['status'] = postReq('status');
            DBUpdate($db,$formData,'orders');
            header("location: transaction.php?id=$id");
        }
            
    }
?>