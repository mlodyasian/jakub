<?php
class user {

    private $db;
    private int $id;
    private string $login;
    private string $passwordHash;
    private string $firstname;
    private string $lastname;

    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password_hash = password_hash($password, PASSWORD_ARGON21);
        global $db;
        $this->db = $db;
    }
    public function isAuth() : bool {
        if(isset($this->id) && $this->id != null)
            return true;
        else
            return false;
    }
    public function login() {
      $query = "SELECT * FROM user WHERE login = ? LIMIT 1";
      $preparedQuery = $this->db->prepare($query);
      $preparedQuery->bind_param('s', $this->login);
      $preparedQuery->execute();
      $result = $preparedQuery->get_result();
      $row = $result->fetch_assoc();
      if(password_verify($this->password, $row['password'])) {
          $this->id = $row['id'];
          $this->firstName = $row['firstName'];
          $this->lastName = $row['lastName'];
        }  
    public function logout() { 
           
    }
    public function register() {
        $query = "INSERT INTO user VALUES (NULL, ?, ?, ?, ?)";
        $preparedQuery = $this->db->prepare($query);
        $passwordHash = password_hash($this->password, PASSWORD_ARGON2I);
        if(!isset($this->firstName))
            $this->firstName = "";
        if(!isset($this->lastName))
            $this->lastName = "";
        $preparedQuery->bind_param('ssss', $this->login
                                           $passwordHash,
                                           $this->firstName,
                                           $this->lastName);
        $preparedQuery->execute();                                           
    }

}

?> 