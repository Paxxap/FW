<?php 

namespace FW\core;

class Page
{

    use Traits\Singleton;

    private $storage_src = [];
    private $storage_link = [];
    private $storage_string = [];
    private $storage_additional= [];
    private $macros = ['#FW_MACROS_SRC#', '#FW_MACROS_CSS#', '#FW_MACROS_STR#'];


    function addJs(string $src)
    {
        array_push($this->storage_src, $src);
        array_unique($this->storage_src);
    }

    function addCss(string $link)
    {
        array_push($this->storage_link, $link);
        array_unique($this->storage_link);
    }

    function addString(string $str)
    {
        array_push($this->storage_string, $str);
        array_unique($this->storage_str);
    }

    function setProperty(string $id, mixed $value)
    {
        if(in_array($value, $this->storage_additional) == false)
        {
            $this->storage_additional[$id] = $value;
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

    function ShowProperty(string $id)
    {
        $value = '#FW_PAGE_PROPERTY_{'.$id.'}#';
        echo $value;
        array_push($this->property_macros, $value);
    }

    function getAllReplace()
    {
        $default_macros = [$this->macros[0] => $this->storage_src, $this->macros[1] => $this->storage_link, 
        $this->macros[2] => $this->storage_str ];



        
        
    }

    function showHead()
    {
       foreach($this->macros as $value)
       {
           echo $value."\n";
       }
    }
}


?>