<?php
class SuperadminController extends Hooks
{

  public function index()
  {
    $this->title = 'Motel Home';
    $this->content = $this->view('Client.index');
    $this->layout('client');
  }
  public function details()
  {
    $this->title = 'details Home';
    $this->content = $this->view('Client.details');
    $this->layout('client');
  }
  public function dashboard()
  {
    $this->title = 'Super admin dashboard';
    $this->content = $this->view('Super-admin.index');
    $this->layout('admin');
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
  public function canCreateUser()
  {
    return true;
  }

  public function canEditUser()
  {
    return true;
  }

  public function canDeleteUser()
  {
    return true;
  }
}
