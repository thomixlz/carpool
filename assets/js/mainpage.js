// Redirection avec le bouton Connexion et Inscription

let buttonConnexion = document.querySelector('.login-button');
let buttonInscription = document.querySelector('.register-button');

buttonConnexion.addEventListener('click', function() {
    window.location.href = "https://carpool.breglerthomas.fr/assets/php/lsogin.php";
});

buttonInscription.addEventListener('click', function() {
    window.location.href = "https://carpool.breglerthomas.fr/assets/php/register.php";
});