<?php

class Soal
{
  private $db;

function __construct()
{
  $database = new Database();
  $this->db = $database->Connect();
}

public function AddSoal($pertanyaan,$kelas,$bab ,$a,$b,$c,$d,$benar){
  try {
    $sql = $this->db->prepare("INSERT INTO soal(pertanyaan,kelas,bab,a,b,c,d,benar) VALUES(:pertanyaan,:kelas,:bab,:a,:b,:c,:d,:benar)");
    $sql->bindparam(":pertanyaan", $pertanyaan);
    $sql->bindparam(":kelas", $kelas);
    $sql->bindparam(":bab", $bab);
    $sql->bindparam(":a", $a);
    $sql->bindparam(":b", $b);
    $sql->bindparam(":c", $c);
    $sql->bindparam(":d", $d);
    $sql->bindparam(":benar", $benar);
    $sql->execute();
    return true;
  } catch (PDOException $e) {
    die("Gagal Error : ".$e->getMessage());
    return false;
  }
}

public function DeleteSoal($kode){
  try {
    $sql = $this->db->prepare("DELETE FROM soal WHERE kode=:kode");
    $sql->bindparam(":kode",$kode);
    $sql->execute();
    return true;
  } catch (PDOException $e) {
    die("Gagal Menghapus Data Eror : ".$e->getMessage());
    return false;
  }
}

public function UpdateSoal($kode){
  try {
    $sql = $this->db->prepare("SELECT * FROM soal WHERE kode=:kode ");
    $sql->bindparam(":kode", $kode);
    $sql->execute();
    return $sql;
  } catch (PDOException $e) {
    die("Gagal Memilih Data Eror : ".$e->getMessage());
    return false;
  }
}

public function SaveSoal($kode,$pertanyaan,$kelas,$bab,$a,$b,$c,$d,$benar){
  try {
    $sql = $this->db->prepare("UPDATE soal SET pertanyaan=:pertanyaan, kelas=:kelas, bab=:bab, a=:a, b=:b, c=:c, d=:d, benar=:benar WHERE kode=:kode");
    $sql->bindparam(":kode", $kode);
    $sql->bindparam(":pertanyaan", $pertanyaan);
    $sql->bindparam(":kelas", $kelas);
    $sql->bindparam(":bab", $bab);
    $sql->bindparam(":a", $a);
    $sql->bindparam(":b", $b);
    $sql->bindparam(":c", $c);
    $sql->bindparam(":d", $d);
    $sql->bindparam(":benar", $benar);
    $sql->execute();
    return true;
  } catch (PDOException $e) {
    die("Gagal Menyimpan Data Eror : ".$e->getMessage());
    return false;
  }
}

public function ViewSoal(){
  try {
    $sql = $this->db->prepare("SELECT * FROM soal");
    $sql->execute();
    if ($sql->rowCount()>0) {
      $soalarr=array();
      $soalarr["records"]=array();
      while ($data = $sql->fetch(PDO::FETCH_OBJ)) {
        $soalitem=array(
          "kode"=> $data->kode,
          "soal"=> $data->pertanyaan,
          "kelas"=> $data->kelas,
          "bab"=> $data->bab,
          "pilihana"=> $data->a,
          "pilihanb"=> $data->b,
          "pilihanc"=> $data->c,
          "pilihand"=> $data->d,
          "benar"=> $data->benar
        );
        array_push($soalarr["records"], $soalitem);
      }
      echo json_encode($soalarr);
    }else {
      echo json_encode(
        array("Message" => "Soal Kosong")
      );
    }
  } catch (PDOException $e) {
    die("Gagal Mengambil Data Eror : ".$e->getMessage());
    return false;
  }
}

public function ViewSoalRandom($kelas,$bab){
  try {
    $sql = $this->db->prepare("SELECT * FROM soal WHERE kelas='$kelas' and bab='$bab' ORDER BY RAND() LIMIT 5");
    $sql->execute();
    if ($sql->rowCount()>0) {
      $soalarr=array();
      $soalarr["records"]=array();
      while ($data = $sql->fetch(PDO::FETCH_OBJ)) {
        $soalitem=array(
          "kode"=> $data->kode,
          "soal"=> $data->pertanyaan,
          "pilihana"=> $data->a,
          "pilihanb"=> $data->b,
          "pilihanc"=> $data->c,
          "pilihand"=> $data->d,
          "benar"=> $data->benar
        );
        array_push($soalarr["records"], $soalitem);
      }
      echo json_encode($soalarr);
    }else {
      echo json_encode(
        array("Message" => "Soal Kosong")
      );
    }
  } catch (PDOException $e) {
    die("Gagal Mengambil Data Eror : ".$e->getMessage());
    return false;
  }
}

}


?>
