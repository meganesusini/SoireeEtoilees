<!DOCTYPE html>
<html lang="fr" >
<head>
    <meta charset="UTF-8">
    <title>Mes réservation</title>
</head>

<body>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="d-flex justify-content-center">
        <ul class="list-group">
            <!-- Formulaire -->
            <form autocomplete="off" method="post" action="./index.php?controleur=c_gestionReservations&action=annulerReservation"> <!-- action -->
            
            <!-- On affiche les informations de la personne qui a réservé pour chaque soirée réservée -->
            <?php
            $reservations = $reservationDAO->getReservations($_SESSION['email']);
            foreach ($reservations as $value) {
                echo "<li class='list-group-item'> " . strtoupper($value['nom']) . " " . $value['prenom'] . " (num : " . $value['tel'] .
                    "), pour le " . Outils::reverseDate($value['date']) . "";

                echo "<button value='" . $value['idReservation'] . "' class='btn btn-danger float-end' name='idAnnulation'>Annuler</button>";

                echo "</li>";
            }
            ?>

            </form>
        </ul>
    </div>
</body>
</html>
