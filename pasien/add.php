<?php
include_once ( "../_header.php" );
// use Ramsey\Uuid\Uuid;
// $uuid = Uuid::uuid4()->toString();
?>

  <div class="box">

  <h1>Data Pasien</h1>
    <h4>
    <small>Tambah Data Pasien</small>
    <div class="pull-right">
      <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
    </div>
    </h4>

    <div class="row">
      <div class="col-lg-6 col-lg-offset-3">
        <form action="proses.php" method="post">

          <div class="form-group">
            <label for="identitas">Nomor Identitas </label>
            <input type="text" name="identitas" id="identitas" class="form-control" required autofocus>
          </div>
        
          <div class="form-group">
            <label for="nama">Nama Pasien </label>
            <input type="text" name="nama" id="nama" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="spesialis">Jenis Kelamin </label>
            <div>
              <label for="jk" class="radio-inline">
                <input type="radio" name="jk" id="jk" value="L" require> Laki-Laki
              </label>
              <label for="" class="radio-inline">
                <input type="radio" name="jk" id="jk" value="P" require> Perempuan
              </label>
            </div> 
          </div>
          <div class="form-group">
            <label for="alamat">Alamat </label>
            <textarea name="alamat" id="alamat" cols="30" class="form-control" require></textarea>
          </div>
          <div class="form-group">
            <label for="nohp">Nomor Telephon </label>
            <input type="number" name="nohp" id="nohp" class="form-control" required>
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

  