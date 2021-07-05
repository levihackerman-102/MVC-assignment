<?php

namespace Controller;

session_start();

class Approvereq{
    public function post()
    {
        $bookid = $_POST['bookid'];
        $userid = $_POST['userid'];
        \Books\bookCommands::approvereq($bookid,$userid);
        \Controller\Utils::renderAdminPortal();
    }
}