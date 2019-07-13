<?php
require_once "partials/header.php";
require_once "partials/sidebar.php";
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Barang
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div style="margin-bottom: 10px">
        <a class="btn btn-success" href="barang.php?action=add" role="button"><i class="fa fa-plus-circle"></i> Tambah Barang</a>
      </div>
      <div class="box box-primary">
        <!-- /.box-header -->
        <div class="box-body">
          <?php if(isset($errors['query'])): ?>
          <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <?php echo $errors['query'] ?>
          </div>
          <?php endif ?>
          
          <script>
            $(".alert").alert();
          </script>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Nama Barang</th>
                  <th>Stok</th>
                  <th>Harga</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i= 1; foreach($results as $row): ?>
                  <tr>
                    <td scope="row"><?php echo $i++; ?></td>
                    <td><?php echo $row->code ?></td>
                    <td><?php echo $row->name ?></td>
                    <td><?php echo numberFormatID($row->stock) ?></td>
                    <td><?php echo currencyID($row->price) ?></td>
                    <td>
                      <a class="btn btn-primary btn-xs" href="barang.php?action=edit&id=<?php echo $row->id ?>" role="button"><i class="fa fa-pencil"></i> Edit</a>
                      <a class="btn btn-danger btn-xs" href="barang.php?action=delete&id=<?php echo $row->id ?>" role="button"><i class="fa fa-trash-o"></i> Delete</a>
                    </td>
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php require_once "partials/footer.php"; ?>