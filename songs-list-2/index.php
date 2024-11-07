<?php include "./singles.php"; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Songs list</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>La musique dans la peau</h1>
    <section class="grille-singles">
        <div class="carte-single"
            <?php
            if (!empty($singles)) {
                foreach ($singles as $single) {
                    echo '<div class="carte-single" >';
                    echo '<img src="' . $single['jacquette'] . '" alt="Image de la jacquette" class="jacquette">';
                    echo '<h2>' . $single['titre_album'] . '</h2>';
                    echo '<p>' . $single['titre_artiste'] . '</p>';
                    echo '<p>' . $single['annee_distribution'] . '</p>';
                    echo '<p>' . $single['style'] . '</p>';
                    echo '<audio src="' . $single['audio'] . '" ></audio>'; 
                    echo '</div>';
                }
            } else {
                echo '<p>Aucune musique trouvée.</p>';
            }
            ?>
            </div>
    </section>
    <script src="script.js"></script>
</body>

</html>