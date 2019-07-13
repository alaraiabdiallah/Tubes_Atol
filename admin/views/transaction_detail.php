<?php
require_once "partials/header.php";
require_once "partials/sidebar.php";
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Transaction Detail</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-3 col-sm-3 col-xs-12">
                        <h3>Order Info</h3>
                        <strong>Order Code:</strong><br><?php echo $order->code ?><br />
                        <strong>Customer Name:</strong><br><?php echo $order->order_name ?><br />
                        <strong>Customer Phone:</strong><br><?php echo $order->order_phone ?><br />
                        <strong>Customer Address:</strong><br><?php echo $order->order_address ?><br />
                        <strong>Customer Zip Code:</strong><br><?php echo $order->order_zipcode ?><br />
                        <strong>Status:</strong><br><?php echo $order->status ?><br />
                    </div>
                    <div class="col-lg-3 col-sm-3 col-xs-12">
                        <h3>Confirmation</h3>
                        <strong>Bank Name:</strong><br><?php echo $confirmation->bank_name ?><br />
                        <strong>Account Name:</strong><br><?php echo $confirmation->account_name ?><br />
                        <strong>Account Number:</strong><br><?php echo $confirmation->account_number ?><br />
                        <strong>Transfer At:</strong><br><?php echo $confirmation->transfer_at ?><br />
                    </div>
                </div>
                <hr>
                <h4>Update</h4>
                <div class="row">
                    <form action="<?php echo getCurrentUrl() ?>" method="post" class="col-lg-2">
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status" class="form-control">
                                <option value="">--SELECT--</option>
                                <?php foreach($statuses as $status):?>
                                    <option value="<?php echo $status?>" <?php echo $status == $order->status? "selected": ""; ?>><?php echo $status?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="box box-primary">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($details as $detail):?>
                            <tr>
                                <td scope="row"><?php echo $no++; ?></td>
                                <td><?php echo $detail->name; ?></td>
                                <td><?php echo currencyID($detail->price); ?></td>
                                <td><?php echo numberFormatID($detail->qty); ?></td>
                                <td><?php echo currencyID(($detail->qty*$detail->price)); ?></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4">Total</th>
                            <td><?php echo currencyID($order->total)?></td>
                        </tr>
                    </tfoot>
            </table>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php require_once "partials/footer.php"; ?>