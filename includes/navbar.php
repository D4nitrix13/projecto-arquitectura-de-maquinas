<?php
require_once __DIR__ . "/session.php";
require_once __DIR__ . "/progreso.php";

$currentPage = $currentPage ?? "";
$basePath = "";

if (
    str_contains($_SERVER["PHP_SELF"], "/pages/") ||
    str_contains($_SERVER["PHP_SELF"], "/tutoriales/") ||
    str_contains($_SERVER["PHP_SELF"], "/practicas/")
) {
    $basePath = "../";
}

$currentFile = basename($_SERVER["PHP_SELF"]);

$isUnidadesActive = str_contains($_SERVER["PHP_SELF"], "/pages/");
$isTutorialesActive = str_contains($_SERVER["PHP_SELF"], "/tutoriales/");
$isPracticasActive = str_contains($_SERVER["PHP_SELF"], "/practicas/");

$carnetEstudiante = obtenerCarnetEstudiante();
$unidades = obtenerConfiguracionUnidades();
?>

<header class="site-header">
    <nav class="navbar">
        <a href="<?php echo $basePath; ?>index.php" class="logo">
            <span>AMC</span>
            Arquitectura de Máquinas
        </a>

        <button class="menu-toggle" id="menuToggle" aria-label="Abrir menú">
            ☰
        </button>

        <ul class="nav-links" id="navLinks">
            <li>
                <a href="<?php echo $basePath; ?>index.php"
                    class="<?php echo $currentPage === 'inicio' ? 'active' : ''; ?>">
                    Inicio
                </a>
            </li>

            <li class="nav-dropdown">
                <details class="dropdown-details">
                    <summary class="<?php echo $isUnidadesActive ? 'active' : ''; ?>">
                        Unidades
                    </summary>

                    <div class="dropdown-menu dropdown-menu-wide">
                        <?php foreach ($unidades as $archivo => $unidad): ?>
                            <?php
                            $bloqueada = unidadBloqueadaParaEstudiante($carnetEstudiante, $archivo);
                            $href = $basePath . "pages/" . $archivo;
                            $activeClass = $currentFile === $archivo ? "active" : "";
                            $lockedClass = $bloqueada ? "dropdown-link-locked" : "";
                            ?>

                            <a href="<?php echo $href; ?>"
                                class="<?php echo trim($activeClass . " " . $lockedClass); ?>"
                                title="<?php echo $bloqueada ? 'Bloqueada: aprueba la unidad anterior.' : $unidad["nombre"]; ?>">
                                <strong><?php echo htmlspecialchars($unidad["nombre"]); ?></strong>

                                <?php if ($bloqueada): ?>
                                    <small>Bloqueada 🔒</small>
                                <?php else: ?>
                                    <small>Disponible</small>
                                <?php endif; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </details>
            </li>

            <li class="nav-dropdown">
                <details class="dropdown-details">
                    <summary class="<?php echo $isTutorialesActive ? 'active' : ''; ?>">
                        Tutoriales
                    </summary>

                    <div class="dropdown-menu">
                        <a href="<?php echo $basePath; ?>tutoriales/emu8086.php"
                            class="<?php echo $currentFile === 'emu8086.php' ? 'active' : ''; ?>">
                            EMU8086
                        </a>

                        <a href="<?php echo $basePath; ?>tutoriales/arduino-tinkercad.php"
                            class="<?php echo $currentFile === 'arduino-tinkercad.php' ? 'active' : ''; ?>">
                            Arduino y Tinkercad
                        </a>
                    </div>
                </details>
            </li>

            <li class="nav-dropdown">
                <details class="dropdown-details">
                    <summary class="<?php echo $isPracticasActive ? 'active' : ''; ?>">
                        Prácticas
                    </summary>

                    <div class="dropdown-menu">
                        <a href="<?php echo $basePath; ?>practicas/emu8086-practicas.php"
                            class="<?php echo $currentFile === 'emu8086-practicas.php' ? 'active' : ''; ?>">
                            Prácticas EMU8086
                        </a>

                        <a href="<?php echo $basePath; ?>practicas/arduino-practicas.php"
                            class="<?php echo $currentFile === 'arduino-practicas.php' ? 'active' : ''; ?>">
                            Prácticas Arduino
                        </a>
                    </div>
                </details>
            </li>

            <li class="student-session">
                <span class="student-carnet">
                    <?php echo htmlspecialchars($carnetEstudiante); ?>
                </span>

                <a href="<?php echo $basePath; ?>logout.php" class="logout-link">
                    Salir
                </a>
            </li>
        </ul>
    </nav>
</header>