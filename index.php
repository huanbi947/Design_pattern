<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

require_once ("./core/Database.php");
require_once ("./models/BaseModel.php");
require_once ("./controllers/BaseController.php");

$controllerName = ucfirst(strtolower(($_REQUEST['controller']) ?? 'Home') . 'Controller');
$actionName = $_REQUEST['action'] ?? 'index';

require "./controllers/${controllerName}.php";

$controllerObject = new $controllerName;
$controllerObject -> $actionName();