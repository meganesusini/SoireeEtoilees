<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Soirées pic du midi</title>
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/home.css">
    </head>
    <body>
        <
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Material icons cdn -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,600,700,800,900&display=swap" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <link rel="stylesheet" href="css/page-etb.css">
        <!-- <link rel="stylesheet" href="https://www.ecomclips.com/wp-content/themes/seowp/page-etb.css"> -->
        <title>Soirées pic du midi.</title>
    </head>

    <body>
        <!-- Navbar -->
        <section class="nav">
            <nav class="navbar navbar-expand-lg navbar-dark bg-none fixed-top" style="background-image: linear-gradient(#3280e4, #584dc3);">
                <div class="container navbarColor">
                    <a class="navbar-brand" href="#">Soirées étoilées Pic du Midi</a> <!--- logo --->
                    

                    <!-- Configuration des ONGLETS -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">

                        <!-- Code qui vérifie si la personne est un admin -->
                        <?php
                            include "./modele/ConnexionBdPdo.php";
                            include "./modele/ClientDAO.php";

                            // Connexion à la BD
                            $conn = ConnexionBdPdo::getConnexion(); 
                            $clientDAO = new ClientDAO($conn);

                            // Si la personne a saisi un e-mail, on vérifie c'est un admin
                            if (!empty($_SESSION['email'])) {
                                $isAdmin = $clientDAO->isAdmin($_SESSION['email']); 

                                if ($isAdmin) {
                                    echo "<li class='nav-item dropdown'>";
                                    echo "<a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                Admin</a>";

                                    echo "<div class='dropdown-menu' aria-labelledby='navbarDropdown'>";
                                    echo "<a class='dropdown-item' href='./index.php?controleur=gestionSoiree&action=gererLesSoiree'>Gérer les soirées</a>";

                                    echo "</div></li>";
                                }
                            }
                        ?>

                            <!-- Onglet SOIREES - Consulter les soirées -->
                           <li class="nav-item">
                                <a class="nav-link" href="./index.php?controleur=gestionSoiree&action=consulterLesSoiree">Soirées</a> 
                           </li>

                           <!-- Onglet RESERVER - Réserver pour une soirée [formulaire] -->
                            <li class="nav-item">
                                <a class="nav-link" href="./index.php?controleur=gestionReservation&action=afficherFormReservation">Réserver</a> 
                            </li>

                            <!-- Onglet MON COMPTE -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Mon compte
                                </a>

                                <!-- Configuration des SOUS-ONGLETS -->
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php
                                    // Sous-onglets personnes connectées
                                    //Si la personne est connectée, on accède aux sous-onglets "Mes informations" et "Mes réservations"
                                    if (isset($_SESSION['loggedin'])) {
                                        echo '<a class="dropdown-item" href="./index.php?controleur=gestionCompte&action=mesInformations">Mes informations</a>';
                                        echo '<a class="dropdown-item" href="./index.php?controleur=gestionReservation&action=mesReservations">Mes réservations</a>';
                                    } else {
                                    // Sous-onglets personnes non-connectées
                                    //Si la personne n'est pas connectée, on accède aux sous-onglets "Se connecter" et "S'inscrire"
                                        echo '<a class="dropdown-item" href="./index.php?controleur=gestionCompte&action=afficherConnexion">Se connecter</a>';
                                        echo '<a class="dropdown-item" href="./index.php?controleur=gestionCompte&action=afficherInscription">S\'inscrire</a>';
                                    }
                                    ?>

                                    <?php
                                    //Si la personne est connectée, on voit l'onglet "Se déconnecter" -->
                                    if (isset($_SESSION['loggedin'])) {
                                        echo '<a class="dropdown-item" href="./index.php?controleur=gestionCompte&action=seDeconnecter">Se déconnecter</a>';
                                    }
                                    ?>
                                </div>
                            </li>
                    </div>
                </div>
            </nav>
        </section>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <?php
        if(!isset($_GET['controleur']))
            $controleur = 'gestionCompte';
        else
        $controleur = $_GET['controleur'];

        switch ($controleur) 
        {
            case "gestionCompte":
                include './controleur/gestionCompte.php';
                break;

            case "gestionReservation":
                include './controleur/gestionReservation.php';
                break;

            case "gestionSoiree":
                include './controleur/gestionSoiree.php';
                break;
        }
        ?>
 
</html>
