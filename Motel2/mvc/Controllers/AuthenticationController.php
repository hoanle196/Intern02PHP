<?php
class AuthenticationController extends Hooks
{
  public function index()
  {

    $this->title = 'login';
    $this->content = $this->view('Auth.login');
    $this->layout('login');
  }

  public function createAdmin()
  {
    $this->title = 'register Admin';
    $this->content = $this->view('Auth.register-admin');
    $this->layout('login');
  }

  public function createCustomer()
  {
    $this->title = 'register Customer';
    $this->content = $this->view('Auth.register-customer');
    $this->layout('login');
  }

  public function forgotPassword()
  {
    $this->title = 'forgot password';
    $this->content = $this->view('Auth.forgot-password');
    $this->layout('login');
  }

  public function register()
  {
    $model = $this->model('AuthModel');
    if (!$model->register($_POST)) {
      Alert::notification([
        "status" => "error",
        "message" => "register false",
        "location" => "authentication&a=index",
      ]);
    } else {
      Alert::notification([
        "status" => "success",
        "message" => "register success",
        "location" => "authentication&a=index",
      ]);
    }
  }

  public function store()
  {
    $model = $this->model('AuthModel');
    $result = $model->checkUser($_POST);
    if ($result) {
      if (password_verify($_POST['password'], $result['password'])) {
        $_SESSION['login'] = $result;
        Alert::notification([
          "status" => "success",
          "message" => "Login success",
          "location" => "customer&a=index",
        ]);
      } else {
        Alert::notification([
          "status" => "error",
          "message" => "Wrong password",
          "location" => "authentication&a=index",
        ]);
      }
    } else {
      Alert::notification([
        "status" => "error",
        "message" => "Account does not exist",
        "location" => "authentication&a=index",
      ]);
    }
  }

  public function APICheck()
  {
    $model = $this->model('AuthModel');
    $model->checkUser($_GET);
  }

  public function sendEmail()
  {
    $model = $this->model('AuthModel');
    $result = $model->checkUser($_POST);
    if ($result) {
      $content = $this->view('Auth.content-email', compact('result'));
      $args = [
        'email' => $result['email'],
        'username' => $result['name'],
        'content' => $content,
        'subject' => 'Thư Cấp Lại Mật Khẩu'
      ];
      if (Helper::sendEmail($args)) {

        Alert::notification([
          "status" => "success",
          "message" => "Send email success fully",
          "location" => "authentication&a=index",
        ]);
      } else {
        Alert::notification([
          "status" => "error",
          "message" => "send email fail",
          "location" => "authentication&a=index",
        ]);
      }
    } else {
      Alert::notification([
        "status" => "error",
        "message" => "Account does not exist",
        "location" => "authentication&a=forgotPassword",
      ]);
    }
  }

  public function changePassword()
  {
    $this->title = 'Change password';
    $this->content = $this->view('Auth.change-password');
    $this->layout('login');
  }

  public function changePasswordSubmit()
  {
    $model = $this->model('AuthModel');
    if ($model->updateUser($_POST, $_GET['id'])) {
      Alert::notification([
        "status" => "success",
        "message" => "Change password successfully",
        "location" => "authentication&a=index",
      ]);
    } else {
      Alert::notification([
        "status" => "error",
        "message" => "Change password fail",
        "location" => "authentication&a=index",
      ]);
    }
  }
}
