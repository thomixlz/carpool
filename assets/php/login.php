<?php
    session_start();
    include('server.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>

    <link rel="stylesheet" href="">
</head>
<body>
    
    <div class="header">
        <h2>Connexion</h2>
    </div>

    <form action="login_db.php" method="post">
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        <div class="input-group">
            <label for="username">Pseudonyme</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label for="password">Mot de passe</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button type="submit" name="login_user" class="btn">Connexion</button>
        </div>
        <p>Nouveau membre ? <a href="register.php">S'inscire</a></p>
    </form>

</body>
</html>