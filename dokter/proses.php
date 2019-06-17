<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";
use Ramsey\Uuid\Uuid;
// use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
//     $uuid4 = Uuid::uuid4();
//     echo $uuid4->toString() . "\n";


    

    if ( isset($_POST['add']) ) {
      // jika tombol id='add' si tekan; => TAMBAH DATA
      $uuid = Uuid::uuid4()->toString();
      $nama = trim( mysqli_real_escape_string($con, $_POST['nama']) );
      $spesialis = trim( mysqli_real_escape_string($con, $_POST['spesialis']) );
      $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
      $notelp = trim(mysqli_real_escape_string($con, $_POST['nohp']));

      mysqli_query($con, "INSERT INTO tb_dokter (id_dokter, nama_dokter, spesialis, alamat, no_telp) VALUES ('$uuid', '$nama', '$spesialis', '$alamat', '$notelp')") OR DIE ( mysqli_error($con) );
      echo "
          <script>window.location='data.php';</script>;
           ";
    } else if ( $_POST['edit'] ) {
      // jika tombol name='edit' ditekan; => EDIT DATA
      $id = $_POST['id'];
      $nama = trim( mysqli_real_escape_string($con, $_POST['nama']) );
      $spesialis = trim( mysqli_real_escape_string($con, $_POST['spesialis']) );
      $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
      $notelp = trim(mysqli_real_escape_string($con, $_POST['nohp'])); 
      mysqli_query($con, "UPDATE tb_dokter SET nama_dokter = '$nama', spesialis = '$spesialis', alamat = '$alamat', no_telp = '$notelp' WHERE id_dokter = '$id'") OR DIE ( mysqli_error($con) );
      echo "
        <script>
        alert('Data Berhasil di Update !');
        window.location='data.php';</script>;
      ";

    }
?>