<?php

   // SETTING DEFAULT TIME ZONE
   date_default_timezone_set('Asia/jakarta');
   // SESSION START
   session_start();

   include_once "conn.php";

   // KONEKSI
   $con = mysqli_connect($con['host'], $con['user'], $con['pass'], $con['db']);
   if(mysqli_connect_error()) {
      echo mysqli_connect_error();
   }

   // FUNCTION BASE URL
   function base_url($url = null) {
      $base_url = "http://localhost/AplikasiRumahSakit";
      if ( $url != null ) {
         return base_url."/".$url;
      } else {
         return $base_url;
      }
   }

   function tgl_indo($tgl) {
      $tanggal = substr($tgl, 8, 2);
      $bulan = substr($tgl, 5, 2);
      $tahun = substr($tgl, 0, 4);
      return $tanggal."-".$bulan."-".$tahun;


   }

?>