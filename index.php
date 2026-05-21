<?php
$pageTitle = "Inicio | Arquitectura de Máquinas";
$currentPage = "inicio";
require_once __DIR__ . "/includes/header.php";
require_once __DIR__ . "/includes/navbar.php";
?>

<main>
    <section class="hero">
        <div class="hero-content">
            <span class="badge">Proyecto Final AMC</span>
            <h1>Web Educativa de Arquitectura de Computadoras</h1>
            <p>
                Aprende los fundamentos de los microprocesadores, microcontroladores,
                programación en EMU8086 y simulación de Arduino con Tinkercad.
            </p>

            <div class="hero-actions">
                <a href="tutoriales/emu8086.php" class="btn btn-primary">Ver tutoriales de instalación</a>
                <a href="practicas/emu8086-practicas.php" class="btn btn-secondary">Ver prácticas</a>
            </div>
        </div>

        <div class="hero-card">
            <h3>Contenido principal</h3>
            <ul>
                <li>Arquitectura y organización de computadoras</li>
                <li>Microprocesadores y microcontroladores</li>
                <li>Arquitectura Von Neumann</li>
                <li>Programación en ensamblador</li>
                <li>Arduino y Tinkercad</li>
            </ul>
        </div>
    </section>

    <section class="section">
        <div class="section-header">
            <span class="badge">Unidades</span>
            <h2>Temario del proyecto</h2>
            <p>
                El proyecto está dividido en cinco unidades principales, integrando teoría,
                ejemplos y prácticas.
            </p>
        </div>

        <div class="cards-grid">
            <article class="card">
                <h3>Unidad I</h3>
                <p>Introducción a los microprocesadores y microcontroladores.</p>
                <a href="pages/unidad1.php">Ver unidad</a>
            </article>

            <article class="card">
                <h3>Unidad II</h3>
                <p>Arquitectura del microprocesador y conexión con dispositivos.</p>
                <a href="pages/unidad2.php">Ver unidad</a>
            </article>

            <article class="card">
                <h3>Unidad III</h3>
                <p>Programación del microprocesador usando lenguaje ensamblador.</p>
                <a href="pages/unidad3.php">Ver unidad</a>
            </article>

            <article class="card">
                <h3>Unidad IV</h3>
                <p>Arquitectura de los microcontroladores y tipos principales.</p>
                <a href="pages/unidad4.php">Ver unidad</a>
            </article>

            <article class="card">
                <h3>Unidad V</h3>
                <p>Programación de microcontroladores con Arduino y Tinkercad.</p>
                <a href="pages/unidad5.php">Ver unidad</a>
            </article>
        </div>
    </section>

    <section class="section section-alt">
        <div class="section-header">
            <span class="badge">Práctica</span>
            <h2>Tutoriales obligatorios</h2>
            <p>
                Se incluyen guías paso a paso para instalar y usar EMU8086,
                además de una introducción práctica a Arduino con Tinkercad.
            </p>
        </div>

        <div class="cards-grid two-columns">
            <article class="card featured-card">
                <h3>Tutorial de EMU8086</h3>
                <p>
                    Aprende a descargar, instalar y utilizar EMU8086 para ejecutar
                    programas básicos en lenguaje ensamblador.
                </p>
                <a href="tutoriales/emu8086.php" class="btn btn-primary">Abrir tutorial</a>
            </article>

            <article class="card featured-card">
                <h3>Tutorial de Arduino</h3>
                <p>
                    Aprende a usar Tinkercad Circuits para simular proyectos con
                    Arduino UNO, LEDs, botones y código básico.
                </p>
                <a href="tutoriales/arduino-tinkercad.php" class="btn btn-primary">Abrir tutorial</a>
            </article>
        </div>
    </section>
</main>

<?php require_once __DIR__ . "/includes/footer.php"; ?>w