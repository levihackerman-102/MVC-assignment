<?php

namespace Controller;

session_start();

class Addbook{
    public function post(){
        $title = $_POST['title'];
        \Books\bookCommands::addbook($title);
        \Controller\Utils::renderAdminPortal();
    }
}