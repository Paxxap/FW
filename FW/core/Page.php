<?php 

namespace FW\core;

class Page
{

    use Traits\Singleton;

    private $storage_additional= [];

    private $storage = 
    [
        '#_FW_PAGE_JS#' => [],
        '#_FW_PAGE_CSS#' => [],
        '#_FW_PAGE_STR#' => []
    ];


    function addJs(string $src)
    {
        array_push($this->storage[$this->getMacros('JS')], "<script src=$src></script>");
        array_unique($this->storage[$this->getMacros('JS')]);
    }

    function addCss(string $link)
    {
        array_push($this->storage[$this->getMacros('CSS')], "<link rel=\"stylesheet\" href=\"$link\">");
        array_unique($this->storage[$this->getMacros('CSS')]);
    }

    function addString(string $str)
    {
        array_push($this->storage[$this->getMacros('STR')], $str);
        array_unique($this->storage[$this->getMacros('STR')]);
    }

    function setProperty(string $id, $value)
    {
        if(in_array($value, $this->storage_additional) == false)
        {
            $this->storage_additional[$this->CreatePropMacros($id)] = $value;
        }
    }

    function getProperty(string $id)
    {
        foreach($this->storage_additional as $key => $value)
        {
            if($key === $id)
            {
                return $this->storage_additional[$id];
            }
        }
    }

    function showProperty(string $id)
    {
        $value = $this->CreatePropMacros($id);
        echo $value;
    }

    function getAllReplace()
    {
        $this->storage[$this->getMacros('JS')] = 
            implode("\n", $this->storage[$this->getMacros('JS')]);
        $this->storage[$this->getMacros('CSS')] = 
            implode("\n", $this->storage[$this->getMacros('CSS')]);
        $this->storage[$this->getMacros('STR')] = 
            implode("\n", $this->storage[$this->getMacros('STR')]);
        foreach($this->storage_additional as $key => $value)
        {
            $this->storage[$key] = $value;
        }
        return $this->storage;
    }

    function showHead()
    {
        // возможно сделать красивее
       $num = 0;
       foreach($this->storage as $key => $value)
       {
           $num++;
           echo $key."\n";
           if ($num == 3){
               break;
           }
       }
    }

    function CreatePropMacros($string)
    {
        $new_macros = '#FW_PAGE_PROPERTY_'.$string.'#';
        return $new_macros;
    }

    function getMacros($value)
    {
        switch($value)
        {
            case "JS": 
                return '#_FW_PAGE_JS#';
            case "CSS": 
                return '#_FW_PAGE_CSS#';
            case "STR":
                return '#_FW_PAGE_STR#';
        }
    }
}


?>