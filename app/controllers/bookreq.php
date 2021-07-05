<?php

namespace Controller;

session_start();

class Bookreq{
    public function post()
    {
        $bookid = $_POST['bookid'];
        \Books\bookCommands::bookreq($bookid,$_SESSION['user']);
        \Controller\Utils::renderClientPortal();
    }
}