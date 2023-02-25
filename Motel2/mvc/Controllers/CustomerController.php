<?php
class CustomerController extends Hooks
{
  public function index()
  {
    if (isset($_GET['searchSubmit'])) {
      $data = $this->getBySearch($_GET);
    } else {
      $data = $this->getListRoomModel();
    }
    $this->title = 'Motel Home';
    $this->content = $this->view('Client.index', compact('data'));
    $this->layout('client');
  }

  public function detailRoom()
  {
    // $this->title = 'details Home';
    // $data = $this->getListRoomModel($_GET['id']);
    // $infoUserPost = $this->fetchOneInTable('users', $data[0]['user_id']);
    // $attr = $this->fetchInhWithParam('attributes', unserialize($data[0]['attribute']));
    // $this->content = $this->view('Client.details', compact('data', 'attr', 'infoUserPost'));
    // $this->layout('client');

    $bookings = $this->fetchAllInTable('bookings');
    $this->title = 'details';
    $data = $this->getListRoomModel($_GET['id']);
    $infoUserPost = $this->fetchOneInTable('users', $data[0]['user_id']);
    $attr = $this->fetchInhWithParam('attributes', unserialize($data[0]['attribute']));
    $this->content = $this->view('Client.details', compact('data', 'attr', 'infoUserPost', 'bookings'));
    $this->layout('client');
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

  // public function booking()
  // {
  //   $data = $this->getListRoomModel($_GET['id']);
  //   $infoUserPost = $this->fetchOneInTable('users', $data[0]['user_id']);
  //   $attr = $this->fetchInhWithParam('attributes', unserialize($data[0]['attribute']));
  //   $this->title = 'order Motel';
  //   $this->content = $this->view('Client.booking', compact('data', 'attr', 'infoUserPost'));
  //   $this->layout('client');
  // }
  // public function order()
  // {
  //   if ($this->InsertOrder($_POST)) {
  //     Alert::notification([
  //       'status' => 'success',
  //       'message' => 'Booking successfully',
  //       'location' => '&a=order',
  //     ]);
  //   }
  // }

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
      $data = $this->getListRoomModel($_GET['id']);
      $infoUser = $this->fetchOneInTable('users', $data[0]['user_id']);

      $content = $this->view('Admin-motel.confirm-order', compact('data', 'infoUser'));
      $args = [
        'email' => $infoUser[0]['email'],
        'username' => $infoUser[0]['name'],
        'content' => $content,
        'subject' => 'Thư xác nhận đặt phòng'
      ];
      if (Helper::sendEmail($args)) {

        Alert::notification([
          "status" => "success",
          "message" => "Order and Send email success fully",
          "location" => "&a=myOrder",
        ]);
      } else {
        Alert::notification([
          "status" => "error",
          "message" => "send email fail",
          "location" => "&a=index",
        ]);
      }
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

  public function canViewProfile()
  {
    return true;
  }


  public function canUpdateProfile()
  {
    return true;
  }

  public function canCreateOrder()
  {
  }

  public function canUpdateOrder()
  {
    return true;
  }

  public function canCancelOrder()
  {
    return true;
  }

  public function ApiGetDataDistrict()
  {
    $this->getDataDistrict($_GET);
  }
  public function ApiGetDataWard()
  {
    $this->getDataWard($_GET);
  }
}
