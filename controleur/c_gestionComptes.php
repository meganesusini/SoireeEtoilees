<?php

    $action = "";
    if (!empty($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = "";
    }

    include "./modele/Outils.php";

    $conn = ConnexionBdPdo::getConnexion();

    switch($action) {
        // On affiche la page d'inscription
        case "afficherInscription":
            include './vue/v_Inscription.php';
            break;

        // On affiche la page de connexion
        case 'afficherConnexion':
            include './vue/v_Connexion.php';
            break;

        // On vérifie si les identifiants saisis par l'utilisateur lors de la connexion sont bons
        case 'seConnecter':
            // Si l'e-mail et le mdp sont saisis
            if (!empty($_POST['email'])
                && !empty($_POST['password'])) {
                    

                $nvClientDAO = new ClientDAO($conn); // Connexion à la BD
                // Si l'e-mail et le mdp correspondent la personne est connectée
                if ($nvClientDAO->login($_POST['email'], $_POST['password'])) {

                    $_SESSION['loggedin'] = true; // confirme que l'utilisateur est bien connecté
                    $_SESSION['email'] = $_POST['email'];

                    echo "<script>document.getElementById('errorMessage').className = 'navbar-brand'</script>";
                    echo "<script>document.getElementById('errorMessage').style.color = '#00FF00'</script>";
                    echo "<script>document.getElementById('errorMessage').innerText = 'Vous êtes bien connecté !'</script>";

                // Sinon : message d'erreur & retour à la page de connexion
                } else {
                    echo "<script>document.getElementById('errorMessage').className = 'navbar-brand'</script>";
                    echo "<script>document.getElementById('errorMessage').style.color = '#FF0000'</script>";
                    echo "<script>document.getElementById('errorMessage').innerText = 'Certains champs de sont pas valides'</script>";

                }

            } 
            // Si au moins un des champs n'est pas saisi : message d'erreur & retour la page de connexion
            else {
                echo "<script>document.getElementById('errorMessage').className = 'navbar-brand'</script>";
                echo "<script>document.getElementById('errorMessage').style.color = '#FF0000'</script>";
                echo "<script>document.getElementById('errorMessage').innerText = 'Certains champs ne sont pas valides !'</script>";

                
            }
            include './vue/v_Connexion.php';
            break;

        // On ajoute un nouveau compte
        case "creerUnCompte":
            // Si tous les champs du formulaire sont remplis
            if ((!empty($_POST['nom'])
                && !empty($_POST['prenom'])
                && !empty($_POST['email'])
                && !empty($_POST['tel'])
                && !empty($_POST['confirmPassword'])
                && !empty($_POST['password']))
                && (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
                && Outils::isDigits($_POST['tel'], 10, 10) == true
                && $_POST['confirmPassword'] == $_POST['password'])) {
                    
                // On hâche le mdp
                $pwd = password_hash($_POST['password'], PASSWORD_DEFAULT);
                // On créé un nouvel utilisateur
                $nvClient = new Client($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['tel'], 1, $pwd);
                // Connexion à la BD
                $nvClientDAO = new ClientDAO($conn);

                // Si l'e-mail n'existe pas déjà dans la BD
                if ($nvClientDAO->verifEmail($nvClient)[0]["nb"] == 0) {
                    
                    // On vérifie si la longueur du mdp est sup à 8
                    if (strlen($_POST['confirmPassword']) > 8) {
                        
                        $nvClientDAO->ajouterClient($nvClient);
                        echo "<script>document.getElementById('errorMessage').className = 'navbar-brand'</script>";
                        echo "<script>document.getElementById('errorMessage').style.color = '#00FF00'</script>";
                        echo "<script>document.getElementById('errorMessage').innerText = 'Inscription effectuée !'</script>";

                    } else {
                        echo "<script>document.getElementById('errorMessage').className = 'navbar-brand'</script>";
                        echo "<script>document.getElementById('errorMessage').style.color = '#FF0000'</script>";
                        echo "<script>document.getElementById('errorMessage').innerText = 'Le mot de passe est trop court !'</script>";
                    }

                } 
                // Si l'e-mail existe déjà : message d'erreur
                else {
                    echo "<script>document.getElementById('errorMessage').className = 'navbar-brand'</script>";
                    echo "<script>document.getElementById('errorMessage').style.color = '#FF0000'</script>";
                    echo "<script>document.getElementById('errorMessage').innerText = 'Cet e-mail existe deja !'</script>";
                }

            }
            // Si un ou plusieurs champs ne sont pas remplis : message d'erreur
            else {
                echo "<script>document.getElementById('errorMessage').className = 'navbar-brand'</script>";
                echo "<script>document.getElementById('errorMessage').style.color = '#FF0000'</script>";
                echo "<script>document.getElementById('errorMessage').innerText = 'Certains champs ne sont pas valides !'</script>";

                
            }
            include './vue/v_Inscription.php';
            break;

        // On déconnecte l'utilisateur
        case 'seDeconnecter':
            session_destroy();
            echo "<script>window.location.replace('./index.php')</script>";
            break;

        // On affiche la page des informations
        case 'mesInformations':
            include './vue/v_Informations.php';
            break;

        // On change les informations de l'utilisateur
        case 'changerInformations':
            // Connexion à la BD
            $dao = new ClientDAO(ConnexionBdPdo::getConnexion());

            // Si tous  les champs sont remplis
            if (!empty($_POST['email'])
                && !empty($_POST['nom'])
                && !empty($_POST['prenom'])
                && !empty($_POST['tel'])
                && !empty($_POST['email'])
                && (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
                && Outils::isDigits($_POST['tel'], 10, 10) == true)) 
                {
                // On modifie les informations
                $dao->changeInformations($_SESSION['email'], $_POST['nom'], $_POST['prenom'], $_POST['tel'], $_POST['email']);
                $_SESSION['email'] = $_POST['email'];

                include './vue/v_Informations.php';
                // Message de confirmation
                echo "<script>document.getElementById('errorMessage').className = 'navbar-brand'</script>";
                echo "<script>document.getElementById('errorMessage').style.color = '#00FF00'</script>";
                echo "<script>document.getElementById('errorMessage').innerText = 'Les modifications ont étaient effectués !'</script>";

            } 
            // Si un ou plusieurs champs ne sont pas remplis : message d'erreur
            else {
                include './vue/v_Informations.php';

                echo "<script>document.getElementById('errorMessage').className = 'navbar-brand'</script>";
                echo "<script>document.getElementById('errorMessage').style.color = '#FF0000'</script>";
                echo "<script>document.getElementById('errorMessage').innerText = 'Certains champs ne sont pas valides !'</script>";
            }
            break;
    }
?>