<?php
chdir(__DIR__);
require_once("./Controller.class.php");
class menuController extends Controller{
    function __construct($id){
        parent::__construct($id);
        $this->modelName = "menu";
        $this->viewName = "menu";
    }

    public function useModel(){
        $model = $this->model;
        $data = $model->main();
        return $data;
    }

    public function useView($data){
        $view = $this->view;
        $view->putData($data);
        $view->display("menu.php");
    }
}