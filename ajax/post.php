<?php

$loader = require __DIR__ . '\..\vendor\autoload.php';
$loader->addPsr4('Acme\\Test\\', __DIR__);

use \Firebase\JWT\JWT;
use Firebase\JWT\Key;
include "../include/connexion_db.php";
include "../include/variable.php";

    if(isset($_POST['id'])){
        $decoded = JWT::decode($_POST["id"], new Key($key, 'HS256'));
        $arrayToken = [];
        $arrayToken = $decoded;
        $id;

        foreach ($decoded as $array){
            $id = $array;
        }
        $sqlQuery = "SELECT post FROM post WHERE id_poster = '$id'";
        $recipesStatement = $db->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();
        foreach ($recipes as $recipes){
            echo $recipes["post"] . " ";
    }
}
?>