<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";
use Ramsey\Uuid\Uuid;
// use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
//     $uuid4 = Uuid::uuid4();
//     echo $uuid4->toString() . "\n";


    if ( isset( $_POST['add'] ) ) {
      // jika tombol id='add' si tekan; => TAMBAH DATA
      $uuid = Uuid::uuid4()->toString();
      $identitas = trim(mysqli_real_escape_string($con, $_POST['identitas']));
      $nama = trim( mysqli_real_escape_string($con, $_POST['nama']) );
      $jk = trim( mysqli_real_escape_string($con, $_POST['jk']) );
      $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
      $notelp = trim(mysqli_real_escape_string($con, $_POST['nohp']));
      
      // validasi no identitas ganda
      $sql_cek_identitas = mysqli_query($con, "SELECT * FROM tb_pasien WHERE nomor_identitas = '$identitas'") or die (mysqli_error($con));
      if( mysqli_num_rows($sql_cek_identitas) > 0 ) {
        echo "
        <script>
          alert('Nomor identitas yang diinputkan sudah terdaftar');
          window.location='data.php';
        </script>;
          ";
      } else {
        mysqli_query($con, "INSERT INTO tb_pasien (id_pasien, nomor_identitas, nama_pasien, jenis_kelamin, alamat, no_telp) VALUES ('$uuid', '$identitas', '$nama', '$jk', '$alamat', '$notelp')") OR DIE ( mysqli_error($con) );
        echo "
          <script>
            window.location='data.php';
          </script>;
            ";
      }
     

     
    } else if ( @$_POST['edit'] ) {
      // jika tombol name='edit' ditekan; => EDIT DATA
      $id = @$_POST['id'];
      $identitas = trim(mysqli_real_escape_string($con, $_POST['identitas']));
      $nama = trim( mysqli_real_escape_string($con, $_POST['nama']) );
      $jk = trim( mysqli_real_escape_string($con, $_POST['jk']) );
      $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
      $notelp = trim(mysqli_real_escape_string($con, $_POST['nohp']));
      
      // validasi no identitas ganda
      $sql_cek_identitas = mysqli_query($con, "SELECT * FROM tb_pasien WHERE nomor_identitas = '$identitas' AND id_pasien != '$id'") or die (mysqli_error($con));
      if( mysqli_num_rows($sql_cek_identitas) > 0 ) {
        echo "
        <script>
          alert('Nomor identitas yang diinputkan sudah terdaftar');
          window.location='edit.php?id=$id';
        </script>;
          ";
      } else {
        mysqli_query($con, "UPDATE tb_pasien SET nomor_identitas = '$identitas', nama_pasien = '$nama', jenis_kelamin = '$jk', alamat = '$alamat', no_telp = '$notelp' WHERE id_pasien = '$id'") OR DIE ( mysqli_error($con) );
        echo "
          <script>
            alert('Data Pasien $nama berhasil diedit');
            window.location='data.php';
          </script>;
            ";
      }

    } else if ( isset($_POST['import']) ) {
        $file        = $_FILES['file']['name'];
        $ekstensi    = explode(".", $file);
        $file_name   = "file-".round(microtime(true)).".".end($ekstensi);
        $sumber      = $_FILES['file']['tmp_name'];
        $target_dir  = "../_file/";
        $target_file = $target_dir.$file_name;
        move_uploaded_file($sumber, $target_file);

        $obj = PHPExcel_IOFactory::load($target_file);
        $all_data = $obj->getActiveSheet()->toArray(null, true, true, true);

        $sql = "INSERT INTO tb_pasien (id_pasien, nomor_identitas, nama_pasien, jenis_kelamin, alamat, no_telp) VALUES";
        for ($i=3; $i <= count($all_data); $i++) { 
          $uuid   = Uuid::uuid4()->toString();
          $no_id  = $all_data[$i]['A'];
          $nama   = $all_data[$i]['B'];
          $jk     = $all_data[$i]['C'];
          $alamat = $all_data[$i]['D'];
          $telp   = $all_data[$i]['E'];

          $sql .= "('$uuid', '$no_id', '$nama', '$jk', '$alamat', '$telp'),";
        }

        $sql = substr($sql, 0, -1);
        //echo $sql;
        mysqli_query ($con, $sql) or die(mysqli_error($con));
        unlink($target_file);
        echo "
          <script>
            window.location='data.php';
          </script>;
            ";
    }
?>
