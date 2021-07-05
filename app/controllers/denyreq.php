<?php

namespace Controller;

session_start();

class Denyreq{
    public function post()
    {
        $bookid = $_POST['bookid'];
        \Books\bookCommands::denyreq($bookid);
        \Controller\Utils::renderAdminPortal();
    }
}