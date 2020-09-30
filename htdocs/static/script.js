function setCurrentTime() {
    let now = new Date(new Date().toLocaleString("en-US",{timeZone: 'Asia/Dhaka'}));
    let time_text = now.toLocaleTimeString('en-US', {hour: 'numeric', minute: 'numeric'});
    let date_text = now.toLocaleDateString('en-US', {year: 'numeric', month: 'long', day: 'numeric'});
    document.querySelector('#current-time-text').textContent = time_text;
    document.querySelector('#current-date-text').textContent = date_text;
    let current_hour = now.getHours();
    let current_time_icon = document.querySelector('#current-time-icon');
    if (current_hour >= 6 && current_hour < 18) {
        current_time_icon.classList.remove('fa-moon');
        current_time_icon.classList.add('fa-sun');
    } else {
        current_time_icon.classList.remove('fa-sun');
        current_time_icon.classList.add('fa-moon');
    }
    console.log('tick');
}

function setCurrentWeather() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var result = JSON.parse(this.responseText);
            document.querySelector('#current_temperature').textContent = result['temperature'];
            document.querySelector('.today').querySelector('.temperature').textContent = result['temperature'];
            document.querySelector('.today').querySelector('.pressure_mb').textContent = result['pressure_mb'];
            document.querySelector('.today').querySelector('.wind').textContent = result['wind'];
            document.querySelector('.today').querySelector('.humidity').textContent = result['humidity'];
        }
    };
    xmlhttp.open("GET", "/weather_data_json.php", true);
    xmlhttp.send();
}

var ready = (callback) => {
    if (document.readyState != "loading") callback();
    else document.addEventListener("DOMContentLoaded", callback);
}

ready(() => {
    setInterval(setCurrentTime, 1000);
    setCurrentTime();

    setInterval(setCurrentWeather, 60000);
    setCurrentWeather();
});
