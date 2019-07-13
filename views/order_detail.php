<?php 
require_once "partials/header.php"; 
require_once "partials/navbar.php"; 
?>
<br />
<div class="container">
    <h2>Order Detail</h2>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-4 col-sm-12 col-xs-12">
                    <strong>Order Code:</strong><br><?php echo $order->code ?><br />
                    <strong>Customer Name:</strong><br><?php echo $order->order_name ?><br />
                    <strong>Customer Phone:</strong><br><?php echo $order->order_phone ?><br />
                    <strong>Customer Address:</strong><br><?php echo $order->order_address ?><br />
                    <strong>Customer Zip Code:</strong><br><?php echo $order->order_zipcode ?><br />
                    <strong>Status:</strong><br><?php echo $order->status ?><br />
                </div>
                <div class="col-8 col-sm-12 col-xs-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($orderDetails as $detail):?>
                                <tr>
                                    <td scope="row"><?php echo $i++ ?></td>
                                    <td><?php echo $detail->name." x ".$detail->qty ?></td>
                                    <td><?php echo currencyID($detail->amount) ?></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2">Total</td>
                                <td><?php echo currencyID($order->total) ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once "partials/footer.php"; ?>