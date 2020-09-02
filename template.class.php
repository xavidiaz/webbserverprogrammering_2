<?php

class Template{
    var $assignedValues = array();
    var $tpl;

    function __construct($_path = ''){
        if(!empty($_path)){
            if(file_exists($_path)){
                $this->tpl=file_get_contents($_path);
            }else{
                echo "<b>Template Error: </b>File Inclusion Error.";
            }
        }
        echo $this->tpl;
    }
    

    function assign(){

    }

    function show(){


    }
}