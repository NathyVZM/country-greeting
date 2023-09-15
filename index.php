<?php
// index.php

require_once('./src/classes/Country.php');
require_once('./src/classes/Greeting.php');
require_once('./src/helpers/getGreeting.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Saludo por Zona Horaria</title>
</head>
<body>
    <h1>Saludo por Zona Horaria</h1>
    <form method="POST">
        <label for="pais">Selecciona un país:</label>
        <select name="pais" id="pais">
            <option value="" selected>Selecciona un país</option>
            <?php foreach ($paises as $pais) { ?>
                <option value="<?php echo $pais->getNombre(); ?>"><?php echo $pais->getNombre(); ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="Obtener Saludo">
    </form>

    <?php if (!empty($mensajeSaludo)) { ?>
        <p><?php echo $mensajeSaludo; ?></p>
    <?php } ?>
</body>
</html>
