<?php

  /**
   * Class For score
   */
  class Score
  {
    private $db;
    function __construct()
    {
      $database = new Database();
      $this->db = $database->Connect();
    }

    public function AddScore($id,$bab,$score){
      try {
        $stmt = $this->db->prepare("INSERT INTO score(id,bab,score) VALUES(:id,:bab,:score)");
        $stmt->bindparam(":id", $id);
        $stmt->bindparam(":bab", $bab);
        $stmt->bindparam(":score", $score);
        $stmt->execute();
        echo json_encode(array("message"=> "Tambah score berhasil"));
        return true;
      } catch (PDOException $e) {
        echo json_encode(array("message"=> "Tambah score gagal ".$e->getMessage()));
        return false;
      }
    }


    public function View($id_score){
      try {
        $stmt = $this->db->prepare("SELECT * FROM score WHERE id_score=:id_score");
        $stmt->bindparam(":id_score",$id_score);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        $scoreitem= array( "score" => array(
          'id_score' => $data->id_score,
          'id' => $data->id,
          'bab' => $data->bab,
          'score' => $data->score
            )
         );
        echo json_encode($scoreitem);
        return true;
      } catch (PDOException $e) {
        echo json_encode(array("message"=> "score kosong"));
        return false;
      }
    }

    public function ViewAll(){
      try {
        $stmt = $this->db->prepare("SELECT a.id_score, b.name, a.bab, a.score FROM score a,player b WHERE a.id=b.id  ");
        $stmt->execute();
        $scorearr=array();
        $scorearr["records"]=array();
        while ($data = $stmt->fetch(PDO::FETCH_OBJ)) {
          $scoreitem= array(
            'id_score' => $data->id_score,
            'nama' => $data->name,
            'bab' => $data->bab,
            'score' => $data->score
          );
          array_push($scorearr["records"], $scoreitem);
        }
        echo json_encode($scorearr);
        return true;
      } catch (PDOException $e) {
        echo json_encode(array("message"=> "score kosong ".$e->getMessage()));
        return false;
      }
    }

    public function ViewHigh($bab){
      try {
        $stmt = $this->db->prepare("SELECT a.id_score, b.name, a.bab, a.score FROM score a,player b WHERE a.id=b.id and a.bab=:bab ORDER BY a.score DESC LIMIT 10 ");
        $stmt->bindparam(":bab",$bab);
        $stmt->execute();
        $scorearr=array();
        $scorearr["records"]=array();
        while ($data = $stmt->fetch(PDO::FETCH_OBJ)) {
          $scoreitem= array(
            'id_score' => $data->id_score,
            'nama' => $data->name,
            'bab' => $data->bab,
            'score' => $data->score
          );
          array_push($scorearr["records"], $scoreitem);
        }
        echo json_encode($scorearr);
        return true;
      } catch (PDOException $e) {
        echo json_encode(array("message"=> "score kosong ".$e->getMessage()));
        return false;
      }
    }

    public function Delete($id_score){
      try {
        $sql = $this->db->prepare("DELETE FROM score WHERE id_score=:id_score");
        $sql->bindparam(":id_score",$id_score);
        $sql->execute();
        echo json_encode(array("message"=> "score berhasil dihapus"));
        return true;
      } catch (PDOException $e) {
        echo json_encode(array("message"=> "gagal menghapus score"));
        return false;
      }
    }

  }

?>
