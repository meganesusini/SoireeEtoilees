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
                <form class="auth__form" autocomplete="off" method="post" action="./index.php?controleur=gestionSoiree&action=ajouterUneSoiree"> <!-- action -->
                    <div class="auth__form_body">
                        <h3 class="auth__form_title">Ajouter une soirée</h3>
                        <div>
                            <div class="form-group">
                                <label class="text-uppercase small">Date</label>
                                <input type="text" class="form-control" placeholder="" name="date" id="date">
                                <p style="font-size:12px;">Format aaaa-mm-jj</p>
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase small">libellé</label>
                                <input type="text" class="form-control" placeholder="" name="libelle">
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase small">Nombre de places restantes</label>
                                <input type="text" class="form-control" placeholder="" name="nbPlaces">
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
