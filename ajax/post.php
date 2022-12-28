<?php
include "../include/connexion_db.php";
    if(isset($_POST['id'])){
        $idUser = $_POST['id'];
        $sqlQuery = "SELECT post FROM post WHERE id_poster = '$idUser'";
        $recipesStatement = $db->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();
        foreach ($recipes as $recipes){
            echo $recipes["post"] . " ";
    }
    }
?>