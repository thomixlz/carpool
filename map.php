<?php 
    session_start();

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ./assets/php/login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: ./assets/php/login.php');
    }

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS -->
        <link rel="stylesheet" href="./assets/css/style.css">
		
		<title>Carpool v0.5</title>

	</head>

	<body>
		<div class="homeheader">
			<h2>Carpool</h2>
		</div>
	
		<div class="homecontent">
			
			<!--  Notification utilisateur connecté -->
			<?php if (isset($_SESSION['success'])) : ?>
				<div class="success">
					<h3>
						<?php 
							echo $_SESSION['success'];
							unset($_SESSION['success']);
						?>
					</h3>
				</div>
			<?php endif ?>
		
			<!-- Informations utilisateur connecté -->
			<?php if (isset($_SESSION['username'])) : ?>
				<p>Bienvenue <strong><?php echo $_SESSION['username']; ?></strong></p>
				<p><a href="index.html?logout='1'">Déconnexion</a></p>
			<?php endif ?>
		</div>

		<!-- CARPOOL -->

		<div id="map"></div>

        <!-- Google Maps API Key -->
        <script src="https://maps.google.com/maps/api/js?key=AIzaSyBZsoe0YGgBhZelT2glGpiqU0nUYvMOp0o&callback=Function.prototype" type="text/javascript"></script>

        <!-- JS Géolocalisation -->
        <script src="./assets/js/geolocalisation.js"></script>

	</body>
</html>