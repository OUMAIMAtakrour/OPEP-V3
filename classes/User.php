<?php

// include_once('config.php');

// class User
// {
//    private Dbc $db;


//    public function __construct()
//    {
//       $this->db = new Dbc();
//    }


//    public function signup($firstName, $lastName, $email, $pass)
//    {

//       try {
//          $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
//          $stquery = 'INSERT INTO user(FirstName,LastName,Email,Password) VALUES(:firstName,:lastName,:email,:pass)';

//          $stmt = $this->db->pdo->prepare($stquery);
//          $stmt->bindparam(":firstName", $firstName);
//          $stmt->bindparam(":lastName", $lastName);
//          $stmt->bindparam(":email", $email);
//          $stmt->bindparam(":pass", $hashedPass);
//          $stmt->execute();
//          return $stmt;
//       } catch (PDOException $e) {
//          echo $e->getMessage();
//          return false;
//       }
//    }
// }
?>
<?php
include_once('config.php');

class User
{
   private $db;

   public function __construct($DB_con)
   {
      $this->db = $DB_con;
   }

   public function signup($firstName, $lastName, $email, $pass)
   {
      try {
         $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

         $stmt = $this->db->prepare("INSERT INTO user(FirstName,LastName,Email,Password) VALUES(:fname, :lname, :email, :pass)");

         $stmt->bindparam(":fname", $firstName);
         $stmt->bindparam(":lname", $lastName);
         $stmt->bindparam(":email", $email);
         $stmt->bindparam(":pass", $hashedPass);
         $stmt->execute();
         return $stmt;
      } catch (PDOException $e) {
         echo $e->getMessage();
         return false;
      }
   }

   public function login($firstName, $email, $pass)
   {
      try {
         $stmt = $this->db->prepare("SELECT * FROM user WHERE FirstName=:fname OR Email=:email LIMIT 1");
         $stmt->execute(array(':fname' => $firstName, ':email' => $email));
         $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
         if ($stmt->rowCount() > 0) {
            if (password_verify($pass, $userRow['Password'])) {
               $_SESSION['user_session'] = $userRow['IdUser'];
               return true;
            } else {
               return false;
            }
         }
      } catch (PDOException $e) {
         echo $e->getMessage();
      }
   }

   public function is_loggedin()
   {
      if (isset($_SESSION['user_session'])) {
         return true;
      }
   }

   public function redirect($url)
   {
      header("Location: $url");
   }

   public function logout()
   {
      session_destroy();
      unset($_SESSION['user_session']);
      return true;
   }
}
?>

