<?php
include "../include/connexion_db.php";
include "../function/function.php";



    $sqlRequete = "SELECT * FROM user ";
    $prepareRequete = $db->prepare($sqlRequete);
    $prepareRequete->execute();
    $result = $prepareRequete->fetchAll();
    foreach ($result as $row) : ?> 
    <p><?php echo $row["email"] ?></p>
<?php endforeach; ?>
