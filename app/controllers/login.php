<?php

namespace Controller;

session_start();

class Login{
    public function get()
    {
        echo \View\Loader::make()->render("templates/login.twig", array(
            "message" => 'OK',
        ));
    }

    public function post()
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $isSet = \Controller\Utils::isSet($email,$password);
        if(!$isSet)
        {
            echo \View\Loader::make()->render("templates/login.twig",array(
                "message" => 'All fields are required',
            ));

            return;
        }
        $res = \Model\Auth::matchCred($email);
        $hashedPassword = hash("sha256",$password);
        
        if($res != NULL) {
            $res2 = \Model\Auth::matchCred($email);
            
            if($res2[3] == $hashedPassword) 
            {
                $id = \Model\Auth::getId($email);
                $_SESSION['id'] = $id;
                if($res[2] == 'anshulspidy@gmail.com')
                {
                    $_SESSION['admin'] = true;
                    header("Location: /adminportal");
                }
                else
                {
                    $_SESSION['admin'] = false;
                    $_SESSION['user'] = $res2[1];
                    header("Location: /clientportal");
                }
            }
            else 
            {
                echo \View\Loader::make()->render("templates/login.twig",array(
                    "message" => 'Incorrect username or password',
                ));
            }
        }
        else {
            echo \View\Loader::make()->render("templates/login.twig",array(
                "message" => 'Incorrect username or password',
            ));
        }
        return;
    }
}    