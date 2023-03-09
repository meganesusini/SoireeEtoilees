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
                <!-- Formulaire  -->
                <form class="auth__form" autocomplete="off" method="post" action="./index.php?controleur=gestionPrestataire&action=enregistrerPresta"> <!-- action -->
                    <div class="auth__form_body">
                        <h3 class="auth__form_title">Ajouter un prestataire</h3>
                        <div>
                            <div class="form-group">
                                <label class="text-uppercase small">Nom</label>
                                <input type="text" class="form-control" placeholder="" name="nom" id="nom">
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase small">Adresse</label>
                                <input type="text" class="form-control" placeholder="" name="adresse">
                            </div>
                            <div class="form-group">
                                <?php

                                $conn = ConnexionBdPdo::getConnexion();
                                $prestaDAO = new PrestataireDAO($conn);
                                $types = $prestaDAO->getLesTypesPresta();
                                $libelles = $soireeDAO->getLibelles();
                                $places = $soireeDAO->getAllPlaces();
                                $ids = $soireeDAO->getAllIds();

                                echo "<label class='text-uppercase small'>Sélectionner le type</label>";
                                echo "<select name='types' id='types' class='form-control'>";

                                for ($i = 0; $i <= count($types) - 1; $i++) {
                                    echo "<option value='" . $i . "'>" . $types[$i]["libelle"] . "</option>";
                                   
                                }

                                echo "</select>";

                                ?>

                            </div>
                        </div>
                    </div>
                    <div class="auth__form_actions">
                        <button class="btn btn-primary btn-lg btn-block" name="submitAjouter">
                            Ajouter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
