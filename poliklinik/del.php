<?php 
require_once "../_config/config.php";
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

      // foreach ($cek as $id) { 
      //   $sql = mysqli_query($con "DELETE FROM tb_poliklinik WHERE id_poli = '$id'") or die(mysqli_error($con));
      // }

      foreach ($cek as $id) {
        $sql = mysqli_query($con, "DELETE FROM tb_poliklinik WHERE id_poli = '$id'") or die(mysqli_error($con));
      }

      if ( $sql ) {
        echo "
        <script>
        alert('".count($cek)." data Berhasil dihapus');
        window.location='data.php';
        </script>;
         ";
      } else {
        echo "
        <script>
        alert('Gagal Hapus data');
        </script>;
         ";
      }

?>