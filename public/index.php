<?php session_start();

require __DIR__."/../vendor/autoload.php";

Toro::serve(array(
    "/" => "\Controller\Home",
    "/register" => "\Controller\Register",
    "/login" => "\Controller\Login",
    "/adminportal" => "\Portal\Adminportal",
    "/addbook" => "\Controller\Addbook",
    "/approvereq" => "\Controller\Approvereq",
    "/denyreq" => "\Controller\Denyreq",
    "/clientportal" => "\Portal\Clientportal",
    "/bookreq" => "\Controller\Bookreq",
    "/returnbook" => "\Controller\Returnbook",
    "/logout" => "\Controller\Logout",
    "/error" => "\Controller\Error",
));