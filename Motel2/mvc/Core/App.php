<?php
class App
{
    public function __construct($c = null)
    {
        $classCtl = $_GET['c'] ?? 'customer';
        $function = $_GET['a'] ?? 'index';
        if ($c) {
            $classCtl = $c;
        }
        $controller = ucfirst($classCtl) . 'Controller';
        require_once("./mvc/Controllers/$controller.php");
        $objController = new $controller();
        $objController->$function();
    }
}
