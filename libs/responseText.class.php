<?php
    class responseText{
        protected $postObj;
        protected $content;
        protected $template = '<xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%s</CreateTime>
            <MsgType><![CDATA[text]]></MsgType>
            <Content><![CDATA[%s]]></Content>
            </xml>';
        
        public function __construct($obj){
            $this->postObj = $obj;
        }

        private function bulidMsg(){
            $postObj = $this->postObj;
            $FromUserName = $postObj->ToUserName;//swap the id
            $ToUserName = $postObj->FromUserName;
            $CreateTime = time();
            $info = sprintf($this->template,$ToUserName,$FromUserName,$CreateTime,$this->content);
            return $info;
        }

        public function send($content){
            $this->content = $content;
            echo $this->bulidMsg();
        }
    }
?>