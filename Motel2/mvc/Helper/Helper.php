<?php
class Helper
{
  public static function sendEmail($args = [])
  {
    require "PHPMailer-master/src/PHPMailer.php"; //nhúng thư viện vào để dùng, sửa lại đường dẫn cho đúng nếu bạn lưu vào chỗ khác
    require "PHPMailer-master/src/SMTP.php"; //nhúng thư viện vào để dùng
    require 'PHPMailer-master/src/Exception.php'; //nhúng thư viện vào để dùng
    $mail = new PHPMailer\PHPMailer\PHPMailer(true); //true: enables exceptions
    try {
      $mail->SMTPDebug = 0; // 0,1,2: chế độ debug. khi mọi cấu hình đều tớt thì chỉnh lại 0 
      $mail->isSMTP();
      $mail->CharSet = "utf-8";
      $mail->Host = 'smtp.gmail.com'; //SMTP servers
      $mail->SMTPAuth = true; // Enable authentication
      $root_user = 'hoanle161996@gmail.com';
      $root_password = 'vrkegkthkswrdqhy';
      $display_user = 'Admin-hoanle';
      $mail->Username = $root_user; // SMTP username
      $mail->Password = $root_password; // SMTP password
      $mail->SMTPSecure = 'ssl'; // encryption TLS/SSL
      $mail->Port = 465; // port to connect to
      $mail->setFrom($root_user, $display_user);
      $to = $args['email'];
      $to_name = $args['username'];
      $mail->addAddress($to, $to_name); //mail và tên người nhận
      $mail->isHTML(true); // Set email format to HTML
      $mail->Subject = $args['subject'];
      $mail->Body = $args['content'];
      $mail->smtpConnect(array(
        "ssl" => array(
          "verify_peer" => false,
          "verify_peer_name" => false,
          "allow_self_signed" => true,
        ),
      ));
      $mail->send();
      return true;
    } catch (Exception $e) {
      return false;
    }
  }
  public static function uploadFiles($conn, $files, $params)
  {
    extract($files);
    $folder = "./public/uploads";
    if (!file_exists($folder)) {
      mkdir($folder, 0777, true);
    }
    foreach ($images['name'] as $key => $name) {
      $fileName = time() . "-" . strtolower(basename($name));
      move_uploaded_file($images['tmp_name'][$key], "$folder/$fileName");
      $sql = "INSERT INTO images (path, room_id) VALUES (?, ?)";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$fileName, $params]);
    }
  }
  public static function deleteFileUpload($conn, $image_id)
  {
    $sql = "SELECT * FROM images WHERE room_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$image_id]);
    $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($images) {
      $folder = "./public/uploads";
      foreach ($images as $image) {
        $file_path = "$folder/" . $image['path'];
        if (file_exists($file_path)) {
          unlink($file_path);
        }
      }
      $sql = "DELETE FROM images WHERE room_id=?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$image_id]);
    }
  }
  public static function createQuerySearch($data)
  {
    extract($data);
    $sql = "SELECT
      r.`id`,
      r.`name`,
      r.price,
      r.`status`,
      r.district_id,
      r.province_id,
      r.ward_id,
      r.user_id,
      r.acreage,
      r.attribute,
      r.description,
      GROUP_CONCAT(i.`path`) as paths,
      p.`name` AS province,
      d.`name` AS district,
      w.`name` AS ward 
    FROM
      rooms r
      LEFT JOIN images i ON i.room_id = r.id
      JOIN provinces p ON r.province_id = p.id
      JOIN districts d ON r.district_id = d.id
      JOIN wards w ON r.ward_id = w.id";
    $province = is_numeric($province) ? "AND r.province_id = $province" : '';
    $district = is_numeric($district) ? "AND r.district_id = $district" : '';
    $ward = is_numeric($ward) ? "AND r.ward_id = $ward"  : '';
    $price = is_numeric($price) ? "AND r.price <= $price " : '';
    $cond = "r.`name` LIKE '%$name%' $province $district $ward $price ";
    $sql .= " WHERE $cond GROUP BY  r.id";

    return $sql;
  }
  public static function createQueryGet($condition = null)
  {
    $sql = "SELECT
      r.`id`,
      r.`name`,
      r.price,
      r.`status`,
      r.district_id,
      r.province_id,
      r.ward_id,
      r.user_id,
      r.acreage,
      r.attribute,
      r.description,
      GROUP_CONCAT(i.`path`) as paths,
      p.`name` AS province,
      d.`name` AS district,
      w.`name` AS ward 
    FROM
      rooms r
    LEFT JOIN images i ON i.room_id = r.id
    JOIN provinces p ON r.province_id = p.id
    JOIN districts d ON r.district_id = d.id
    JOIN wards w ON r.ward_id = w.id
    GROUP BY  r.id ";
    if ($condition) $sql .= "	HAVING r.id = {$condition};";
    return $sql;
  }
}
