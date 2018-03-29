<?php
//####################### Include File ##############################//
require_once '../config/database.php';
require_once 'class.soal.php';
require_once 'class.player.php';
require_once 'class.score.php';
require_once 'class.bab.php';
use PHPMailer\PHPMailer\PHPMailer;
require_once '../vendor/autoload.php';

//####################### Create Class ##############################//
$soal = new Soal();
$player = new Player();
$score = new Score();
$babclass = new Bab();

//####################### Api For Soal ##############################//
if (isset($_GET['input'])) {
  $pertanyaan	= $_POST['soal'];
  $kelas	= $_POST['kelas'];
  $bab	= $_POST['bab'];
  $a	= $_POST['pilihana'];
  $b 	= $_POST['pilihanb'];
  $c	= $_POST['pilihanc'];
  $d	= $_POST['pilihand'];
  $benar 	= $_POST['benar'];
  $sql=$soal->AddSoal($pertanyaan,$kelas,$bab,$a,$b,$c,$d,$benar);
}elseif(isset($_GET['view'])) {
  $sql=$soal->ViewSoal();
}elseif(isset($_GET['viewrandom'])) {
  $kelas = $_POST['kelas'];
  $bab = $_POST['bab'];
  $sql=$soal->ViewSoalRandom($kelas,$bab);
}elseif (isset($_GET['update'])) {
  $sql=$soal->UpdateSoal('');
}elseif (isset($_GET['save'])) {
  $kode	= $_POST['kode'];
  $pertanyaan	= $_POST['soal'];
  $kelas	= $_POST['kelas'];
  $bab	= $_POST['bab'];
  $a	= $_POST['pilihana'];
  $b 	= $_POST['pilihanb'];
  $c	= $_POST['pilihanc'];
  $d	= $_POST['pilihand'];
  $benar 	= $_POST['benar'];
  $sql=$soal->SaveSoal($kode,$pertanyaan,$kelas,$bab,$a,$b,$c,$d,$benar);
}elseif (isset($_GET['delete'])) {
  $kode	= $_POST['kode'];
  $sql=$soal->DeleteSoal($kode);

//####################### Api For Player ##############################//
}elseif (isset($_GET['playerinput'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $telp = $_POST['telp'];
  $str='alkqmeroiACVMNEURPYKvx9324017f';
  $str = str_shuffle($str);
  $token = substr($str,0,10);
  $sql = $player->Register($name,$email,$password,$telp,$token);
  if ($sql) {
    $mail = new PHPMailer;
    $player->SendEmail($email,$name,$token,$mail);
  }
}elseif (isset($_GET['playerview'])) {
  $sql= $player->ViewAll();
}elseif (isset($_GET['playerviewone'])) {
  $email = $_POST['email'];
  $sql = $player->View($email);
}elseif (isset($_GET['playerupdate'])) {
  $email = $_POST['email'];
  $sql = $player->View($email);
}elseif (isset($_GET['playersave'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $telp = $_POST['telp'];
  $sql = $player->Save($id,$name,$telp);
}elseif (isset($_GET['playerdelete'])) {
  $email = $_POST['email'];
  $sql = $player->Delete($email);
}elseif (isset($_GET['playerlogin'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sql = $player->Login($email,$password);
}elseif (isset($_GET['playerislogin'])) {
  $sql = $player->isLogin();
}elseif (isset($_GET['playerlogout'])) {
  $sql = $player->Logout();

//####################### Api For Score ##############################//
}elseif (isset($_GET['scoreinput'])) {
  $id=$_POST['id'];
  $bab=$_POST['bab'];
  $scor=$_POST['score'];
  $sql = $score->AddScore($id,$bab,$scor);
}elseif (isset($_GET['scoreviewhigh'])) {
  $bab = $_POST['bab'];
  $sql = $score->ViewHigh($bab);
}elseif (isset($_GET['scoreview'])) {
  $sql = $score->ViewAll();
}elseif (isset($_GET['scoreviewone'])) {
  $id_score = $_POST['id_score'];
  $sql = $score->View($id_score);
}elseif (isset($_GET['scoredelete'])) {
  $id_score = $_POST['id_score'];
  $sql = $score->Delete($id_score);

//####################### Api For Bab ##############################//
}elseif (isset($_GET['babinput'])) {
$id_bab = $_POST['id_bab'];
$bab = $_POST['bab'];
$kelas = $_POST['kelas'];
$sql = $babclass->AddBab($id_bab,$bab,$kelas);
}elseif (isset($_GET['babviewkelas'])) {
$kelas = $_POST['kelas'];
$sql = $babclass->View($kelas);
}elseif (isset($_GET['babviewall'])) {
$sql = $babclass->ViewAll();
}elseif (isset($_GET['babdelete'])) {
$id_bab = $_POST['id_bab'];
$sql = $babclass->Delete($id_bab);
}
?>
