(function () {
    const MIN_SCORE_TO_PASS = 7;
    const QUIZ_KEY_PREFIX = "quiz_score_";

    const quizNames = {
        unidad1Quiz: "Unidad I",
        unidad2Quiz: "Unidad II",
        unidad3Quiz: "Unidad III",
        unidad4Quiz: "Unidad IV",
        unidad5Quiz: "Unidad V"
    };

    async function enviarProgreso(quizId, score) {
        if (!quizNames[quizId]) {
            return;
        }

        const numericScore = Number(score);

        if (!Number.isFinite(numericScore)) {
            return;
        }

        try {
            await fetch(getApiProgressPath(), {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    quizId: quizId,
                    score: numericScore
                })
            });
        } catch (error) {
            console.warn("No se pudo guardar el progreso en JSON.", error);
        }
    }

    async function cargarProgresoServidor() {
        try {
            const response = await fetch(getApiProgressPath(), {
                method: "GET"
            });

            if (!response.ok) {
                return;
            }

            const data = await response.json();

            if (!data.ok || !data.estudiante || !data.estudiante.puntajes) {
                return;
            }

            Object.entries(data.estudiante.puntajes).forEach(function ([quizId, score]) {
                localStorage.setItem(`${QUIZ_KEY_PREFIX}${quizId}`, String(score));
            });

            if (typeof updateLockedNextUnits === "function") {
                updateLockedNextUnits();
            }
        } catch (error) {
            console.warn("No se pudo cargar el progreso desde JSON.", error);
        }
    }

    function sincronizarLocalStorageConServidor() {
        Object.keys(quizNames).forEach(function (quizId) {
            const savedScore = Number(localStorage.getItem(`${QUIZ_KEY_PREFIX}${quizId}`) || 0);

            if (savedScore >= MIN_SCORE_TO_PASS) {
                enviarProgreso(quizId, savedScore);
            }
        });
    }

    function getApiProgressPath() {
        const path = window.location.pathname;

        if (
            path.includes("/pages/") ||
            path.includes("/tutoriales/") ||
            path.includes("/practicas/")
        ) {
            return "../api/progreso.php";
        }

        return "api/progreso.php";
    }

    const originalSetItem = localStorage.setItem.bind(localStorage);

    localStorage.setItem = function (key, value) {
        originalSetItem(key, value);

        if (!key.startsWith(QUIZ_KEY_PREFIX)) {
            return;
        }

        const quizId = key.replace(QUIZ_KEY_PREFIX, "");
        const score = Number(value);

        enviarProgreso(quizId, score);
    };

    cargarProgresoServidor();

    setTimeout(function () {
        sincronizarLocalStorageConServidor();
    }, 300);
})();