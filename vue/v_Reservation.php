<!DOCTYPE html>
<html lang="fr" >
    <head>
        <meta charset="UTF-8">
        <title>Réservation</title>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'><link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/themes/dark.css">
    </head>

    <body>
        <div class="auth">
            <div class="auth__header">
                <div class="auth__logo">
                    <img height="90" src="./img/logo_pic.png" alt="">
                </div>
            </div>
            <div class="auth__body">
                <!-- Formulaire -->
                <form class="auth__form" autocomplete="off" method="post" action="./index.php?controleur=gestionReservation&action=effectuerReservation"> <!-- action -->
                    <div class="auth__form_body">
                        <h3 class="auth__form_title">Réserver</h3>
                        <div>
                            <div class="form-group">

                                <?php
                                $soireeDAO = new SoireeDAO($conn); // Connexion à la BD
                                $dates = $soireeDAO->getAllDates(); // sélection de toutes les dates des soirées
                                $libelles = $soireeDAO->getLibelles(); // sélection de tous les libellés des soirées

                                echo "<label class='text-uppercase small'>Description</label>";
                                echo "<select name='libelles' id='libelles' class='form-control' onchange='selectedOption()'>";

                                // On affiche le libellé de chaque soirée avec comme valeur correspondante leur date
                                for ($i = 0; $i <= count($libelles) - 1; $i++) {
                                    echo "<option value='" . $dates[$i]["date"] . "'>" . $libelles[$i]["libelle"] . "</option>";
                                }
                                echo "</select>";
                                ?>

                                <label class="text-uppercase small">Date</label>
                                <input type="text" class="form-control" placeholder="<?php echo $dates[0]["date"]; ?>" name="date" id="date" disabled>

                                <script>
                                    // Affiche la date correspondant à l'option choisie dans la liste déroulante
                                    function selectedOption() {
                                        var elt = document.getElementById("libelles").value;
                                        document.getElementById("date").value = elt;
                                    } 
                                </script>
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase small">Nom</label>
                                <input type="text" class="form-control" placeholder="Nom" name="nom">
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase small">Prénom</label>
                                <input type="text" class="form-control" placeholder="Prénom" name="prenom">
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase small">Téléphone</label>
                                <input type="text" class="form-control" placeholder="Numéro de téléphone" name="tel">
                            </div>
                        </div>
                    </div>
                    <div class="auth__form_actions">
                        <button class="btn btn-primary btn-lg btn-block" name="submitReservation">
                            Réserver
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
