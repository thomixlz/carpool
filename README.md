# Carpool 

Création d'une application web de covoiturage pour l'établissement Metz Numeric School.

## v0.1

* Add+ - Google Map Javascript API Connexion - Connexion fonctionnel
* Add+ - Map de test en page principal. (index.php)
* Add+ - Localisation de l'utilisateur suivant sa position en temps réel
* Add+ - Ajout d'un marker affichant la position à l'utilisateur sur la carte
* Add+ - Ajout d'information console en cas de problème de connexion (Connexion Statuts | Date | Time)

## v0.2

- Add+ - Ajout de l'outil Google Map Styles permettant la personnalisation de la carte
- Fix~ - Callback erreur (connectivité et réponse avec l'API Google Map)
- Fix~ - Adaptivité de l'outil Google Map (Version)

## v0.3

- Add+ - PHP 8.0
- Add+ - Base de donnée SQL - PHPMYADMIN
- Add+ - Connection avec la base de donnée - Connexion fonctionnel (./assets/php/server.php)
- Add+ - Page d'inscription (username, email, password) :
            * Nom d'utilisateur unique.
            * Email unique.
            * Confirmation de mot de passe (2 champs).
            * Mot de passe chiffrée dans la base de donnée (Méthode: hash md5)
- Add+ - Page de connexion (Main page du site)
            * Demande Nom d'utilisateur et mot de passe
            * Redirection vers l'app carpool à index.php
- Add+ - Bouton de Déconnexion sur l'app.

## v0.4

- Add+ - Condition : Nom d'utilisateur uniquement des lettres et des chiffres à l'inscription.
- Add+ - Protection Injection SQL formulaire d'inscription et de connexion.

## v0.5

- Add+ - Fichier .htaccess
- Add+ - Réécriture d'URL grâce à la commande SSH mod_rewrite
        * Suppression de l'extension .php dans l'URL
        * Supression de l'arborescence dans l'URL
        
!!! Contrainte de l'hebergement : Commande SSH non disponible, donc infonctionnel - hébergeur mutualisée !!!

## v0.6

- Add+ - Page d'acceuil type One Page.
       * Reproduction basique maquette Figma. (en cours)
- Fix~ - Correctif de la page index.php en map.php + Redirection général.

## v0.7

- Fix~ - Champ email dans l'inscription erreur: les caractères spéciaux considéré comme une injection SQL. (Allow @ and .)
- Add+ - Main page avancée














