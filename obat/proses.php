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
      $ket = trim( mysqli_real_escape_string($con, $_POST['ket']) );

      mysqli_query($con, "INSERT INTO tb_obat (id_obat, nama_obat, ket_obat) VALUES ('$uuid', '$nama', '$ket')") OR DIE ( mysqli_error($con) );
      echo "
          <script>window.location='data.php';</script>;
           ";
    } else if ( $_POST['edit'] ) {
      // jika tombol name='edit' ditekan; => EDIT DATA
      $id = $_POST['id'];
      $nama = trim( mysqli_real_escape_string($con, $_POST['nama']) );
      $ket = trim( mysqli_real_escape_string($con, $_POST['ket']) );
      mysqli_query($con, "UPDATE tb_obat SET nama_obat = '$nama', ket_obat = '$ket' WHERE id_obat = '$id'") OR DIE ( mysqli_error($con) );
      echo "
        <script>window.location='data.php';</script>;
      ";

    }
?>