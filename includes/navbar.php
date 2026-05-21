<?php
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

$isTutorialesActive = str_contains($_SERVER["PHP_SELF"], "/tutoriales/");
$isPracticasActive = str_contains($_SERVER["PHP_SELF"], "/practicas/");
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

            <li>
                <a href="<?php echo $basePath; ?>pages/unidad1.php"
                    class="<?php echo $currentPage === 'unidad1' ? 'active' : ''; ?>">
                    Unidad I
                </a>
            </li>

            <li>
                <a href="<?php echo $basePath; ?>pages/unidad2.php"
                    class="<?php echo $currentPage === 'unidad2' ? 'active' : ''; ?>">
                    Unidad II
                </a>
            </li>

            <li>
                <a href="<?php echo $basePath; ?>pages/unidad3.php"
                    class="<?php echo $currentPage === 'unidad3' ? 'active' : ''; ?>">
                    Unidad III
                </a>
            </li>

            <li>
                <a href="<?php echo $basePath; ?>pages/unidad4.php"
                    class="<?php echo $currentPage === 'unidad4' ? 'active' : ''; ?>">
                    Unidad IV
                </a>
            </li>

            <li>
                <a href="<?php echo $basePath; ?>pages/unidad5.php"
                    class="<?php echo $currentPage === 'unidad5' ? 'active' : ''; ?>">
                    Unidad V
                </a>
            </li>

            <li class="nav-dropdown">
                <details class="dropdown-details" <?php echo $isTutorialesActive ? 'open' : ''; ?>>
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
                <details class="dropdown-details" <?php echo $isPracticasActive ? 'open' : ''; ?>>
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
        </ul>
    </nav>
</header>