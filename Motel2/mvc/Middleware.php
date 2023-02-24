<?php
require_once("./config.php");
require_once("./mvc/Core/DB.php");
require_once("./mvc/Core/Hooks.php");
require_once("./mvc/Helper/Helper.php");
require_once("./mvc/Helper/Alert.php");
// require_once("./mvc/Controllers/UserController.php");
require_once("./mvc/Core/App.php");
class MiddleWare extends Hooks
{
  public function __construct()
  {
    if (!isset($_SESSION['login'])) return new App('authentication');
    if (isset($_SESSION['login']['role'])) {
      switch ($_SESSION['login']['role']) {
        case '0':
          return new App('superadmin');
          break;
        case '1':
          return new App('admin');
          break;
        case '2':
          return new App('customer');
          break;
        case '4':
          return new App('notfound');
          break;
        default:
          break;
      };
    }
    return new App();
  }
}
