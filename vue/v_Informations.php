<!DOCTYPE html>
<html lang="fr" >
    <head>
        <meta charset="UTF-8">
        <title>Mes Informations</title>
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
                <form class="auth__form" autocomplete="off" method="post" action="./index.php?controleur=c_gestionComptes&action=changerInformations"> <!-- action -->
                    <div class="auth__form_body">
                        <h3 class="auth__form_title">Mes informations</h3>

                        <?php
                        // Start - Loading data
                        $dao = new ClientDAO(ConnexionBdPdo::getConnexion());
                        $email = $dao->getEmailFromEmail($_SESSION['email']);
                        $nom = $dao->getNomFromEmail($_SESSION['email']);
                        $prenom = $dao->getPrenomFromEmail($_SESSION['email']);
                        $tel = $dao->getTelFromEmail($_SESSION['email']);
                        // End - Loading data

                        ?>
                        <div>
                            <div class="form-group">
                                <label class="text-uppercase small" for="email">E-mail</label>
                                <input type="text" class="form-control" placeholder="" name="email" id="email" value="<?php echo $email; ?>">
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase small" for="prenom">Prénom</label>
                                <input type="text" class="form-control" placeholder="Prénom" name="prenom" value="<?php echo $prenom; ?>">
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase small" for="nom">Nom</label>
                                <input type="text" class="form-control" placeholder="Nom" name="nom" value="<?php echo $nom; ?>">
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase small" for="tel">Téléphone</label>
                                <input type="text" class="form-control" placeholder="Numéro de téléphone" name="tel" value="<?php echo $tel; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="auth__form_actions">
                        <button class="btn btn-primary btn-lg btn-block" name="submitReservation">
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
