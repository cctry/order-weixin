<?php
class menuModel{
    private $menuData;
    private $names;
    private $prices;
    function __construct($id){
        chdir(__DIR__);
        $this->menuData = simplexml_load_file("../../src/menu.xml");
    }

    public function main(){
        $this->export($this->menuData);
        $data = $this->putData($this->names,$this->prices);
        return $data;
    }

    private function putData($arr1,$arr2){
        $data = array();
        for ($i=0; $i < sizeof($arr1); $i++) { 
            $data[$arr1[$i]] = $arr2[$i];
        }
        return $data;
    }
    
     
    private function export($menuData){
        $names = $menuData->xpath("//name");
        $prices = $menuData->xpath("//price");
        $this->names = $this->convertType($names);
        $prices = $this->convertType($prices);
        $this->prices = $this->toInt($prices);//convert string to int
    }

    private function convertType($obj){
        $objArr = array();
        foreach ($obj as $valObj) {
            $tempArr = (array)$valObj;
            $objArr[] = $tempArr[0];
        }
        return $objArr;
    }

    private function toInt($arr){
        $tempArr = array();
        foreach ($arr as $value) {
            $tempArr = (int)$value;
        }
        return $tempArr;
    }


}

