<?php
include_once ( "../_header.php" );
// use Ramsey\Uuid\Uuid;
// $uuid = Uuid::uuid4()->toString();
?>

  <div class="box">

  <h1>Data Rekam Medis</h1>
    <h4>
    <small>Tambah Data Rekam Medis</small>
    <div class="pull-right">
      <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
    </div>
    </h4>

    <div class="row">
      <div class="col-lg-6 col-lg-offset-3">
        <form action="proses.php" method="post">
        
          <div class="form-group">
            <label for="pasien">Pasien </label>
            <select name="pasien" id="pasien" class="form-control" required>
              <option value="">- Pilih -</option>
              <?php 
              $sql = mysqli_query($con, "SELECT * FROM tb_pasien") or die(mysqli_error($con));
              foreach ($sql as $array ) : ?>
                <option value="<?= $array['id_pasien'] ?>"><?= $array['nama_pasien'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="keluhan">Keluhan</label>
            <textarea name="keluhan" id="keluhan" cols="30" class="form-control"></textarea>
          </div>

          <div class="form-group">
            <label for="tanggal">Tanggal Periksa</label>
            <input type="date" name="tanggal" value="<?= date('Y-m-d') ?>" id="tanggal" class="form-control">
          </div>
          
          <div class="form-group">
            <label for="dokter">Dokter </label>
            <select name="dokter" id="dokter" class="form-control" required>
              <option value="">- Pilih -</option>
              <?php 
              $sql = mysqli_query($con, "SELECT * FROM tb_dokter") or die(mysqli_error($con));
              foreach ($sql as $array ) : ?>
                <option value="<?= $array['id_dokter'] ?>"><?= $array['nama_dokter'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="diagnosa">Diagnosa</label>
            <textarea name="diagnosa" id="diagnosa" cols="30" class="form-control"></textarea>
          </div>

          <div class="form-group">
            <label for="poli">Poliklinik </label>
            <select name="poli" id="poli" class="form-control" required>
              <option value="">- Pilih -</option>
              <?php 
              $sql = mysqli_query($con, "SELECT * FROM tb_poliklinik ORDER BY nama_poli ASC") or die(mysqli_error($con));
              foreach ($sql as $array ) : ?>
                <option value="<?= $array['id_poli'] ?>"><?= $array['nama_poli'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="obat">Obat </label>
            <select multiple name="obat[]" id="obat" class="form-control" required>
              <?php 
              $sql = mysqli_query($con, "SELECT * FROM tb_obat") or die(mysqli_error($con));
              foreach ($sql as $array ) : ?>
                <option value="<?= $array['id_obat'] ?>"><?= $array['nama_obat'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          
          
          <div class="form-group  pull-right">
            <input type="submit" value="Simpan" name="add" class="btn btn-success">
            <input type="reset" value="Reset" name="reset" class="btn btn-default">

          </div>
        </form>
        <script>
            CKEDITOR.replace( 'keluhan', {
              uiColor: '#e12355'
            } );
        </script>
      </div>
    </div>

  </div>

   

<?php
   include_once ( "../_footer.php" );
?>

  