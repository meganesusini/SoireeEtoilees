<!DOCTYPE html>
<html lang="fr" >
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
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
        <!-- Méthode POST -->
        <form class="auth__form" autocomplete="off" method="post" action="./index.php?controleur=gestionCompte&action=seConnecter">
            <div class="auth__form_body">
                <h3 class="auth__form_title">Se connecter</h3>
                <div>
                    <div class="form-group">
                        <label class="text-uppercase small">E-mail</label>
                        <input type="email" class="form-control" placeholder="Adresse e-mail" name="email" value="<?php if (!empty($_POST['email'])) echo $_POST['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="text-uppercase small">Mot de passe</label>
                        <input type="password" class="form-control" placeholder="Mot de passe" name="password">
                    </div>
                </div>
            </div>
            <div class="auth__form_actions">
                <button class="btn btn-primary btn-lg btn-block">
                    Connexion
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
