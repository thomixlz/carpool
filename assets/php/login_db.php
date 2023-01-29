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

            // Vérification de la présence de requêtes SQL non autorisées
            if (preg_match('/[^a-zA-Z0-9_]/', $username)) {
                array_push($errors, "Les requêtes SQL ne sont pas autorisées :p");
                $_SESSION['error'] = "Les requêtes SQL ne sont pas autorisées :p";
                header("location:  login.php");
            } else {
                $password = md5($password);
                $stmt = $conn->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
                $stmt->bind_param("ss", $username, $password);
                $stmt->execute();
                $result = $stmt->get_result();
                if (mysqli_num_rows($result) == 1) {
                    $_SESSION['username'] = $username;
                    $_SESSION['success'] = "Tu es maintenant connecté";
                    header("location: https://carpool.breglerthomas.fr/map.php");
                } else {
                    array_push($errors, "Mauvais nom d'utilisateur ou mot de passe");
                    $_SESSION['error'] = "Mauvais nom d'utilisateur ou mot de passe!";
                    header("location: login.php");
                }
            }

        } else {
            array_push($errors, "Le nom d'utilisateur et le mot de passe sont requis !");
            $_SESSION['error'] = "Le nom d'utilisateur et le mot de passe sont requis !";
            header("location:  login.php");
        }
    }
    
?>
