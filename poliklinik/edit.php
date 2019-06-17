<?php 
// periksa, apakah ada checkbox yang dipilih ?
      $cek = @$_POST['checked'];
      if ( !isset($cek) ) { //jika tidak ada #cek di $_POST
        echo "
          <script>
            alert('Tidak ada data yang dipilih');
            window.location= 'data.php';
          </script>
        ";
        exit;
      }
      // } else {
include_once ( "../_header.php" ); 
?>

<div class="box">
  <h1>Data Poliklinik</h1>
  <h4>
    <small>Edit Data Poliklinik</small>
    <div class="pull-right">
      <a href="data.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
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
        <?php $no = 1; ?>
        <?php foreach ($cek as $ck) : ?>
        <?php $sql_poli = mysqli_query($con, "SELECT * FROM tb_poliklinik WHERE id_poli = '$ck'") or die(mysqli_error($con)); 
              while ($data = mysqli_fetch_array($sql_poli)) : ?>
                
        <tr>
          <td><?= $no++ ?></td>
          <td>
            <input type="hidden" name="id[]" value="<?= $data['id_poli'] ?>">
            <input type="text" name="nama[]" class="form-control" value="<?= $data['nama_poli'] ?>" required>
          </td>
          <td>
          <input type="text" name="gedung[]" id="" class="form-control" value="<?= $data['gedung'] ?>" required>
          </td>
        </tr>

        <?php endwhile; ?>                 
        <?php endforeach; ?>
       </table>

       <div class="fomr-group pull-right">
         <input type="submit" value="Simpan Semua" name="edit" class="btn btn-success">
       </div>

      </form>
    </div>
  </div>


</div>

<?php include_once ( "../_footer.php" ); //} ?>