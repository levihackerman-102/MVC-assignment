<?php

namespace Controller;

session_start();

class Utils{
    
    public static function isSet(...$values)
    {
        $flag=true;
        foreach($values as $v)
            if(empty($v) || !isset($v))
                $flag=false;
        return $flag;
    }

    public static function renderAdminPortal(){
        echo \View\Loader::make()->render("templates/adminportal.twig", array(
            "bookData" => \Books\bookCommands::getBooksAdmin(),
        ));
    }

    public static function renderClientPortal(){
        echo \View\Loader::make()->render("templates/clientportal.twig", array(
            "bookData" => \Books\bookCommands::getBooksAdmin(),
            "user" => $_SESSION['user'],
        ));
    }

};