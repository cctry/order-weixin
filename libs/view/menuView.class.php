<?php
chdir(__DIR__);
require_once("./View.class.php");
class menuView extends View{
    
    protected $names;
    protected $prices;
    protected $nameTags;
    protected $priceTags;

    public function putData($arr){//$arr is a key-value pair of name and price
        $this->exportData($arr);
        $this->generateTag(count($arr));
        /*$nameIterator = $this->iterate("name", $len);
        $priceIterator = $this->iterate("price", $len);
        $nameTags = array();
        $priceTags = array();
        $nameTags = $this->iterateTag($nameIterator, $names);
        $priceTags = $this->iterateTag($priceIterator, $prices);*/       
    }

    private function generateTag($len, $str){//TODO mk para
        $nameIterator = $this->iterate("name", $len);
        $priceIterator = $this->iterate("price", $len);
        $nameTags = array();
        $priceTags = array();
        $this->nameTags = $this->iterateTag($nameIterator, $this->names);
        $this->priceTags = $this->iterateTag($priceIterator, $this->prices);
    }

    private function exportData($arr){
        $names = array();
        $prices = array();
        foreach ($arr as $name => $price) {
            $names[] = $name;
            $prices[] = $price;
        }
        $this->names = $names;
        $this->prices = $prices;
    } 

    private function iterate($name, $num){//generate string
        for ($i=1; $i <= $num; $i++) { 
            $numTemp = (string)$i;
            yield $name.$numTemp;
        }
    }

    private function iterateTag($iterator, $arr){//assgin data
        $i = 0;//mark of loop
        $tempArr = array();
        foreach($iterator as $val){
            if (i < $len){
                $tempArr[] = $val;
                i++;
            }
            else{
                break;
            }
        }
        return $tempArr;
    }

    private function createDiv(){
        $div = <<<EOL
        <div class = "dish">
            
        </div>
EOL;  

    }

}
