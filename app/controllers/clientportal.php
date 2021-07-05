<?php

namespace Portal;

session_start();

class Clientportal{
    public function get()
    {
        if(isset($_SESSION['id']))
        {
            \Controller\Utils::renderClientPortal();
        }
        else
        {
            header('Location : /error',true,300);
        }
    }
}