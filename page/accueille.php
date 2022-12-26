

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
include "../include/connexion_db.php";
    $id = $_GET["id"];
    $sqlQuery = "SELECT * FROM user WHERE id = '$id'";
    $recipesStatement = $db->prepare($sqlQuery);
    $recipesStatement->execute();
    $recipes = $recipesStatement->fetchAll();
    foreach($recipes as $items) : ?>
    <ul>
        <li><?php echo $items["email"] ?></li>
        <li><?php echo $items["name"] ?></li>
        <li><?php echo $items["last_name"] ?></li>
    </ul>
    <?php endforeach ?>

    
    <input type="search" name="search" id="search" >
    
    <script>
        if(document.readyState){
           
            $('#search').keydown(function (e) {
                $.post("../ajax/search.php", {ma_variable : $("#search").val()}, function(data){
                console.log(data + "ma_var")
            })

                $.ajax({
                url : "../ajax/search.php",
                method : 'POST',
                async : true,
                dataType : 'html',
                success: function (data) {
                    console.log(data);
                },
                error: function(data){
                    console.error(data);
                }
                
            })
            })
        
    
        
        }
    </script>
</body>
</html>