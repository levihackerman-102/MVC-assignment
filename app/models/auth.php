<?php

namespace Model;

session_start();

class Auth{

    public static function emailCheck($email)
    {
        $db = \DB::get_instance();
        $stmt = $db -> prepare("SELECT email FROM users WHERE email = ?");
        $stmt -> execute([$email]);
        $res = $stmt -> fetch();
        return $res;
    }

    public static function insert($name,$email,$password)
    {
        $db = \DB::get_instance();
        $stmt = $db -> prepare("INSERT INTO users (username,email,password) VALUES (?,?,?)");
        $stmt -> execute([$name,$email,$password]);
    }

    public static function getId($email)
    {
        $db = \DB::get_instance();
        $stmt = $db -> prepare("SELECT id FROM users WHERE email = ?");
        $stmt -> execute([$email]);
        $res = $stmt -> fetch();
        return $res;
    }

    public static function matchCred($email)
    {
        $db = \DB::get_instance();
        $stmt = $db -> prepare("SELECT * FROM users WHERE email = ?");
        $stmt -> execute([$email]);
        $res = $stmt -> fetch();
        return $res;
    }

}