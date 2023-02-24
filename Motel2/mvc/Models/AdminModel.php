<?php
class AdminModel extends Hooks
{
  public function __construct()
  {
    $this->conn = $this->connectDB();
  }

  public function saveRoomModel($data, $files)
  {
    extract($data);
    $attr = serialize($attribute);
    $sql = "INSERT INTO rooms (name,
      acreage,
      price,
      province_id,
      district_id,
      ward_id,
      user_id,
      description,
      attribute)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    $result = $stmt->execute([
      $name,
      $acreage,
      $price,
      $province,
      $district,
      $ward,
      $user,
      $description,
      $attr
    ]);
    if ($result) {
      $res = $this->conn->lastInsertId();
      Helper::uploadFiles($this->conn, $files, $res);
      return $result;
    }
  }

  public function updateRoomModel($data, $files, $id)
  {
    extract($data);
    $attr = serialize($attribute);
    $sql = "UPDATE rooms 
    SET name = ?,
      acreage = ?,
      price = ?,
      province_id = ?,
      district_id = ?,
      ward_id = ?,
      description = ?,
      attribute = ?
    WHERE
      id = ?";
    $stmt = $this->conn->prepare($sql);
    $result = $stmt->execute([
      $name,
      $acreage,
      $price,
      $province,
      $district,
      $ward,
      $description,
      $attr,
      $id
    ]);
    if ($files) {
      Helper::deleteFileUpload($this->conn, $id);
      Helper::uploadFiles($this->conn, $files, $id);
    }
    return $result;
  }

  public function addAttributeModel($data)
  {
    extract($data);
    $sql = "INSERT INTO attributes (name)
    VALUES (?)";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$name]);
  }

  public function updateAttr($data, $id)
  {
    extract($data);
    $sql = "UPDATE `motel`.`attributes` SET `name` = ? WHERE `id` = ?";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$name, $id]);
  }

  public function destroy($table, $id)
  {
    Helper::deleteFileUpload($this->conn, $id);
    $sql = "DELETE FROM $table WHERE id = ? ;";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$id]);
  }
}
