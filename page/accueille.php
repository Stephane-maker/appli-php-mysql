

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <title>Document</title>
</head>

<body>
    <?php 
    session_start();
    $_SESSION["id"] = $_GET["id"];
    if(!isset($_SESSION["id"])){
        header("Location: connexion.php");
    }
    ?>


<?php 
include "../include/nav-bar/nav.php";
include "../include/connexion_db.php";
include "../include/variable.php";
    $id = $_GET["id"];
    $sqlQuery = "SELECT * FROM user WHERE id = 6";
    $recipesStatement = $db->prepare($sqlQuery);
    $recipesStatement->execute();
    $recipes = $recipesStatement->fetchAll();
    foreach($recipes as $items) : ?>
    <ul>
        <li><?php echo $items["email"] ?></li>
        <li><?php echo $items["name"] ?></li>
        <li><?php echo $items["last_name"] ?></li>
    </ul>
    <?php  endforeach;  ?>
    <?php 
    $idUser = $_GET["id"];
    
    ?>
    
    <input type="search" name="search" id="search" >
    <div id="result"></div>
    <div id="post">
        
    </div>


    <script  src="../ajax/js/search.js"></script>
    <script src="../ajax/js/post.js"></script>
</body>
</html>