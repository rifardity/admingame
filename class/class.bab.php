<?php

  /**
   * Class For bab
   */
  class bab
  {
    private $db;
    function __construct()
    {
      $database = new Database();
      $this->db = $database->Connect();
    }

    public function AddBab($id,$bab,$kelas){
      try {
        $stmt = $this->db->prepare("INSERT INTO bab(id_bab,bab,kelas) VALUES(:id_bab,:bab,:kelas)");
        $stmt->bindparam(":id_bab", $id);
        $stmt->bindparam(":bab", $bab);
        $stmt->bindparam(":kelas", $kelas);
        $stmt->execute();
        echo json_encode(array("message"=> "Tambah bab berhasil"));
        return true;
      } catch (PDOException $e) {
        echo json_encode(array("message"=> "Tambah bab gagal ".$e->getMessage()));
        return false;
      }
    }


    public function View($kelas){
      try {
        $stmt = $this->db->prepare("SELECT * FROM bab WHERE kelas=:kelas");
        $stmt->bindparam(":kelas",$kelas);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        $babitem= array( "bab" => array(
          'id_bab' => $data->id_bab,
          'bab' => $data->bab,
          'kelas' => $data->kelas
            )
         );
        echo json_encode($babitem);
        return true;
      } catch (PDOException $e) {
        echo json_encode(array("message"=> "bab kosong"));
        return false;
      }
    }

    public function ViewAll(){
      try {
        $stmt = $this->db->prepare("SELECT * FROM bab");
        $stmt->execute();
        $babarr=array();
        $babarr["records"]=array();
        while ($data = $stmt->fetch(PDO::FETCH_OBJ)) {
          $babitem= array(
            'id_bab' => $data->id_bab,
            'bab' => $data->bab,
            'kelas' => $data->kelas
          );
          array_push($babarr["records"], $babitem);
        }
        echo json_encode($babarr);
        return true;
      } catch (PDOException $e) {
        echo json_encode(array("message"=> "bab kosong ".$e->getMessage()));
        return false;
      }
    }


    public function Delete($id_bab){
      try {
        $sql = $this->db->prepare("DELETE FROM bab WHERE id_bab=:id_bab");
        $sql->bindparam(":id_bab",$id_bab);
        $sql->execute();
        echo json_encode(array("message"=> "bab berhasil dihapus"));
        return true;
      } catch (PDOException $e) {
        echo json_encode(array("message"=> "gagal menghapus bab"));
        return false;
      }
    }

  }

?>
