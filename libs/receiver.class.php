<?php
    class recevier{//parse the XML and return the type of Msg(text or event)

        protected $postStr;
        
        function __construct($str) {
            $this->postStr = $str;
        }

        public function parseXML(){
            $postObj = simplexml_load_string($this->postStr);
            return $postObj;
        }
      
    }
?>