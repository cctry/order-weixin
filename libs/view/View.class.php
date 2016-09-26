<?php
class View{
    protected $data;

    public function assgin($name,$value){
        $this->data[$name] = $value;
    }

    public function display($file){
        chdir(__DIR__);
        $file = "../../src/views/".$file;
        if(is_file($file)){
            extract($this->data);
            require_once($file);//这里执行了显示
        }
    }

}