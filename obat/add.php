<?php
include_once ( "../_header.php" );
// use Ramsey\Uuid\Uuid;
// $uuid = Uuid::uuid4()->toString();
?>

  <div class="box">

  <h1>Obat</h1>
    <h4>
    <small>Tambah Data Obat</small>
    <div class="pull-right">
      <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
    </div>
    </h4>

    <div class="row">
      <div class="col-lg-6 col-lg-offset-3">
        <form action="proses.php" method="post">
          <!-- <div class="form-group">
            <label for="idobat">Id Obat</label>
            <input type="text" name="id" id="idobat" class="form-control" value="<?= $uuid; ?>" disabled>
          </div> -->

          <div class="form-group">
            <label for="nama">Nama Obat </label>
            <input type="text" name="nama" id="nama" class="form-control" required auto-focus>
          </div>
          <div class="form-group">
            <label for="ket">Keterangan</label>
            <textarea name="ket" id="ket" cols="30" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" value="Simpan" name="add" class="btn btn-success pull-right">
          </div>
        </form>
      </div>
    </div>

  </div>

<?php
   include_once ( "../_footer.php" );
?>

  