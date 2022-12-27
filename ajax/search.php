<?php 
include "../include/connexion_db.php";



    
        if(isset($_POST["ma_variable"])){
            $variable = $_POST["ma_variable"];
            $sqlRequete = "SELECT * FROM aliment WHERE name  LIKE '%".$variable."%'
            OR bio LIKE '%".$variable."%' ";
            $prepareRequete = $db->prepare($sqlRequete);
            $prepareRequete->execute();
            $result = $prepareRequete->fetchAll();

        foreach ($result as $row){
            echo "<tr> <td>".$row["name"]."</td> <td>".$row["bio"]."</td> </tr>";
        }
    }else{
        $variable = $_POST["ma_variable"];
            $sqlRequete = "SELECT * FROM aliment WHERE name  LIKE '%".$variable."%'
            OR bio LIKE '%".$variable."%' ";
            $prepareRequete = $db->prepare($sqlRequete);
            $prepareRequete->execute();
            $result = $prepareRequete->fetchAll();

        foreach ($result as $row){
            echo "<tr> <td>".$row["name"]."</td> <td>".$row["bio"]."</td> </tr>";
        }
    }
?>
