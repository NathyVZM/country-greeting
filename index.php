<?php

require_once('./src/classes/Country.php');
require_once('./src/classes/Greeting.php');
require_once('./src/helpers/getGreeting.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Saludo por Zona Horaria</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>Saludo por Zona Horaria</h1>
        <?php if (!empty($greetingMessage)) { ?>
            <h2><?php echo $greetingMessage; ?></h2>
        <?php } ?>
        <form method="POST">
            <select name="country" id="country" class="input">
                <option value="" selected>Selecciona un país</option>
                <?php foreach ($countries as $country) { ?>
                    <option value="<?php echo $country->getName(); ?>"><?php echo $country->getName(); ?></option>
                <?php } ?>
            </select>
            <input type="submit" value="Obtener Saludo" class="button">
        </form>
    </main>
</body>
</html>
