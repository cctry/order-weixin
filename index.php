<?php
    define("TOKEN", "cctry");
    $echostr = $_GET['echostr'];
    if($echostr){
        if(checkSignature()){
            echo $echostr;
        }
    }
    else{
        require_once('./entrance.php');
        $postStr = $GLOBALS['HTTP_RAW_POST_DATA'];
        entrance($postStr);       
    }

    function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];	
        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );
	
	    if( $tmpStr == $signature ){
		    return true;
	        }
        else{
		    return false;
	        }
    }
?>