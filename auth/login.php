<?php
  require_once "../_config/config.php";
  if ( isset( $_SESSION['user'] ) ) {
    echo "<script>
          window.location='".base_url()."';
          </script>";
  } else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login - Rumah Sakit</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url() ?>/_assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="<?= base_url() ?>/favicon.png">
</head>

<body>

    <div id="wrapper" style="margin-top: 210px;">

        <div class="container">
          <center>
            <form action="" method="post" class="navbar-form">

            <?php

            if ( isset($_POST['login']) ) {
              $user = trim(mysqli_real_escape_string($con, $_POST['user']));
              $pass = sha1(trim(mysqli_real_escape_string($con, $_POST['pass'])));
              // echo $pass;

              $sql_login = mysqli_query( $con, "SELECT * FROM user WHERE username = '$user' AND password = '$pass' " ) or die ( mysqli_error($con) );
              if ( mysqli_num_rows($sql_login) > 0 ) {
                $_SESSION['user'] = $user;
                echo "<script>
                      window.location='".base_url()."';
                    </script>";
              } else { ?>
                  <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">
                      <div class="alert alert-danger alert-dismissable" role="alert">
                        <a href="" class="close" data-dismiss="alert" aria-albel="close">&times;</a>
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <strong>Login Gagal !</strong> Username / Password salah
                      </div>
                    </div>
                  </div>
                <?php
              }
            }

            ?>



              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" name="user" id="" class="form-control" required placeholder="username" autofocus>
              </div>

              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input type="password" name="pass" id="" class="form-control" required placeholder="Password">
              </div>
              
              <div class="input-group">
                <input type="submit" value="login" name="login" class="btn btn-primary">
              </div>

            </form>
          </center>
        </div>

    </div>
    <!-- /#wrapper -->



   <!-- jQuery -->
    <script src="<?= base_url() ?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url() ?>js/bootstrap.min.js"></script>

</body>
</html>
<?php
  }
?>
