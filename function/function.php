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

        if (password_verify($password, $recipes['passwor'])) {
            return true;
        }else{
            return false;
        }
    }
    
    function aes_encode($text, $s_key, $iv){
        return base64_encode(openssl_encrypt($text, "AES-128-CBC", $s_key, 0, $iv));
    }
    
    function aes_decode($encrypt_text, $s_key, $iv){
        return openssl_decrypt(base64_decode($encrypt_text), "AES-128-CBC", $s_key, 0, $iv);
    }
?>