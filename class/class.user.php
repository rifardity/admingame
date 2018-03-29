<?php
class User
{
    private $db;

  function __construct()
  {
    $database = new Database();
    $this->db = $database->Connect();
  }

  // public function AddUser($username,$password){
  //   try {
  //     $new_password = password_hash($password,PASSWORD_DEFAULT);
  //     $sql = $this->db->prepare("INSERT INTO user(username,password) VALUES(:username,:password,:level)");
  //     $sql->bindparam(":username", $username);
  //     $sql->bindparam(":password", $password);
  //     $sql->execute();
  //     return true;
  //   } catch (PDOException $e) {
  //     die("Gagal  Eror : ".$e->getMessage());
  //     return false;
  //   }
  //
  // }
  //
  // public function DeleteUser($username){
  //   try {
  //     $sql = $this->db->prepare("DELETE FROM user WHERE username=:username");
  //     $sql->bindparam(":username",$username);
  //     $sql->execute();
  //     return true;
  //   } catch (PDOException $e) {
  //     die("Gagal Menghapus Data Eror : ".$e->getMessage());
  //     return false;
  //   }
  // }

  // public function ViewUser(){
  //   try {
  //     $sql = $this->db->prepare("SELECT * FROM user");
  //     return $sql;
  //   } catch (PDOException $e) {
  //     die("Gagal Mengambil Data Eror : ".$e->getMessage());
  //     return false;
  //   }
  // }

  public function login($username,$password){
      try {
        $sql = $this->db->prepare("SELECT * FROM user WHERE username=:username");
        $sql->bindparam(":username",$username);
        $sql->execute();
        $data = $sql->fetch(PDO::FETCH_OBJ);
        if ($sql->rowCount()>0) {
          if (password_verify($password, $data->password)) {
            $_SESSION['user_session'] = $data->username;
            return true;
          }else {
            return false;
          }
        }
      } catch (PDOException $e) {
        die("Gagal  Eror : ".$e->getMessage());
        return false;
      }
    }

    public function isLogin(){
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
    }

    public function logout(){
       session_destroy();
       unset($_SESSION['user_session']);
       return true;
     }

}


 ?>
