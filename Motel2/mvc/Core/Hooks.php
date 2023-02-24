<?php
class Hooks
{
    public $title = 'Student';
    public $content;
    public $conn;
    public function connectDB()
    {
        $obj = new DB;
        $this->conn = $obj->connect();
        return $this->conn;
    }
    public function model($model)
    {
        require_once("./mvc/models/$model.php");
        return new $model;
    }
    public function view($view, $args = [])
    {
        ob_start();
        extract($args);
        $path = str_replace('.', '/', $view);
        require_once("./mvc/views/$path.php");
        $content = ob_get_clean();
        return $content;
    }
    public function layout($layout)
    {
        require_once("./mvc/views/layout/$layout.php");
    }
    public function getDataDistrict($data)
    {
        $this->connectDB();
        extract($data);
        $sql = "SELECT * FROM districts WHERE districts.province_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$province]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($result);
    }

    public function getDataWard($data)
    {
        $this->connectDB();
        extract($data);
        $sql = "SELECT * FROM wards WHERE wards.district_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$ward]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($result);
    }
    public function getDataImage($id)
    {
        $this->connectDB();
        $sql = "SELECT * FROM images WHERE room_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchAllInTable($table)
    {
        $this->connectDB();
        $sql = "SELECT * FROM $table";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchOneInTable($table, $id)
    {
        $this->connectDB();
        $sql = "SELECT * FROM $table WHERE id = ? ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchInhWithParam($table, $params)
    {
        $this->connectDB();
        $sql = "SELECT * FROM $table WHERE id IN (" . implode(',', $params) . ")";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function destroyWithId($table, $id)
    {
        $this->connectDB();
        Helper::deleteFileUpload($this->conn, $id);
        $sql = "DELETE FROM $table WHERE id = ? ;";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function getListRoomModel($condition = null)
    {
        $this->connectDB();
        if ($condition) {
            $sql = Helper::createQueryGet($condition);
        } else {
            $sql = Helper::createQueryGet();
        }
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBySearch($data)
    {
        $this->connectDB();
        $sql = Helper::createQuerySearch($data);
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function InsertBooking($data)
    {
        $this->connectDB();
        extract($data);
        $sql = "INSERT INTO bookings ( bookings.start_date, bookings.end_date, bookings.room_id, bookings.user_id )
        VALUES
            ( ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$start, $end, $_GET['id'], $_SESSION['login']['id']]);
    }
    public function InsertOrder($data)
    {
        $this->connectDB();
        extract($data);
        $sql = "INSERT INTO orders ( orders.booking_id, orders.price )
        VALUES
            ( ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$bookingId, $price]);
    }
}
