<!DOCTYPE html>
<html lang="fr" >
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'><link rel="stylesheet" href="../css/style.css">
</head>

<body>
<div class="auth">
    <div class="auth__header">
        <div class="auth__logo">
            <img height="90" src="./img/logo_pic.png" alt="">
        </div>
    </div>
    <div class="auth__body">
        <!-- formulaire -->
        <form class="auth__form" autocomplete="off" method="post" action="./index.php?controleur=c_gestionComptes&action=creerUnCompte"> <!-- action -->
            <div class="auth__form_body">
                <h3 class="auth__form_title">S'inscrire</h3>
                <div>
                    <div class="form-group">
                        <label class="text-uppercase small">E-mail</label>
                        <input type="email" class="form-control" placeholder="Adresse e-mail" name="email" value="<?php if (!empty($_POST['email'])) echo $_POST['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="text-uppercase small">Prénom</label>
                        <input type="text" class="form-control" placeholder="Prénom" name="prenom" value="<?php if (!empty($_POST['prenom'])) echo $_POST['prenom'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="text-uppercase small">Nom</label>
                        <input type="text" class="form-control" placeholder="Nom" name="nom" value="<?php if (!empty($_POST['nom'])) echo $_POST['nom'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="text-uppercase small">Téléphone</label>
                        <input type="text" class="form-control" placeholder="Numéro de téléphone" name="tel" value="<?php if (!empty($_POST['tel'])) echo $_POST['tel'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="text-uppercase small">Mot de passe</label>
                        <input type="password" class="form-control" placeholder="Mot de passe" name="password">
                    </div>
                    <div class="form-group">
                        <label class="text-uppercase small">Confirmation Mot de passe</label>
                        <input type="password" class="form-control" placeholder="Confirmer le mot de passe" name="confirmPassword">
                    </div>
                </div>
            </div>
            <div class="auth__form_actions">
                <button class="btn btn-primary btn-lg btn-block">
                    Inscription
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
