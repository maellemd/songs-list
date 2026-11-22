
const cartes = document.querySelectorAll(".carte-single");

cartes.forEach((carte) => {
    const bouton = carte.querySelector(".bouton-lecture");
    const audio = carte.querySelector("audio");

    if (!bouton || !audio) {
        return;
    }

    const titre = carte.querySelector("h2").textContent;

    function changerBouton(lecture) {
        bouton.textContent = lecture ? "⏸ Pause" : "▶ Écouter";
        bouton.setAttribute("aria-pressed", String(lecture));
        bouton.setAttribute(
            "aria-label",
            lecture ? `Mettre en pause ${titre}` : `Écouter ${titre}`
        );
    }

    bouton.addEventListener("click", async () => {
        if (!audio.paused) {
            audio.pause();
            return;
        }

        // Arrêter les autres morceaux.
        document.querySelectorAll("audio").forEach((autre) => {
            if (autre !== audio) {
                autre.pause();
                autre.currentTime = 0;
            }
        });

        bouton.textContent = "Chargement...";
        bouton.disabled = true;

        try {
            await audio.play();
            changerBouton(true);
        } catch (erreur) {
            bouton.textContent = "Lecture impossible";
            bouton.setAttribute("aria-pressed", "false");
            console.error(erreur);
        } finally {
            bouton.disabled = false;
        }
    });

    audio.addEventListener("pause", () => {
        changerBouton(false);
    });

    audio.addEventListener("ended", () => {
        changerBouton(false);
    });

    audio.addEventListener("error", () => {
        bouton.textContent = "Audio indisponible";
        bouton.disabled = true;
        bouton.setAttribute("aria-pressed", "false");
    });
});
