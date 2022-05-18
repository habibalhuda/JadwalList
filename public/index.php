<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Jadwal</title>
 
</head>
<body class="hold-transition login-page">
<?php
  session_start();
  if($_SESSION = "login") {
    header("locatin:../admin.php?pesan=belum_login");

  }
?>

<?php
  if(isset($_POST['pesan'])){
      if($_POST['pesan'] == "gagal"){
      echo "login gagal username dari password salah";
      }

      else if($_POST['pesan'] == "belum_login"){
        echo "anda harus login untuk akses halaman ini";
      }
  }
?>

      <form action="login.php" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name = "password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

</body>
</html>
