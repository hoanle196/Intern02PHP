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
    $this->title = 'details Home';
    $data = $this->getListRoomModel($_GET['id']);
    $infoUserPost = $this->fetchOneInTable('users', $data[0]['user_id']);
    $attr = $this->fetchInhWithParam('attributes', unserialize($data[0]['attribute']));
    $this->content = $this->view('Client.details', compact('data', 'attr', 'infoUserPost'));
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

  public function booking()
  {
    $data = $this->getListRoomModel($_GET['id']);
    $infoUserPost = $this->fetchOneInTable('users', $data[0]['user_id']);
    $attr = $this->fetchInhWithParam('attributes', unserialize($data[0]['attribute']));
    $this->title = 'order Motel';
    $this->content = $this->view('Client.booking', compact('data', 'attr', 'infoUserPost'));
    $this->layout('client');
  }
  public function order()
  {
    if ($this->InsertOrder($_POST)) {
      Alert::notification([
        'status' => 'success',
        'message' => 'Booking successfully',
        'location' => '&a=order',
      ]);
    }
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
