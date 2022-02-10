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
        array_push($this->storage[$this->get_macros('JS')], "<script src=$src></script>");
        array_unique($this->storage[$this->get_macros('JS')]);
    }

    function addCss(string $link)
    {
        array_push($this->storage[$this->get_macros('CSS')], "<link rel=\"stylesheet\" href=\"$link\">");
        array_unique($this->storage[$this->get_macros('CSS')]);
    }

    function addString(string $str)
    {
        array_push($this->storage[$this->get_macros('STR')], $str);
        array_unique($this->storage[$this->get_macros('STR')]);
    }

    function setProperty(string $id, $value)
    {
        if(in_array($value, $this->storage_additional) == false)
        {
            $this->storage_additional[$this->create_prop_macros($id)] = $value;
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
        $value = $this->create_prop_macros($id);
        echo $value;
    }

    function getAllReplace()
    {
        $this->storage[$this->get_macros('JS')] = 
            implode("\n", $this->storage[$this->get_macros('JS')]);
        $this->storage[$this->get_macros('CSS')] = 
            implode("\n", $this->storage[$this->get_macros('CSS')]);
        $this->storage[$this->get_macros('STR')] = 
            implode("\n", $this->storage[$this->get_macros('STR')]);
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

    function create_prop_macros($string)
    {
        $new_macros = '#FW_PAGE_PROPERTY_'.$string.'#';
        return $new_macros;
    }

    function get_macros($value)
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