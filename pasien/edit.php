<?php
include_once ( "../_header.php" );
// use Ramsey\Uuid\Uuid;
// $uuid = Uuid::uuid4()->toString();
if( !isset($_GET['id']) || $_GET['id'] == "" ) {
    echo "<script>
            window.location='data.php';
          </script>";
          exit;
}
?>

  <div class="box">

  <h1>Data Pasien</h1>
    <h4>
    <small>Edit Data Pasien Data Pasien</small>
    <div class="pull-right">
      <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
    </div>
    </h4>

    <?php
    $id = @$_GET['id'];
    $sql_pasien = mysqli_query($con, "SELECT * FROM tb_pasien WHERE id_pasien = '$id'") or die($con);
    $data = mysqli_fetch_array($sql_pasien);
    ?>

    <div class="row">
      <div class="col-lg-6 col-lg-offset-3">
        <form action="proses.php" method="post">

        <input type="hidden" name="id" id="id" value="<?= $data['id_pasien'] ?>">

          <div class="form-group">
            <label for="identitas">Nomor Identitas </label>
            <input type="text" name="identitas" id="identitas" class="form-control" value="<?= $data['nomor_identitas'] ?>" required autofocus>
          </div>
        
          <div class="form-group">
            <label for="nama">Nama Pasien </label>
            <input type="text" name="nama" id="nama" class="form-control" value="<?= $data['nama_pasien'] ?>" required>
          </div>

          <div class="form-group">
            <label for="spesialis">Jenis Kelamin </label>
            <div>
              <label for="jk" class="radio-inline">
                <input type="radio" name="jk" id="jk" value="L" require <?= $data['jenis_kelamin'] == "L" ? "checked" : null  ?> > Laki-Laki
              </label>
              <label for="" class="radio-inline">
                <input type="radio" name="jk" id="jk" value="P" require <?= $data['jenis_kelamin'] == "P" ? "checked" : null  ?> > Perempuan
              </label>
            </div> 
          </div>
          <div class="form-group">
            <label for="alamat">Alamat </label>
            <textarea name="alamat" id="alamat" cols="30" class="form-control"" require><?= $data['alamat'] ?></textarea>
          </div>
          <div class="form-group">
            <label for="nohp">Nomor Telephon </label>
            <input type="number" name="nohp" id="nohp" class="form-control" value="<?= $data['no_telp'] ?>" required>
          </div>
          
          <div class="form-group">
            <input type="submit" value="Simpan" name="edit" class="btn btn-success pull-right">
          </div>
        </form>
      </div>
    </div>

  </div>

<?php
   include_once ( "../_footer.php" );
?>

  