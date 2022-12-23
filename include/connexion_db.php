<?php 
    try {
        $db = new PDO("mysql:host=localhost;dbname=my_app;charset=utf8", "root", "753159852456");
    } catch (Exception $th) {
        echo $th ->getMessage();
    }