<?php

$menu = [
    'desayuno' => ['Tostadas', 'Huevos', 'Cereal', 'chocolate', 'sandwich', 'cafe', 'cafe con leche'],
    'almuerzo' => ['Ensalada', 'Pizza', 'Sopa', 'Carne', 'Sopa', 'Spagettis' ],
    'cena' => ['Pasta', 'Pollo asado', 'Pescado',]
];

#reserva
$reserva = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['comida'])) {
        $comida = $_POST['comida'];

        if (isset($_POST['plato'])) {
            $plato = $_POST['plato'];
            $reserva = "Reserva realizada: escogiste, $plato para $comida ";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Comida</title>
</head>
<body>
    <h1> BIENVENIDOS AL RESTAURANTE  <h1>
<style>
        .menu-button {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background-color: #0000FF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .menu-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Menú</h1>
    
    <form method="post">
        <h2>Selecciona el tipo de comida:</h2>
        <button type="submit" name="comida" value="desayuno" class="menu-button">Desayuno</button>
        <button type="submit" name="comida" value="almuerzo" class="menu-button">Almuerzo</button>
        <button type="submit" name="comida" value="cena" class="menu-button">Cena</button>
    </form>

    <?php if (isset($_POST['comida'])): ?>
        <form method="post">
            <input type="hidden" name="comida" value="<?php echo $_POST['comida']; ?>">
            <h2>Selecciona un plato:</h2>
            <select name="plato" required>
                <?php
                $tipoComida = $_POST['comida'];
                foreach ($menu[$tipoComida] as $plato) {
                    echo "<option value=\"$plato\">$plato</option>";
                }
                ?>
            </select>
            <input type="submit" value="Hacer Reserva" class="menu-button">
        </form>
    <?php endif; ?>

    <?php if ($reserva): ?>
        <h2><?php echo $reserva; ?></h2>
    <?php endif; ?>
</body>
</html>
