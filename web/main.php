<?php
//chdir(__DIR__);
$id = $_GET['nsukey'];
$name = "menu";
require_once("./config.php");
autoLoad($classList);
startController($name,$id);
//require_once("../libs/models/menuModel.class.php");
//require_once("../libs/models/Model.class.php");
//require_once("../libs/views/View.class.php");
//require_once("../libs/views/menuView.class.php");

function startController($controllerName,$id){    
    //require_once("../libs/controllers/".$name."Controller.class.php");
    $controller = $controllerName.'Controller';
    $obj = new $controller($id);
    $obj->run();
}

function autoLoad($list){
    foreach ($list as $add) {
        require_once("../libs/".$add.".class.php");
    }
    
}