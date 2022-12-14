<?php
session_start();

class Connection
{
  public $host = "localhost:8111";
  public $username = "root";
  public $password = "";
  public $database = "db_laundry";
  public $conn;

  public function __construct()
  {
    $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
  }
}

class Registrasi extends Connection
{
  public function registration($name, $username, $email, $password, $confirmpassword)
  {
    $duplicate = mysqli_query($this->conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
    if (mysqli_num_rows($duplicate) > 0) {
      return 10;
      // Username or email has already taken
    } else {
      if ($password == $confirmpassword) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO tb_user VALUES('', '$name', '$username', '$email', '$password_hash')";
        mysqli_query($this->conn, $query);
        return 1;
        // Registration successful
      } else {
        return 100;
        // Password does not match
      }
    }
  }
}

class Login extends Connection
{
  public $id;
  public function login($usernameemail, $password)

  {
    $result = mysqli_query($this->conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
      if (password_verify($password, $row["password"])) {
        $this->id = $row["id"];
        return 1;
        // Login successful
      } else {
        return 10;
        // Wrong password
      }
    } else {
      return 100;
      // User not registered
    }
  }

  public function idUser()
  {
    return $this->id;
  }
}

class Select extends Connection
{
  public function selectUserById($id)
  {
    $result = mysqli_query($this->conn, "SELECT * FROM tb_user WHERE id = $id");
    return mysqli_fetch_assoc($result);
  }
}
