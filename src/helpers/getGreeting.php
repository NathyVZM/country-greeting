<?php
// getGreeting.php

// Definición de los países
$paises = [
    new Pais('EEUU', 'America/New_York'),
    new Pais('Reino Unido', 'Europe/London'),
    new Pais('Francia', 'Europe/Paris'),
    new Pais('Japón', 'Asia/Tokyo'),
    new Pais('Australia', 'Australia/Sydney'),
    new Pais('Canadá', 'America/Toronto'),
    new Pais('Alemania', 'Europe/Berlin'),
    new Pais('Italia', 'Europe/Rome'),
    new Pais('España', 'Europe/Madrid'),
    new Pais('China', 'Asia/Shanghai'),
    new Pais('India', 'Asia/Kolkata'),
    new Pais('Rusia', 'Europe/Moscow'),
    new Pais('Sudáfrica', 'Africa/Johannesburg'),
    new Pais('Nueva Zelanda', 'Pacific/Auckland'),
    new Pais('Corea del Sur', 'Asia/Seoul'),
    new Pais('Arabia Saudita', 'Asia/Riyadh'),
    new Pais('Argentina', 'America/Argentina/Buenos_Aires'),
    new Pais('Brasil', 'America/Sao_Paulo'),
    new Pais('México', 'America/Mexico_City'),
    new Pais('Chile', 'America/Santiago'),
    new Pais('Colombia', 'America/Bogota'),
    new Pais('Perú', 'America/Lima'),
    new Pais('Venezuela', 'America/Caracas'),
];



// Función para determinar el saludo según la hora del día
function determinarSaludo($horaLocal) {
    $hora = $horaLocal->format('H');

    if ($hora >= 5 && $hora < 12) {
        return "¡Buenos días!";
    } elseif ($hora >= 12 && $hora < 18) {
        return "¡Buenas tardes!";
    } else {
        return "¡Buenas noches!";
    }
}

// Inicialización de variables
$paisSeleccionado = null;
$mensajeSaludo = '';

// Procesar el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['pais'])) {
        $nombrePais = $_POST['pais'];
        $paisSeleccionado = null;

        // Buscar el objeto Pais correspondiente al nombre seleccionado
        foreach ($paises as $pais) {
            if ($pais->getNombre() === $nombrePais) {
                $paisSeleccionado = $pais;
                break;
            }
        }

        if ($paisSeleccionado !== null) {
            $zonaHoraria = $paisSeleccionado->getZonaHoraria();
            $horaLocal = new DateTime('now', new DateTimeZone($zonaHoraria));
            $saludo = determinarSaludo($horaLocal);
            $mensajeSaludo = "$saludo Bienvenido a $nombrePais! En este momento son las " . $horaLocal->format('h:i A') . '.';
        } else {
            $mensajeSaludo = "Lo siento, no tenemos información para $nombrePais en este momento.";
        }
    }
}
?>
