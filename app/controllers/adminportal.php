<?php

namespace Portal;

session_start();

class Adminportal{
    public function get()
    {
        if(isset($_SESSION['id']) && $_SESSION['admin'] == true)
        {
            \Controller\Utils::renderAdminPortal();
        }
        else
        {
            header('Location: /error',true,300);
        }
    }
}