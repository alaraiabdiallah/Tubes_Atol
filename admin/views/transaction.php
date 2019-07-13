<?php
require_once "partials/header.php";
require_once "partials/sidebar.php";
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Transaction</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Code</th>
                            <th>Order Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; foreach($orders as $order):?>
                            <tr>
                                <td scope="row"><?php echo $no++; ?></td>
                                <td><?php echo $order->code ?></td>
                                <td><?php echo $order->order_name ?></td>
                                <td>
                                    <a href="?id=<?php echo $order->id ?>" class="btn btn-primary btn-sm">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php require_once "partials/footer.php"; ?>