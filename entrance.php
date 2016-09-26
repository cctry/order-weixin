<?php
    function entrance($postStr){
        require_once("./libs/receiver.class.php"); 
        $recObj = new recevier($postStr);
        $XMLobj = $recObj->parseXML();//parsed the XML                            
        $typeOfPost = $XMLobj->MsgType;
        if($typeOfPost == 'event'){
            require_once("./libs/processors/eventProcessor.class.php");
            $eventPro = new eventProcessor($XMLobj);          
            $eventPro->process();
        }
        elseif ($typeOfPost == 'text') {
            require_once("./libs/processors/textProcessor.class.php");
            $textPro = new textProcessor($XMLobj);
            $textPro->process();
        }
        else
        {
            exit;//error
        }
    }   
?>