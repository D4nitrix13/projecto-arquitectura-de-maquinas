<?php
require_once __DIR__ . "/includes/session.php";
require_once __DIR__ . "/includes/progreso.php";

if (estudianteAutenticado()) {
    header("Location: index.php");
    exit;
}

$error = "";
$carnet = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $carnet = strtoupper(trim($_POST["carnet"] ?? ""));

    if ($carnet === "") {
        $error = "Debes ingresar tu número de carnet.";
    } elseif (!validarCarnet($carnet)) {
        $error = "Formato de carnet inválido. Ejemplo correcto: 2023-0823I";
    } else {
        $_SESSION["estudiante_carnet"] = $carnet;
        $_SESSION["estudiante_login_at"] = date("Y-m-d H:i:s");

        registrarEstudiante($carnet);

        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Iniciar sesión | Arquitectura de Máquinas</title>

    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body class="auth-body">
    <main class="auth-wrapper">
        <section class="auth-card">
            <div class="auth-brand">
                <span>AMC</span>
                <h1>Arquitectura de Máquinas</h1>
            </div>

            <div class="auth-header">
                <span class="badge">Acceso de estudiantes</span>
                <h2>Iniciar sesión</h2>
                <p>
                    Ingresa tu número de carnet universitario para acceder
                    al contenido, unidades, tutoriales y prácticas.
                </p>
            </div>

            <?php if ($error !== ""): ?>
                <div class="auth-alert">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <form method="POST" class="auth-form" autocomplete="off">
                <label for="carnet">Número de carnet</label>

                <input
                    type="text"
                    id="carnet"
                    name="carnet"
                    value="<?php echo htmlspecialchars($carnet); ?>"
                    placeholder="Ejemplo: 2023-0823I"
                    required>

                <small>
                    Formato esperado: año, guion, cuatro números y una letra.
                    Ejemplo: <strong>2023-0823I</strong>
                </small>

                <button type="submit" class="btn btn-primary">
                    Entrar al sistema
                </button>
            </form>

            <div class="auth-note">
                <strong>Nota:</strong> este acceso no usa contraseña. Solo valida
                el formato del carnet para identificar al estudiante dentro del proyecto.
            </div>
        </section>
    </main>
</body>

</html>