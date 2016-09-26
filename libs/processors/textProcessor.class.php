<?php
    class textProcessor{

        protected $XMLobj;
        protected $recContent;
        protected $id;
        protected $t;
        
        public function __construct($obj){
            $this->XMLobj = $obj;  
            $this->recContent = $obj->Content;
            $this->id = $obj->FromUserName;
            $this->t = $obj->CreateTime;                   
        }

        public function process(){
            chdir(__DIR__);
            require_once("../responseText.class.php");
            $resObj = new responseText($this->XMLobj);
            $resObj->send($this->generateContent());
        }

        private function generateContent(){
            chdir(__DIR__);
            $rules = simplexml_load_file("../../src/responseRules.xml");
            $content = $rules->xpath("//rule[@receive = '".$this->recContent."']");
            if (empty($content)){
                echo "";
            }
            return $content[0]; 
        }

    }