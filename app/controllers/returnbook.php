<?php

namespace Controller;

session_start();

class Returnbook{
    public function post()
    {
        $bookid = $_POST['bookid'];
        \Books\bookCommands::returnbook($bookid);
        \Controller\Utils::renderClientPortal();
    }
}