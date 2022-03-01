<?php

namespace FW\core;

class Page
{

    use Traits\Singleton;

    private $storage_additional= [];

    private $storage =
    [
        '#_FW_PAGE_JS#' => array(),
        '#_FW_PAGE_CSS#' => array(),
        '#_FW_PAGE_STR#' => array()
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
        $newstorage = $this->chekEmpty($this->storage);
        foreach($this->storage_additional as $key => $value)
        {
            $newstorage[$key] = $value;
        }

        return $newstorage;
    }

    function showHead()
    {
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

    function chekEmpty ($macrosArr)
    {
      foreach ($macrosArr as $key => $value)
      {
        if (empty($value))
        {
          $value = "";
        }
      }
      return $macrosArr;
    }
}


?>
