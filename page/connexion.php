<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <?php 
    include "../include/connexion_db.php";
    ?>

    <form action="" method="POST">
    <div class="mb-3">
  <label for="email" class="form-label">Email address</label>
  <input type="email" name="email" class="form-control" placeholder="name@example.com">
</div>
    <div class="mb-3">
    <label for="password" class="form-label">password</label>
    <input type="password" name="password" class="form-control" placeholder="****">
    <button class="btn btn-primary" name="submit" type="submit">Button</button>
    </div>
    </form>

    <?php 
    if (isset($_POST['submit']) ) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sqlRequete = "SELECT * FROM user WHERE email = '$email'";
                $prepareRequete = $db->prepare($sqlRequete);
                $prepareRequete->execute();
                $result = $prepareRequete->fetch();
                if ($result) {
                    $sqlQuery = "SELECT * FROM user WHERE email = '$email'";
                    $recipesStatement = $db->prepare($sqlQuery);
                    $recipesStatement->execute();
                    $recipes = $recipesStatement->fetch();
                    if (password_verify($password, $recipes['passwor'])) {
                        session_start();
                        $_SESSION["id"] = $recipes['id'];
                        $_SESSION["email"] = $recipes['email'];
                        $_SESSION["username"] = $recipes['name'];
                        $_SESSION["lastname"] = $recipes["last_name"];
                        echo $_SESSION["id"];
                    }else{
                        echo "password not found";
                    }
                }else{
                    echo "User not present";
                }

        

    }else{
        echo "Please enter your email address and your password";
    }
    ?>
</body>
</html>