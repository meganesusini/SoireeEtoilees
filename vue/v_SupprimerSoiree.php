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
                <form class="auth__form" autocomplete="off" method="post" action="./index.php?controleur=c_gestionSoirees&action=supprimerUneSoiree"> <!-- action -->
                    <div class="auth__form_body">
                        <h3 class="auth__form_title">Supprimer une soirée</h3>
                        <div>
                            <div class="form-group">

                            </div>
                            <div class="form-group">

                                <?php

                                $conn = ConnexionBdPdo::getConnexion();

                                $soireeDAO = new SoireeDAO($conn);
                                $dates = $soireeDAO->getAllDates();
                                $libelles = $soireeDAO->getLibelles();

                                echo "<label class='text-uppercase small'>Libellé</label>";
                                echo "<select name='libelles' id='libelles' class='form-control' onchange='changeCalendar()'>";

                                for ($i = 0; $i <= count($libelles) - 1; $i++) {
                                    echo "<option value='" . $dates[$i]["date"] . "'>" . $libelles[$i]["libelle"] . "</option>";
                                }
                                echo "</select>";


                                

                                    ?>

                        <p class="row span6">
                            </p>

                            </div>
                        </div>
                    </div>
                    <div class="auth__form_actions">
                        <button class="btn btn-primary btn-lg btn-block" name="submitSupprimer">
                            Supprimer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
