<?php

$countries = [
    new Country('EEUU', 'America/New_York'),
    new Country('Reino Unido', 'Europe/London'),
    new Country('Francia', 'Europe/Paris'),
    new Country('Japón', 'Asia/Tokyo'),
    new Country('Australia', 'Australia/Sydney'),
    new Country('Canadá', 'America/Toronto'),
    new Country('Alemania', 'Europe/Berlin'),
    new Country('Italia', 'Europe/Rome'),
    new Country('España', 'Europe/Madrid'),
    new Country('China', 'Asia/Shanghai'),
    new Country('India', 'Asia/Kolkata'),
    new Country('Rusia', 'Europe/Moscow'),
    new Country('Sudáfrica', 'Africa/Johannesburg'),
    new Country('Nueva Zelanda', 'Pacific/Auckland'),
    new Country('Corea del Sur', 'Asia/Seoul'),
    new Country('Arabia Saudita', 'Asia/Riyadh'),
    new Country('Argentina', 'America/Argentina/Buenos_Aires'),
    new Country('Brasil', 'America/Sao_Paulo'),
    new Country('México', 'America/Mexico_City'),
    new Country('Chile', 'America/Santiago'),
    new Country('Colombia', 'America/Bogota'),
    new Country('Perú', 'America/Lima'),
    new Country('Venezuela', 'America/Caracas'),
];


function defineGreeting($localTime) {
    $time = $localTime->format('H');

    if ($time >= 5 && $time < 12) return "¡Buenos días! ☀️";
    elseif ($time >= 12 && $time < 18) return "¡Buenas tardes! 🌤️";
    else return "¡Buenas noches! 🌛";
}

$selectedCountry = null;
$greetingMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['country'])) {
        $countryName = $_POST['country'];
        $selectedCountry = null;

        foreach ($countries as $country) {
            if ($country->getName() === $countryName) {
                $selectedCountry = $country;
                break;
            }
        }

        if ($selectedCountry !== null) {
            $timezone = $selectedCountry->getTimezone();
            $localTime = new DateTime('now', new DateTimeZone($timezone));
            $greeting = new Greeting(defineGreeting($localTime), $localTime);
            $greetingMessage = $greeting->getMessage() . " Bienvenido a $countryName! En este momento son las " . $greeting->getLocalTime() . '.';
        } else {
            $greetingMessage = "Lo siento, no tenemos información para $countryName en este momento.";
        }
    }
}
?>
