<?php
class AuthModel extends Hooks
{
  public function __construct()
  {
    $this->conn = $this->connectDB();
  }
  public function register($data)
  {
    extract($data);
    $newPass = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (name, password, email, address, phone, role)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$name, $newPass, $email, $address, $phone, $role]);
  }
  public function checkUser($data)
  {
    extract($data);
    $sql = "SELECT * FROM users WHERE email = ? ";
    $stmt = $this->conn->prepare($sql);
    if ($stmt->execute([$email])) {
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      $count = $stmt->rowCount();
      echo json_encode(['count' => $count]);
      return $result;
    }
    return false;
  }
  public function updateUser($data, $id)
  {
    extract($data);
    $new_pass = password_hash($password, PASSWORD_BCRYPT);
    $sql = "UPDATE users SET password = ? WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$new_pass, $id]);
  }
}
