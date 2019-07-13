<?php
require_once "partials/header.php";
require_once "partials/sidebar.php";
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-primary">
        <div class="box-body">
          <?php if(isset($errors['query'])):?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <?php echo $errors['query']?>
            </div>
          <?php endif;?>
          
          <script>
            $(".alert").alert();
          </script>
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group has-feedback">
              <label for="code">Kode Barang</label>
              <input type="text" class="form-control" name="code" required placeholder="Kode Barang" value="<?php echo $formData['code'] ?>">
              <span class="help-block"></span>
            </div>
            <div class="form-group has-feedback">
              <label for="name">Nama Barang</label>
              <input type="text" class="form-control" name="name" required placeholder="Nama Barang" value="<?php echo $formData['name'] ?>">
              <span class="help-block"></span>
            </div>
            <div class="form-group has-feedback">
              <label for="stock">Stock</label>
              <input type="number" class="form-control" name="stock" required placeholder="Stok Barang" value="<?php echo $formData['stock'] ?>">
              <span class="help-block"></span>
            </div>
            <div class="form-group has-feedback">
              <label for="price">Harga Barang</label>
              <input type="number" class="form-control" name="price" required placeholder="Harga Barang" value="<?php echo $formData['price'] ?>">
              <span class="help-block"></span>
            </div>

            <div class="form-group">
              <label for="descriptions">Descriptions</label>
              <textarea class="form-control" name="descriptions" id="descriptions" rows="5"><?php echo $formData['descriptions'] ?></textarea>
            </div>

            <div class="form-group has-feedback">
              <label for="image">Gambar</label>
              <input type="file" class="form-control" name="image" placeholder="Gambar Barang">
              <?php if(isEdit() && !empty($formData['image'])):?>
                <img src="../uploads/<?php echo $formData['image'] ?>" alt="product image" width="200">
              <?php endif; ?>
              <span class="help-block"></span>
            </div>
            <div class="row">
              <div class="col-xs-1">
                <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
              </div>
              <div class="col-xs-1">
                <a class="btn btn-default btn-block btn-flat" href="barang.php" role="button">Batal</a>
              </div>
              <!-- /.col -->
            </div>
          </form>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php require_once "partials/footer.php"; ?>