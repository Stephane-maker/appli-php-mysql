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
//     $timeTarget = 0.05; // 50 millisecondes

// $cost = 8;
// do {
//     $cost++;
//     $start = microtime(true);
//     password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
//     $end = microtime(true);
// } while (($end - $start) < $timeTarget);

// echo "Valeur de 'cost' la plus appropriée : " . $cost;
    ?>

    <form action="" method="post">
    <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email"  placeholder="email@gmail.com">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Your password</label>
        <input type="password" name="password" class="form-control"  placeholder="*****">
    </div>
    <div class="mb-3">
        <label for="confirmPassword" class="form-label">Confirm your password</label>
        <input type="password" name="confirmPassword" class="form-control"  placeholder="*****">
    </div>
    <div class="mb-3">
        <label for="Your name" class="form-label">Enter your name</label>
        <input type="text" name="name" class="form-control"  placeholder="stephane">
    </div>
    <div class="mb-3">
        <label for="Your last name" class="form-label">Enter your last name</label>
        <input type="test" name="lastName" class="form-control"  placeholder="thiebaut">
    </div>
    <button class="btn btn-primary" name="submit" type="submit">Button</button>
    </form>

    <?php 
        if (isset($_POST["submit"])) {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $confirmPassword = htmlspecialchars($_POST['confirmPassword']);
            $name = htmlspecialchars($_POST['name']);
            $lastName = htmlspecialchars($_POST['lastName']);
            if (strlen($password) >= 2 && $password == $confirmPassword && !empty($email) && !empty($name) && !empty($lastName)) { 
                $options  = [
                    "cost" => 11
                ];
                $passwordHach = password_hash($password, PASSWORD_BCRYPT, $options);
                $sqlRequete = "SELECT * FROM user WHERE email = '$email'";
                $prepareRequete = $db->prepare($sqlRequete);
                $prepareRequete->execute();
                $result = $prepareRequete->fetch();
                if ($result) {
                    echo "User est deja present";
                }else{
                    $addUser = "INSERT INTO user(email,passwor,name,last_name) VALUES (:email, :passwor ,:name,:last_name)";
                    $insertUser = $db->prepare($addUser);
                    $insertUser->execute([
                        "email" => $email,
                        "passwor" => $passwordHach,
                        "name" => $name,
                        "last_name" => $lastName
                    ]);
                }

            }else{
                echo "Complete correctly password is required";
            }
            
        }
    ?>
</body>
</html>