<?php 
    session_start();
    if($_SESSION["loggedin"] != "true") {
        $_SESSION["error"] = "Login into your account";
        header("location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet"> 
        <script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
        <link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />
        <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
        <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css" type="text/css">
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <link rel="stylesheet" href="assets/css/app.css">
        <title>Weather App</title>
        <style>
            #map {
                width: 300px;
                height: 300px;
                border-radius : 15px;
            }
            @media screen and (max-width: 980px){ 
                #map {
                    width: 230px;
                    height: 230px;
                }
            }
        </style>
    </head>
    <body>
        <div class="search-container">
            <input type="text" placeholder="City name" class="search-text" spellcheck="false">
            <a href="#" class="search-btn">
                <i class="fas fa-search"></i>
            </a>
        </div>
        <div class="main">
            <div id="map"></div>
            <div class="weather-container">
                <div class="weather-description">
                    <h1 class="city-header">London</h1>
                    <div class="weather-main">
                        <div class="temperature"></div>
                        <div class="description-header">Rainy</div>
                        <div><img src="" alt="" class="weather-icon" height="100px" width="100px"></div>
                        <hr>
                    </div>
                    <div class="bottom-details" id="wind-speed">Winds at in 5 m/s</div>
                    <div class="bottom-details" id="humidity">Humidity levels at 57%</div>
                </div>
            </div>
        </div>
        <div class="footer">
            <button id="logout" class="logout">Logout</button>
        </div>
        <script src="assets/js/app.js" defer></script>
    </body>
</html>
