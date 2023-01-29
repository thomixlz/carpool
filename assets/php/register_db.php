<?php 
    session_start();
    include('server.php'); 
    
    $errors = array();

    if (isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

        if (empty($username)) {
            array_push($errors, "Nom d'utilisateur requis !");
            $_SESSION['error'] = "Nom d'utilisateur requis !";
        }
        if (empty($email)) {
            array_push($errors, "Email requis !");
            $_SESSION['error'] = "Email requis !";
        }
        if (empty($password_1)) {
            array_push($errors, "Mot de passe requis !");
            $_SESSION['error'] = "Mot de passe requis !";
        }
        if ($password_1 != $password_2) {
            array_push($errors, "Les deux mots de passe ne correspondent pas !");
            $_SESSION['error'] = "Les deux mots de passe ne correspondent pas !";
        }
        if(!preg_match("/^[a-zA-Z0-9]+$/", $_POST['username'])) {
            array_push($errors, "Le nom d'utilisateur ne doit contenir que des lettres et des chiffres !");
            $_SESSION['error'] = "Le nom d'utilisateur ne doit contenir que des lettres et des chiffres !";
        }

        $user_check_query = "SELECT * FROM user WHERE username = '$username' OR email = '$email' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { 
            if ($result['username'] === $username) {
                array_push($errors, "Nom d'utilisateur déjà existant !");
                $_SESSION['error'] = "Nom d'utilisateur déjà existant !";
            }
            if ($result['email'] === $email) {
                array_push($errors, "Email déjà existant !");
                $_SESSION['error'] = "Email déjà existant !";
            }
        }

        if (count($errors) == 0) {

            if (preg_match('/[^a-zA-Z0-9_]/', $username) || preg_match('/[^a-zA-Z0-9_@.]/', $email)) {
                array_push($errors, "Les requêtes SQL ne sont pas autorisées :p");
                $_SESSION['error'] = "Les requêtes SQL ne sont pas autorisées :p";
                header("location:  register.php");
            
            } else {

                $password = md5($password_1);

                $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
                mysqli_query($conn, $sql);

                $_SESSION['username'] = $username;
                $_SESSION['success'] = "Tu es maintenant connecté !";
                header("location: https://carpool.breglerthomas.fr/map.php");
            }

        } else {
            header("location: register.php");
        }

    }

?>
