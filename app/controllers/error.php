<?php

namespace Controller;

session_start();

class Error{
    public function get()
    {
        echo \View\Loader::make()->render("templates/error.twig");
    }
}