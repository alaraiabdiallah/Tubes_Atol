<?php 
require_once "partials/header.php"; 
require_once "partials/navbar.php"; 
?>
<br />
<div class="container">
    <h2>Confirmation</h2>
    <div class="card">
        <div class="card-body">
            <h3>Your Order</h3>
            <div class="row">
                <div class="col-4 col-sm-12 col-xs-12">
                    <strong>Order Code:</strong><br><?php echo $order->code ?><br />
                    <strong>Customer Name:</strong><br><?php echo $order->order_name ?><br />
                    <strong>Customer Phone:</strong><br><?php echo $order->order_phone ?><br />
                    <strong>Customer Address:</strong><br><?php echo $order->order_address ?><br />
                    <strong>Customer Zip Code:</strong><br><?php echo $order->order_zipcode ?><br />
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
    <br />
    <form action="<?php echo getCurrentUrl() ?>" method="POST">
        <div class="form-group">
            <label for="bank_name">Bank Name</label>
            <input type="text" required class="form-control" id="bank_name" name="bank_name" aria-describedby="bank_name" placeholder="Your bank name">
        </div>
        <div class="form-group">
            <label for="account_number">Account Number</label>
            <input type="text" required class="form-control" id="account_number" name="account_number" aria-describedby="account_number" placeholder="Your account number">
        </div>
        <div class="form-group">
            <label for="account_name">Account Name</label>
            <input type="text" class="form-control" required name="account_name" id="account_name" rows="3" placeholder="Your account name" />
        </div>
        <div class="form-group">
            <label for="transfer_at">Transfer At</label>
            <input type="datetime-local" required class="form-control" id="transfer_at" name="transfer_at" aria-describedby="transfer_at">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Confirm</button>
    </form>
</div>


<?php require_once "partials/footer.php"; ?>