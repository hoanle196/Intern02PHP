<?php
class AdminController extends Hooks
{
  public function index()
  {
    if (isset($_GET['searchSubmit'])) {
      $data = $this->getBySearch($_GET);
    } else {
      $data = $this->getListRoomModel();
    }
    $this->title = 'Motel';
    $this->content = $this->view('Client.index', compact('data'));
    $this->layout('client');
  }

  public function detailRoom()
  {
    $bookings = $this->fetchAllInTable('bookings');
    // var_dump($bookings);
    // exit;
    $this->title = 'details';
    $data = $this->getListRoomModel($_GET['id']);
    $infoUserPost = $this->fetchOneInTable('users', $data[0]['user_id']);
    $attr = $this->fetchInhWithParam('attributes', unserialize($data[0]['attribute']));
    $this->content = $this->view('Client.details', compact('data', 'attr', 'infoUserPost', 'bookings'));
    $this->layout('client');
  }

  public function dashboard()
  {
    $this->title = 'dashboard';
    $this->content = $this->view('Admin-motel.index');
    $this->layout('admin');
  }

  public function createRoom()
  {
    $data = $this->fetchAllInTable('attributes');
    $this->title = 'create';
    $this->content = $this->view('Admin-motel.create-room', compact('data'));
    $this->layout('admin');
  }

  public function saveRoom()
  {
    $model = $this->model('AdminModel');
    if (!($model->saveRoomModel($_POST, $_FILES))) {
      return Alert::notification([
        "status" => "error",
        "message" => "add fail",
        "location" => "&a=listRoom",
      ]);
    }
    Alert::notification([
      "status" => "success",
      "message" => "add success fully",
      "location" => "&a=listRoom",
    ]);
  }

  public function listRoom()
  {
    $result = $this->getListRoomModel();
    $this->title = 'list';
    $this->content = $this->view('Admin-motel.list-room', compact('result'));
    $this->layout('admin');
  }

  public function editRoom()
  {
    $attr = $this->fetchAllInTable('attributes');
    $data = $this->getListRoomModel($_GET['id']);
    $image = $this->getDataImage($_GET['id']);
    $this->title = 'edit';
    $this->content = $this->view('Admin-motel.edit-room', compact('data', 'attr', 'image'));
    $this->layout('admin');
  }
  public function updateRoom()
  {
    $model = $this->model('AdminModel');
    if (!($model->updateRoomModel($_POST, $_FILES, $_GET['id']))) {
      return Alert::notification([
        "status" => "error",
        "message" => "edit fail",
        "location" => "&a=listAttribute",
      ]);
    }
    Alert::notification([
      "status" => "success",
      "message" => "edit success",
      "location" => "&a=listRoom",
    ]);
  }

  public function destroyRoom()
  {
    if (!($this->destroyWithId('rooms', $_GET['id']))) {
      return Alert::notification([
        "status" => "error",
        "message" => "delete fail",
        "location" => "&a=listRoom",
      ]);
    }
    Alert::notification([
      "status" => "success",
      "message" => "delete success",
      "location" => "&a=listRoom",
    ]);
  }

  public function createAttribute()
  {
    $this->title = 'attribute';
    $this->content = $this->view('Admin-motel.create-attribute');
    $this->layout('admin');
  }

  public function addAttribute()
  {
    $model = $this->model('AdminModel');
    if ($model->addAttributeModel($_POST)) {
      Alert::notification([
        "status" => "success",
        "message" => "add success fully",
        "location" => "&a=listAttribute",
      ]);
    }
  }

  public function listAttribute()
  {
    // $model = $this->model('AdminModel');
    $result = $this->fetchAllInTable('attributes');
    $this->title = 'list';
    $this->content = $this->view('Admin-motel.list-attribute', compact('result'));
    $this->layout('admin');
  }

  public function editAttr()
  {
    $result = $this->fetchOneInTable('attributes', $_GET['id']);
    $this->title = 'edit';
    $this->content = $this->view('Admin-motel.edit-attribute', compact('result'));
    $this->layout('admin');
  }

  public function updateAttr()
  {
    $model = $this->model('AdminModel');
    if (!($model->updateAttr($_POST, $_GET['id']))) {
      return Alert::notification([
        "status" => "error",
        "message" => "edit fail",
        "location" => "&a=listAttribute",
      ]);
    }
    Alert::notification([
      "status" => "success",
      "message" => "edit success",
      "location" => "&a=listAttribute",
    ]);
  }

  public function destroyAttr()
  {
    if (!($this->destroyWithId('attributes', $_GET['id']))) {
      return Alert::notification([
        "status" => "error",
        "message" => "delete fail",
        "location" => "&a=listAttribute",
      ]);
    }
    Alert::notification([
      "status" => "success",
      "message" => "delete success",
      "location" => "&a=listAttribute",
    ]);
  }
  public function booking()
  {
    if ($this->InsertBooking($_POST)) {
      $bookingId = $this->conn->lastInsertId();
      // Alert::notification([
      //   'status' => 'success',
      //   'message' => 'Booking successfully',
      //   'location' => '&a=myOrder',
      // ]);
      $data = $this->getListRoomModel($_GET['id']);
      $attr = $this->fetchInhWithParam('attributes', unserialize($data[0]['attribute']));
      $infoUserPost = $this->fetchOneInTable('users', $data[0]['user_id']);
    }
    $this->title = 'order Motel';
    $this->content = $this->view('Client.order', compact('data', 'attr', 'infoUserPost', 'bookingId'));
    $this->layout('client');
  }

  public function order()
  {
    if ($this->InsertOrder($_POST)) {
      Alert::notification([
        'status' => 'success',
        'message' => 'Order successfully',
        'location' => '&a=myOrder',
      ]);
    }
  }
  public function myOrder()
  {
    $this->title = 'my order';
    // $data = $this->getListRoomModel($_GET['id']);
    // $infoUserPost = $this->fetchOneInTable('users', $data[0]['user_id']);
    // $attr = $this->fetchInhWithParam('attributes', unserialize($data[0]['attribute']));
    $this->content = $this->view('Client.list-order');
    $this->layout('client');
  }














  public function ApiGetDataDistrict()
  {
    $this->getDataDistrict($_GET);
  }
  public function ApiGetDataWard()
  {
    $this->getDataWard($_GET);
  }









  public function logout()
  {
    unset($_SESSION['login']);
    Alert::notification([
      'status' => 'success',
      'message' => 'logout successfully',
      'location' => 'authentication&a=index',
    ]);
  }

  public function canManageOrders()
  {
    return true;
  }

  public function canManageCustomers()
  {
    return true;
  }
}
