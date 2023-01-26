// Google MAP API Javascript

window.onload = function(){

    function carpoolMap() {

        // Demande la permission à l'utilisateur d'accéder à la Géolocalisation via le navateur (Pop up top left).
        navigator.geolocation.watchPosition(successCallback, errorCallback);

        // // 

        // watchPosition() est une fonction qui permet de récupérer la position de l'utilisateur à chaque changement de position sans recharger la page.
        navigator.geolocation.watchPosition(function(position) {
            // Récupère les coordonnées de la position de l'utilisateur (latitude et longitude).
            var position = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            let mapInDOM = document.querySelector('#map');

            // Crée une nouvelle carte (Google Map API) dans la div map.
            
            var map = new google.maps.Map(mapInDOM, {
                zoom: 14,
                center: position,
                mapId: '5d11314bef96ea20'
            });

        

            // Ajoute un marqueur à la carte à la position de l'utilisateur
            var marker = new google.maps.Marker({
                position: position,
                map: map
            });
        });

        // // 

        let date = new Date();  
        let heure = date.getHours();
        let minute = date.getMinutes();
        let seconde = date.getSeconds();
        let jour = date.getDate();
        let mois = date.getMonth() + 1;
        let annee = date.getFullYear();

        // Fonction de 'callback' en cas de succès de connexion à la Géolocalisation.
        function successCallback() {
            console.log("Connexion : ON | " + jour + "/" + mois + "/" + annee + " | " + heure + ":" + minute + ":" + seconde);
        }

        
        // Fonction de 'callback' en cas d'échec de connexion à la Géolocalisation.
        function errorCallback() {
            console.log("Connexion : OFF | " + jour + "/" + mois + "/" + annee + " | " + heure + ":" + minute + ":" + seconde);
        }


        navigator.geolocation.watchPosition(successCallback, errorCallback);

    }

    carpoolMap();
};




//
// BREGLER Thomas 
//