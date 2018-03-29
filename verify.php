<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    require_once 'config/database.php';
    require_once 'class/class.player.php';
    $email =$_GET['email'];
    $token = $_GET['token'];
    if (!isset($email) || !isset($token)) {
      echo "<script>window.location.href='index.php'</script>";
    }else {
      $player = new Player();
      if ($player->Verify($email,$token)) {
        echo "Verifikasi Berhasil";
      }else{
        echo "Verifikasi Gagal";
      }
    }
    ?>
  </body>
</html>
