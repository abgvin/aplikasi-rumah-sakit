<?php
   include_once ( "../_header.php" );
?>

<div class="row">
   <div class="col-lg-12">
      <h1>DashBoard</h1>
      <p>Selamat datang <mark><?= $_SESSION['user'] ?></mark>, di portal rumah sakit (Rekam medis).</p>
      <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
   </div>
</div>

<?php
   include_once ( "../_footer.php" );
?>