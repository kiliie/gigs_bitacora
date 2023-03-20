<?php
require_once "controller/routesControler.php";
require_once "controller/userController.php";
require_once "controller/visitaController.php";
require_once "controller/vehiculoController.php";
require_once "controller/salidaController.php";
require_once "model/usersModel.php";
require_once "model/visitaModel.php";
require_once "model/vehiculoModel.php";



header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header('Access-Control-Allow-Headers: Authorization');

//var_export($_SERVER['HTTP_AUTHORIZATION']);
/*list($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) = 
  explode(':', $_SERVER['HTTP_AUTHORIZATION']);
  var_export($_SERVER['PHP_AUTH_USER']);
  echo(" d");
if(isset($_SERVER['PHP_AUTH_USER']) && (isset($_SERVER['PHP_AUTH_PW']))){
    $ok = false;
    $identifier = $_SERVER['PHP_AUTH_USER'];
    $key = $_SERVER['PHP_AUTH_PW'];
    $users = ModelUsers::getUsersAuth(); 
    foreach($users as $u){   
        if($identifier.":".$key == $u["us_identifier"].":".$u["us_key"]){
            $ok=true;
        }
    }
    if($ok){*/
        $routes = new RoutesController();
        $routes->index();
  /* }else{
        $json = array(
            "authenticate:"=>"Unauthorized"
        );
        echo json_encode($json,true);
        return;
      }
}else{
    header('WWW-Authenticate: Basic realm="Course.com"');
    header('HTTP/1.0 401 Unauthorized');
}*/
?>