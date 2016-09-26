<?php
abstract class Controller{
    protected $modelName;
    protected $viewName;
    protected $view;
    protected $model;
    protected $userid;

    abstract function useModel();
    abstract function useView($data);

    function __construct($id){
        $this->userid = $id;
    }
    
    public function run(){
        $this->model = $this->transferModel($this->modelName);
        $this->view = $this->transferView($this->viewName);
        $data = $this->useModel();
        $this->useView($data);       
    }

    private function transferModel($name){
        chdir(__DIR__);
        require_once("../models/".$name."Model.class.php");
        $model = $name."Model";
        $obj = new $model($this->userid);
        return $obj;
    }

    private function transferView($name){
        chdir(__DIR__);
        require_once("../view/".$name."View.class.php");
        $view = $name."View";
        $obj = new $view();
        return $obj;
    }


}