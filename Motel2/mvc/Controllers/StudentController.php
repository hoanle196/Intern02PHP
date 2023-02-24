<?php
class StudentController extends Hooks
{
  public function index()
  {
    $model = $this->model('StudentModel');
    $data = $model->getRecode();
    $this->title = 'List Student';
    $this->content = $this->view('student.index', compact('data'));
    $this->layout('main');
  }
  public function create()
  {
    $this->title = 'create Student';
    $this->content = $this->view('student.create');
    require_once('./mvc/views/layout/main.php');
  }
  public function edit()
  {
    if (isset($_GET['id'])) {
      $model = $this->model('StudentModel');
      $data = $model->getRecode($_GET['id']);
      $img = $model->getImage($_GET['id']);
      $this->title = 'Edit Student';
      $this->content = $this->view('student.edit', compact('data', 'img'));
      $this->layout('main');
    }
  }
  public function store()
  {
    $model = $this->model('StudentModel');
    if ($model->addRecode($_POST, $_FILES)) {
      $_SESSION['success'] = 'đã thêm sinh viên thành công !';
      header('location:' . TFO_INDEX);
      exit;
    } else {
      $_SESSION['error'] = 'false';
      header('location:' . TFO_INDEX);
      exit;
    }
  }
  public function save()
  {
    if (isset($_GET['id'])) {
      $model = $this->model('StudentModel');
      if ($model->update($_POST, $_GET['id'], $_FILES,)) {
        $_SESSION['success'] = 'Sửa sinh viên thành công !';
        header('location:' . TFO_INDEX);
        exit;
      } else {
        $_SESSION['error'] = 'false';
        header('location:' . TFO_INDEX);
        exit;
      }
    }
  }
  public function destroy()
  {
    if (isset($_GET['id'])) {
      $model = $this->model('StudentModel');
      if ($model->destroy($_GET['id'])) {
        $_SESSION['success'] = 'đã xoá sinh viên thành công !';
        header('location:' . TFO_INDEX);
        exit;
      } else {
        $_SESSION['error'] = 'false';
        header('location:' . TFO_INDEX);
        exit;
      }
    }
  }
}

//http://localhost/intern02/php/day7/MVC/public/css/styles.css
//http://localhost/intern02/php/day7/public/css/styles.css