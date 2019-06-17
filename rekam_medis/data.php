<?php
   include_once ( "../_header.php" );
?>

  <div class="box">
    <h1>Rekam Medis</h1>
    <h4>
      <small>Data Rekam Medis</small>
      <div class="pull-right">
        <a href="data.php" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i> Refresh</a>
        <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Rekam Medis</a>
      </div>
    </h4>
      
    <form action="" method="post" name="proses">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="medis">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal Periksa</th>
            <th>Nama Pasien</th>
            <th>keluhan</th>
            <th>Nama Dokter</th>
            <th>Diagnosa</th>
            <th>Poliklinik</th>
            <th>Data Obat</th>
            <th class="text-center"><i class="glyphicon glyphicon-cog"></i></th>
          </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        $query = "SELECT * FROM tb_rekammedis 
                  INNER JOIN tb_pasien ON tb_rekammedis.id_pasien = tb_pasien.id_pasien
                  INNER JOIN tb_dokter ON tb_rekammedis.id_dokter = tb_dokter.id_dokter
                  INNER JOIN tb_poliklinik ON tb_rekammedis.id_poli = tb_poliklinik.id_poli
                  ";
        $sql = mysqli_query($con, $query ) or die(mysqli_error($con));
        foreach ($sql as $data) { ?>
          <tr>
            <td><?= $no++ ?>.</td>
            <td><?= tgl_indo($data['tgl_periksa']) ?></td>
            <td><?= $data['nama_pasien']?></td>
            <td><?= $data['keluhan']?></td>
            <td><?= $data['nama_dokter']?></td>
            <td><?= $data['diagnosa'] ?></td>
            <td><?= $data['nama_poli'] ?></td>
            <td>
              <?php
              $sql_obat = mysqli_query($con, "SELECT * FROM tb_rm_obat JOIN tb_obat ON tb_rm_obat.id_obat = tb_obat.id_obat WHERE id_rm = '$data[id_rm]'") or die (mysqli_error($con));
              foreach ($sql_obat as $data_obat) {
                echo $data_obat['nama_obat']."<br>";
              }
              ?>
            </td>
            <td class="text-center">
              <!-- <a class="btn btn-warning btn-xs" href="edit.php?id=<?= $data['id_rm'] ?>"><i class="glyphicon glyphicon-edit"></i> Edit</a> -->
              <a class="btn btn-danger btn-xs" href="del.php?id=<?= $data['id_rm'] ?>"  onclick="return confirm( 'Yakin ingin menghapus data ?' )"><i class="glyphicon glyphicon-edit"></i> Delete</a>

              
            </td>
          </tr>
        <?php } ?>
        

        </tbody>
      </table>
   </div>
   </form>

   <div class="box pull-right">
      <button type="submit" class="btn btn-danger btn-sm" onclick="hapus()"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
   </div>


<?php
   include_once ( "../_footer.php" );
?>
<script>
  $(document).ready(function() {

    $('#medis').DataTable({
      columnDefs: [
        {
          "searchable": false,
          "orderable" : false,
          "targets": 8
        }
      ]
    }); 

  });
</script>
