<?php
class StudentModel extends Hooks
{
  public function getRecode($params = null)
  {
    $conn = $this->connectDB();
    if ($params) {
      $sql = "SELECT
      s.*,
      i.image_path 
    FROM
      students s
    JOIN images i ON s.student_id = i.student_id
    WHERE s.student_id = :params";
      $stmt = $conn->prepare($sql);
      $stmt->execute(['params' => $params]);
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    }
    $sql = "SELECT
    s.*,
    i.image_path 
    FROM
    students s
    JOIN images i ON s.student_id = i.student_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
  public function getImage($id)
  {
    $conn = $this->connectDB();
    $sql = "SELECT * FROM images WHERE student_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
  public function deleteImage($id)
  {
    $conn = $this->connectDB();
    $sql = "DELETE FROM images WHERE student_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
  public function addRecode($post, $files)
  {
    $error = '';
    if (isset($post['submit'])) {
      $name = isset($post['name']) ? $post['name'] : '';
      $date = isset($post['date']) ? $post['date'] : '';
      $address = isset($post['address']) ?  $post['address'] : '';
      $avatar = isset($files['avatar']) ? $files['avatar'] : [];
      $avatar_name = isset($files['avatar']['name']) ? $files['avatar']['name'] : [];
      $avatar_size = isset($files['avatar']['size']) ? $files['avatar']['size'] : [];
      $avatar_tmp_name = isset($files['avatar']['tmp_name']) ? $files['avatar']['tmp_name'] : [];
      $avatar_error = isset($files['avatar']['error']) ? $files['avatar']['error'] : [];
      if (empty($error)) {

        extract($post);
        $conn = $this->connectDB();
        $sql = "INSERT INTO students (student_name, student_birthday, student_address)
        VALUES ('$name', '$date','$address')";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute()) {
          $res = $conn->lastInsertId();
        }
        $folder = "./public/uploads";
        if (!file_exists($folder)) {
          mkdir($folder);
        }
        // foreach ($avatar_name as $key => $name) {
        //   $fileName = time() . "-" . strtolower(basename($name));
        //   move_uploaded_file($avatar_tmp_name[$key], "$folder/$fileName");
        //   $sql = "INSERT INTO images (image_path, student_id) VALUES (?, ?)";
        //   $stmt = $conn->prepare($sql);
        //   $stmt->execute([$fileName, $res]);
        // }
        return true;
      }
    }
  }
  public function update($post, $params, $files = null)
  {
    extract($post);
    $conn = $this->connectDB();
    $sql =  "UPDATE students SET student_name = ?, student_birthday = ?, student_address = ?  WHERE student_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $date, $address, $params]);
    if ($files) {
      $folder = "./public/uploads";
      if (!file_exists($folder)) {
        mkdir($folder);
      }
      $this->deleteImage($params);
      foreach ($files['avatar']['name'] as $key => $name) {
        $fileName = time() . "-" . strtolower(basename($name));
        move_uploaded_file($files['avatar']['tmp_name'][$key], "$folder/$fileName");
        $sql = "INSERT INTO images (image_path, student_id) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$fileName, $params]);
      }
    }
    return true;
  }
  public function destroy($params)
  {
    $conn = $this->connectDB();
    $sql =  "DELETE FROM students  WHERE student_id = :id";
    $stmt = $conn->prepare($sql);
    return $stmt->execute(['id' => $params]);
  }
}
