<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <title>Document</title>
</head>
<body>
    <?php 
    include "../include/connexion_db.php";
    include "../function/function.php";
    ?>

<form action="" method="POST" id="fromConnexion">
    <div class="mb-3">
  <label for="email" class="form-label">Email address</label>
  <input type="email" name="email" class="form-control" placeholder="name@example.com">
</div>
    <div class="mb-3">
    <label for="password" class="form-label">password</label>
    <input type="password" name="password" class="form-control" placeholder="****">
</div>
<button class="btn btn-primary" name="submit" type="submit" id="btnFunctionAjax">Button</button>
</form>
    <?php 
        if (isset($_POST["submit"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            if(verifEmail($email, $db)){
                if(passwordVerif($email,$db, $password )){
                    session_start();
                    $sqlQuery = "SELECT * FROM user WHERE email = '$email'";
                    $recipesStatement = $db->prepare($sqlQuery);
                    $recipesStatement->execute();
                    $recipes = $recipesStatement->fetch();
                    echo $recipes["id"];
                    session_start();
                    $_SESSION["id"] = $recipes["id"];
                    
                    
                    header('Location: accueille.php?id='.$_SESSION["id"]);
                }else{
                    echo "password error";
                }
            }else{
                echo "email incorrect";
            }
        }
    ?>
</body>
</html>