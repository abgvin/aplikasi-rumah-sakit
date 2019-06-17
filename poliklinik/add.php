<?php include_once ( "../_header.php" ); ?>

<div class="box">
  <h1>Data Poliklinik</h1>
  <h4>
    <small>Tambah Data Poliklinik</small>
    <div class="pull-right">
      <a href="data.php" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-list"></i> Data</a>
      <a href="generate.php" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Data lagi</a>
    </div>
  </h4>

  <div class="row">
    <div class="col-lg-6 col-lg-offset-3">
      <form action="proses.php" method="post">
       <input type="hidden" name="total" value="<?= $_POST['count_add'] ?>">
       <table class="table">

        <tr>
          <th># </th>
          <th>Nama Poliklinik</th>
          <th>Gedung</th>
        </tr>
        <?php for ($i=1; $i <= $_POST['count_add']; $i++) : ?>
        <tr>
          <td><?= $i ?></td>
          <td><input type="text" name="nama-<?= $i ?>" class="form-control" required></td>
          <td><input type="text" name="gedung-<?= $i ?>" id="" class="form-control" required></td>
        </tr>

        <?php endfor; ?>
       </table>

       <div class="fomr-group pull-right">
         <input type="submit" value="Simpan Semua" name="add" class="btn btn-success">
       </div>

      </form>
    </div>
  </div>


</div>



<?php include_once ( "../_footer.php" ); ?>