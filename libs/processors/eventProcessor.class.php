<?php
    class eventProcessor{
        
        protected $XMLobj;
        protected $eventArr = array('subscribe','unsubscribe','LOCATION','CLICK','VIEW');
        protected $event;

        public function __construct($obj){
            $this->XMLobj = $obj;
            if (in_array($obj->Event,$this->eventArr)){
                $this->event = $obj->Event;//get the type of the event
            }
            else{
                echo "";//error
            }
        }

        public function process(){
                eval('$this->'.$this->event.'();');   
        }

        private function subscribe(){
            chdir(__DIR__);
            require_once("../responseText.class.php");
            $resObj = new responseText($this->XMLobj);           
            $content = "欢迎使用!\n输入“菜单”可查看菜单</a>\n输入“订单”可查看当前订单及等待状况";
            $resObj->send($content);
        }

    }
?>