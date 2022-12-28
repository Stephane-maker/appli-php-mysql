<?php 
include "../include/variable.php";
    function verifEmail($email, $db): bool {
        $sqlRequete = "SELECT * FROM user WHERE email = '$email'";
        $prepareRequete = $db->prepare($sqlRequete);
        $prepareRequete->execute();
        $result = $prepareRequete->fetch();
        if ($result) {
            return true;
        }else{
            return false;
        }
    }

    function passwordVerif($email,$db, $password ): bool {
        $sqlQuery = "SELECT * FROM user WHERE email = '$email'";
        $recipesStatement = $db->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetch();

        if (password_verify($password, $recipes['password'])) {
            return true;
        }else{
            return false;
        }
    }
    
?>