<?php

  /**
   * Class For player
   */
  class player
  {
    private $db;
    function __construct()
    {
      $database = new Database();
      $this->db = $database->Connect();
    }

    public function Register($name,$email,$pass,$telp,$token){
      try {
        $stmt = $this->db->prepare("INSERT INTO player(name,email,password,telp,token) VALUES(:name,:email,:password,:telp,:token)");
        $stmt->bindparam(":name", $name);
        $stmt->bindparam(":email", $email);
        $stmt->bindparam(":password",password_hash($pass,PASSWORD_DEFAULT));
        $stmt->bindparam(":telp", $telp);
        $stmt->bindparam(":token", $token);
        $stmt->execute();
        echo json_encode(array("message"=> "pendaftaran berhasil"));
        return true;
      } catch (PDOException $e) {
        if ($stmt->errorInfo()[1]==1062) {
          echo json_encode(array("message"=> "email sudah terdaftar"));
          return false;
        }else{
          echo json_encode(array("message"=> $stmt->errorInfo()[2]));
          return false;
        }
        echo json_encode(array("message"=> "pendaftaran gagal"));
        return false;
      }
    }

    public function SendEmail($email,$name,$token,$mail){
      $mail->isSMTP();
      $mail->SMTPDebug = 0;
      $mail->Host = 'smtp.gmail.com';
      $mail->Port = 587;
      $mail->SMTPSecure = 'tls';
      $mail->SMTPAuth = true;
      $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
      )
    );
      $mail->Username = "rifarditaufiqyufananda.if@gmail.com";
      $mail->Password = "demoweb123";
      $mail->setFrom('rifarditaufiqyufananda.if@gmail.com', 'Game Kuis');
      $mail->addAddress($email, $name);
      $mail->Subject = 'Verification Email Address';
      $mail->isHtml(true);
      $mail->Body = "Verify Your Email Address With Link Below <br><br>
      <a href='http://localhost/game/verify.php?email=$email&token=$token'>VERIFY NOW<a>
      ";
      if (!$mail->send()){
        echo json_encode(array("message"=> "gagal mengirim verifikasi"));
      }
      else {
        echo json_encode(array("message"=> "email verifikasi telah terkirim"));
      }

    }

    public function Save($id,$name,$telp){
      try {
        $sql = $this->db->prepare("UPDATE player SET name=:name, telp=:telp WHERE id=:id");
        $sql->bindparam(":id", $id);
        $sql->bindparam(":name", $name);
        $sql->bindparam(":telp", $telp);
        $sql->execute();
        echo json_encode(array("message"=> "berhasil mengupdate player"));
        return true;
      } catch (PDOException $e) {
        echo json_encode(array("message"=> "gagal mengupdate player"));
        return false;
      }
    }

    public function Verify($email,$token){
      try {
        $stmt = $this->db->prepare("SELECT id, name FROM player WHERE email=:email and token=:token and confirmed=0");
        $stmt->bindparam(":email", $email);
        $stmt->bindparam(":token", $token);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        if ($stmt->rowCount()>0) {
          $sql = $this->db->prepare("UPDATE player SET confirmed=1, token='' WHERE email=:email");
          $sql->bindparam(":email", $email);
          $sql->execute();
          $this->successText = $data->name;
          return true;
        }else{
          $this->errorText = $stmt->errorInfo()[1];
          return false;
        }
      } catch (PDOException $e) {
        $this->errorText = $stmt->errorInfo()[2];
        return false;
      }
    }

    public function Login($email,$password){
      try {
        $stmt = $this->db->prepare("SELECT id, name, email, password, confirmed FROM player WHERE email=:email");
        $stmt->bindparam(":email",$email);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        if ($stmt->rowCount()>0) {
          if (password_verify($password, $data->password)) {
            if ($data->confirmed == 1) {
              $this->successText = "$data->name";
              $_SESSION['player_session'] = $data->email;
              echo json_encode(array("message"=> "login berhasil"));
              return true;
            }else {
              echo json_encode(array("message"=> "mohon verifikasi email anda"));
              return false;
            }
          }else{
              echo json_encode(array("message"=> "password salah"));
              return false;
          }
        }else {
          echo json_encode(array("message"=> "email belum terdaftar"));
          return false;
        }
      } catch (PDOException $e) {
        echo json_encode(array("message"=> "login gagal"));
        return false;
      }
    }

    public function View($email){
      try {
        $stmt = $this->db->prepare("SELECT * FROM player WHERE email=:email");
        $stmt->bindparam(":email",$email);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        $playeritem= array( "player" => array(
          'name' => $data->name,
          'email' => $data->email,
          'telp' => $data->telp
            )
         );
        echo json_encode($playeritem);
        return true;
      } catch (PDOException $e) {
        echo json_encode(array("message"=> "player kosong"));
        return false;
      }
    }

    public function ViewAll(){
      try {
        $stmt = $this->db->prepare("SELECT * FROM player");
        $stmt->execute();
        $playerarr=array();
        $playerarr["records"]=array();
        while ($data = $stmt->fetch(PDO::FETCH_OBJ)) {
          $playeritem= array(
            'id' => $data->id,
            'name' => $data->name,
            'email' => $data->email,
            'telp' => $data->telp,
            'confirmed' => $data->confirmed
          );
          array_push($playerarr["records"], $playeritem);
        }
        echo json_encode($playerarr);
        return true;
      } catch (PDOException $e) {
        echo json_encode(array("message"=> "player kosong"));
        return false;
      }
    }

    public function Delete($email){
      try {
        $sql = $this->db->prepare("DELETE FROM player WHERE email=:email");
        $sql->bindparam(":email",$email);
        $sql->execute();
        echo json_encode(array("message"=> "player berhasil dihapus"));
        return true;
      } catch (PDOException $e) {
        echo json_encode(array("message"=> "gagal menghapus player"));
        return false;
      }
    }


    public function isLogin(){
      if (isset($_SESSION['player_session'])) {
        echo json_encode(array("message"=> "telah login"));
        return true;
      }
    }

    public function Logout(){
      session_destroy();
      unset($_SESSION['player_session']);
      echo json_encode(array("message"=> "logout berhasil"));
      return true;
    }
  }

?>
