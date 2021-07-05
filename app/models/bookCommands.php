<?php

namespace Books;

session_start();

class bookCommands{

    public static function getBooksAdmin(){
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM books");
        $stmt-> execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public static function approvereq($bookid,$userid){
        $db = \DB::get_instance();

        $stmt = $db->prepare("UPDATE books SET bookuser = ? WHERE bookid = ?");
        $stmt -> execute([$userid,$bookid]);

        return;
    }

    public static function denyreq($bookid){
        $db = \DB::get_instance();

        $stmt = $db->prepare("UPDATE books SET requestedby = ? WHERE bookid = ?");
        $stmt -> execute(['admin', $bookid]);

        return;
    }

    public static function addbook($title)
    {
        $db = \DB::get_instance();
        $stmt = $db -> prepare("INSERT INTO books (title) VALUES (?)");
        $stmt -> execute([$title]);

        return;
    }

    public static function bookreq($bookid,$user)
    {
        $db = \DB::get_instance();
        $stmt = $db -> prepare("UPDATE books SET requestedby = ? WHERE bookid = ?");
        $stmt -> execute([$user,$bookid]);

        return;
    }

    public static function returnbook($bookid)
    {
        $db = \DB::get_instance();
        $stmt1 = $db -> prepare("UPDATE books SET bookuser = ? WHERE bookid = ?");
        $stmt1 -> execute(['admin',$bookid]);

        $stmt2 = $db -> prepare("UPDATE books SET requestedby = ? WHERE bookid = ?");
        $stmt2 -> execute(['admin',$bookid]);

        return;
    }
}