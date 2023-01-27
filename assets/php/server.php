<?php 

    $servername = ""; 
    $username = "";
    $password = "";
    $dbname = "";

    // Creation
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check 
    if (!$conn) {
        die("Connection échoué à la base de donnée" . mysqli_connect_error());
    } 

?>