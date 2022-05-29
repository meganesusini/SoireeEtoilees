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
                <form class="auth__form" autocomplete="off" method="post" action="./index.php?controleur=gestionSoiree&action=modifierSoiree"> <!-- action -->
                    <div class="auth__form_body">
                        <h3 class="auth__form_title">Modifier une soirée</h3>
                        <div>
                            <div class="form-group">

                                <?php

                                $conn = ConnexionBdPdo::getConnexion();
                                $soireeDAO = new SoireeDAO($conn);
                                $dates = $soireeDAO->getAllDates();
                                $libelles = $soireeDAO->getLibelles();
                                $places = $soireeDAO->getAllPlaces();
                                $ids = $soireeDAO->getAllIds();

                                echo "<label class='text-uppercase small'>Sélectionner la soirée</label>";
                                echo "<select name='libelles' id='libelles' class='form-control' onchange='selectedOption(this)'>";

                                for ($i = 0; $i <= count($libelles) - 1; $i++) {
                                    echo "<option value='" . $dates[$i]["date"] . "'>" . $libelles[$i]["libelle"] . "</option>";
                                    echo "<option value='" . $ids[$i]["idSoiree"] . "' hidden>" . $places[$i]["nbPlaceRestante"] .  "</option>"; // option cachée
                                    echo "<option value='" . $ids[$i]["idSoiree"] . "' hidden>" . $ids[$i]["idSoiree"] .  "</option>"; // option cachée
                                }

                                echo "</select>";

                                ?>

                                <br>

                                <label class="text-uppercase small">Date</label>
                                <input type="text" class="form-control" value="<?php echo $dates[0]["date"]; ?>" name="date" id="date">
                                                          
                            </div>
                            <!-- div caché -->
                            <div class="form-group" hidden>
                                <label class="text-uppercase small">idSoirée</label>
                                <input type="text" class="form-control" placeholder="" name="idSoiree" id="idSoiree">
                            </div>
                            <!--  -->
                            <div class="form-group">
                                <label class="text-uppercase small">Libellé</label>
                                <input type="text" class="form-control" value="<?php echo $libelles[0]["libelle"] ?>" name="nvLibelle" id="nvLibelle">
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase small">Nombre de places restantes</label>
                                <input type="text" class="form-control" value="<?php echo $places[0]["nbPlaceRestante"] ?>" name="nvNbPlaces" id="nvNbPlaces">
                            </div>
                        </div>
                    </div>
                    <div class="auth__form_actions">
                        <button class="btn btn-primary btn-lg btn-block" name="modifySoiree">
                            Modifier
                        </button>
                    </div>
                    <script>
                        // Affiche les critères correspondants à l'option choisie dans la liste déroulante
                        function selectedOption(sel) {
                            // Affichage de la date
                            var dateSoireeSelectionnee = document.getElementById("libelles").value; 
                            document.getElementById("date").value = dateSoireeSelectionnee;

                            // Affichage du libellé
                            var libelleSoireeSelectionnee = sel.options[sel.selectedIndex].text;
                            document.getElementById("nvLibelle").value = libelleSoireeSelectionnee;
                            
                            // Affichage du nombre de places restantes
                            var placesSoireeSelectionnee = sel.options[sel.selectedIndex+1].text;                           
                            document.getElementById("nvNbPlaces").value = placesSoireeSelectionnee;

                            // Affichage de l'id
                            var idSoireeSelectionnee = sel.options[sel.selectedIndex+2].text;                           
                            document.getElementById("idSoiree").value = idSoireeSelectionnee;
                        } 
                    </script>
                </form>
            </div>
        </div>
    </body>
</html>
