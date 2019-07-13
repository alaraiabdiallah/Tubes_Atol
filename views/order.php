<?php 
require_once "partials/header.php"; 
require_once "partials/navbar.php"; 
?>
<br />
<div class="container">
    <h2>My Order</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Code</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;foreach($orders as $order): ?>
                <tr>
                    <td scope="row"><?php echo $no++ ?></td>
                    <td><?php echo $order->code ?></td>
                    <td><?php echo $order->status ?></td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="order.php?code=<?php echo $order->code ?>" role="button">View Detail</a>
                        <?php if($order->status == "WAIT FOR PAYMENT"):?>
                            <a class="btn btn-primary btn-sm" href="confirmation.php?code=<?php echo $order->code ?>" role="button">Transfer Confirmation</a>
                        <?php endif; ?>

                        <?php if($order->status == "ON DELIVERY"):?>
                            <a class="btn btn-primary btn-sm" href="order.php?code=<?php echo $order->code ?>&action=complete" role="button">Order Received</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php require_once "partials/footer.php"; ?>