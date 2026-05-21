<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) : "Arquitectura de Máquinas"; ?>
    </title>

    <?php
    $basePath = "";

    if (
        str_contains($_SERVER["PHP_SELF"], "/pages/") ||
        str_contains($_SERVER["PHP_SELF"], "/tutoriales/") ||
        str_contains($_SERVER["PHP_SELF"], "/practicas/")
    ) {
        $basePath = "../";
    }
    ?>

    <link rel="stylesheet" href="<?php echo $basePath; ?>assets/css/styles.css">
</head>

<body>