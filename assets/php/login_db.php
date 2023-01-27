<?php 
    session_start();
    include('server.php'); 

    $errors = array();

    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if (empty($username)) {
            array_push($errors, "Le nom d'utilisateur est requis !");
        }

        if (empty($password)) {
            array_push($errors, "Le mot de passe est requis !");
        }

        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "Tu es maintenant connecté";
                header("location: https://carpool.breglerthomas.fr/");
            } else {
                array_push($errors, "Mauvais nom d'utilisateur ou mot de passe");
                $_SESSION['error'] = "Mauvais nom d'utilisateur ou mot de passe!";
                header("location: login.php");
            }
        } else {
            array_push($errors, "Le nom d'utilisateur et le mot de passe sont requis !");
            $_SESSION['error'] = "Le nom d'utilisateur et le mot de passe sont requis !";
            header("location:  login.php");
        }
    }

?>
