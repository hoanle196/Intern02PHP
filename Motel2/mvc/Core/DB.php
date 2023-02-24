<?php
class DB
{
  private $server_name = TFO_SERVER_NAME;
  private $database_name = TFO_DATABASE_NAME;
  private $user_name = TFO_USERNAME;
  private $password = TFO_PASSWORD;
  public function connect()
  {
    try {
      $conn = new PDO("mysql:host={$this->server_name}; dbname={$this->database_name}; charset=utf8", $this->user_name, $this->password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die("Error: " . $e->getMessage());
    }
    return $conn;
  }
}
