const apiKey = "f096450d2ffd91d06e9125c75fa412e5";
let cityInput = document.querySelector(".search-text");
let cityHeader = document.querySelector(".city-header");
let temperature = document.querySelector(".temperature");
let descriptionHeader = document.querySelector(".description-header");
let icon = document.querySelector(".weather-icon");
let windSpeed = document.querySelector("#wind-speed");
let humidity = document.querySelector("#humidity");
let cityName;

document.querySelector(".search-btn").addEventListener("click",function(){
    cityName = cityInput.value;
    cityInput.value = "";
    if(/^[a-zA-Z]+$/.test(cityName)){
        serverRequest(cityName);
    }else {
        alert("Enter valid city name");
    }
})

function serverRequest(city){
    fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&units=metric&appid=${apiKey}`)
    .then(res => {
        if(!res.ok) {
            throw new Error("Invalid city name");
        }
        return res.json()
    })
    .then(res => {
        changeWeather(res);
    })
    .catch(err => {
        alert(err.message);
    });
}

function changeWeather(weatherAPI){
    const lattitude = weatherAPI.coord.lat;
    const longitude = weatherAPI.coord.lon;
    console.log(lattitude,longitude);

    mapboxgl.accessToken = 'pk.eyJ1IjoiZ2F1dGhhbS1rdW1hciIsImEiOiJja3Ezbmk1bjcwNjJ1Mm9tcGVnMHNqOHUwIn0.U7oyaG8uni4-6CbgG_9VrA';

    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center : [longitude,lattitude],
        zoom : 12
    });

    var marker = new mapboxgl.Marker()
    .setLngLat([longitude,lattitude]) 
    .addTo(map);


    const body = document.querySelector("body");
    body.style.backgroundImage = `url("/weather-app/images/${weatherAPI.weather[0].main}.jpg")`;

    document.querySelector(".weather-container").style.visibility = "visible";

    cityHeader.textContent = weatherAPI.name;

    temperature.innerHTML = Math.round(weatherAPI.main.temp) + '&#176';

    descriptionHeader.textContent = weatherAPI.weather[0].description.slice(0,1).toUpperCase() + weatherAPI.weather[0].description.slice(1);

    icon.src = "http://openweathermap.org/img/wn/" + weatherAPI.weather[0].icon + "@2x.png";

    windSpeed.textContent = `Winds at in ${Math.round(weatherAPI.wind.speed)} m/s`;

    humidity.textContent = `Humidity levels at ${Math.round(weatherAPI.main.humidity)}%`;
}

// for logout

document.getElementById("logout").addEventListener("click",function() {
    window.location.href = "/weather-app/server/logout.php";
})
