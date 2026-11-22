
<?php
require_once "singles.php";

function e($texte) {
    return htmlspecialchars(
        (string) $texte,
        ENT_QUOTES | ENT_SUBSTITUTE,
        "UTF-8"
    );
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La musique dans la peau</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
</head>

<body>

    <main>
        <h1>La musique dans la peau</h1>

        <section class="grille-singles" aria-label="Sélection musicale">

            <?php foreach ($singles as $single): ?>
                <?php
                $audio = $single["audio"] ?? "";
                $disponible = $audio &&
                    is_file(__DIR__ . "/" . $audio);
                ?>

                <article class="carte-single">

                    <div class="pochette">
                        <img
                            src="<?= e($single["jacquette"]) ?>"
                            alt="Portrait de <?= e($single["titre_artiste"]) ?>"
                            loading="lazy"
                        >

                        <?php if ($disponible): ?>
                            <button
                                class="bouton-lecture"
                                type="button"
                                aria-label="Écouter <?= e($single["titre_album"]) ?>"
                                aria-pressed="false"
                            >
                                ▶ Écouter
                            </button>

                            <audio preload="none"
                                src="<?= e($audio) ?>"></audio>
                        <?php else: ?>
                            <span class="indisponible">
                                Audio indisponible
                            </span>
                        <?php endif; ?>
                    </div>

                    <h2><?= e($single["titre_album"]) ?></h2>

                    <p><?= e($single["titre_artiste"]) ?></p>
                    <p><?= e($single["annee_distribution"]) ?>
                        — <?= e($single["style"]) ?></p>

                </article>

            <?php endforeach; ?>

        </section>

        <footer>

            <details>
                <summary>Crédits musicaux et licences</summary>

                <ul>
                    <li>
                        Für Elise - Beethoven, V. Gao (CC0).
                        <a href="https://commons.wikimedia.org/wiki/File:FurElise.ogg">
                            Source
                        </a>
                    </li>

                    <li>
                        The Entertainer - Scott Joplin,
                        James Brigham (CC0).
                        <a href="https://commons.wikimedia.org/wiki/File:%22The_Entertainer%22_(1902),_by_Scott_Joplin.mp3">
                            Source
                        </a>
                    </li>

                    <li>
                        Clair de lune - Debussy,
                        Laurens Goedhart (CC BY 3.0).
                        <a href="https://commons.wikimedia.org/wiki/File:Clair_de_lune_(Claude_Debussy)_Suite_bergamasque.ogg">
                            Source
                        </a>
                    </li>

                    <li>
                        Habanera - Bizet,
                        arrangement Kevin MacLeod (CC BY 3.0).
                        <a href="https://commons.wikimedia.org/wiki/File:Kevin_MacLeod_-_Georges_Bizet_Habanera.ogg">
                            Source
                        </a>
                    </li>
                </ul>
                <p>
                    <a href="https://creativecommons.org/licenses/by/3.0/">
                        Licence Creative Commons BY 3.0
                    </a>
                </p>
            </details>
        </footer>
    </main>

</body>
</html>
