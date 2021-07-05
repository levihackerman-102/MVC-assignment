<?php

namespace Controller;

session_start();

class Register{
    public function get()
    {
        echo \View\Loader::make()->render("templates/register.twig", array(
            "message" => "OK",
        ));
    }

    public function post()
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $passwordConfirm = $_POST["passwordConfirm"];

        $isSet = \Controller\Utils::isSet($name,$email,$password,$passwordConfirm);
        if(!$isSet)
        {
            echo \View\Loader::make()->render("templates/register.twig",array(
                "message" => 'All fields are required',
            ));

            return;
        }

        $res = \Model\Auth::emailCheck($email);

        if($res != NULL)
        {
            echo \View\Loader::make()->render("templates/register.twig",array(
                "message" => "This email has already been taken",
            ));

            return;
        }

        if($password != $passwordConfirm)
        {
            echo \View\Loader::make()->render("templates/register.twig",array(
                "message" => "Passwords do not match",
            ));

            return;
        }

        $hashedPassword = hash('sha256',$password);
        \Model\Auth::insert($name,$email,$hashedPassword);

        echo \View\Loader::make()->render("templates/register.twig",array(
            "message" => "User registered successfully",
        ));

        return;
    }
}