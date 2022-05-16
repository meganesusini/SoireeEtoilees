<?php

if(!isset($_GET['action']))
    $action = 'consulterLesSoiree';
else
    $action = $_GET['action'];

$conn = ConnexionBdPdo::getConnexion();
include("modele/SoireeDAO.php");
include("modele/Outils.php");

switch($action){

    // On affiche la page de consultation des soirées
	case 'consulterLesSoiree':
		$soireeDAO = new SoireeDAO($conn);
		$lesSoiree = $soireeDAO->getLesSoirees();

		include("vue/v_Soirees.php");
		break;
		
    // On affiche la page de gestion des soirées
	case 'gererLesSoiree':
        $soireeDAO = new SoireeDAO($conn);
        $lesSoiree = $soireeDAO->getLesSoirees();

		include("vue/v_GestionSoirees.php");
		break;

    // On ajoute une nouvelle soirée
	case 'ajouterUneSoiree':
		$soireeDAO = new SoireeDAO($conn); // Connexion à la BD
		$nvId = $soireeDAO->getBiggestId() + 1; // nv id
        
        // Si tous les champs sont remplis, on ajoute une nouvelle soirée
        if (!empty($_POST['date'])
                && !empty($_POST['nbPlaces'])
                && !empty($_POST['libelle'])
                && Outils::isDigits($_POST['nbPlaces'], 1, 1000)) {

            $laSoiree = new Soiree($nvId, $_POST['date'], $_POST['nbPlaces'], $_POST['libelle']);
            $soireeDAO->ajouterSoiree($laSoiree);

            echo "<script>document.getElementById('errorMessage').className = 'navbar-brand'</script>";
            echo "<script>document.getElementById('errorMessage').style.color = '#00FF00'</script>";
            echo "<script>document.getElementById('errorMessage').innerText = 'La soirée a été ajoutée !'</script>";

        } 
        // Si un ou plusieurs champs ne sont pas remplis : message d'erreur
        else {
            echo "<script>document.getElementById('errorMessage').className = 'navbar-brand'</script>";
            echo "<script>document.getElementById('errorMessage').style.color = '#FF0000'</script>";
            echo "<script>document.getElementById('errorMessage').innerText = 'Certains champs ne sont pas valides !'</script>";
        }
		break;

    // On affiche la page d'ajout de soirée
    case 'afficherAjouterUneSoiree':
        include("vue/v_AjouterSoiree.php");
        break;

    // On affiche la page de modification d'une soirée
    case 'afficherModifierUneSoiree':
        include("vue/v_ModifierSoiree.php");
        break;

    // On affiche la page de suppression d'une soirée
    case 'afficherSupprimerUneSoiree':
        include './vue/v_SupprimerSoiree.php';
        break;

    // On supprimme une soirée
    case 'supprimerUneSoiree':

        if (!empty($_POST['libelles'])) {

            $soireeDAO = new SoireeDAO($conn); // Connexion à la BD
            $soireeDAO->supprimerSoiree($_POST['libelles']);

            echo "<script>document.getElementById('errorMessage').className = 'navbar-brand'</script>";
            echo "<script>document.getElementById('errorMessage').style.color = '#00FF00'</script>";
            echo "<script>document.getElementById('errorMessage').innerText = 'La soirée a bien été supprimée !'</script>";
        }
        break;

    // On modifie une soirée
    case 'modifierSoiree':

        if (!empty($_POST['nvLibelle'])
                && !empty($_POST['date'])
                && !empty($_POST['nvNbPlaces'])) {

                    $soireeDAO = new SoireeDAO($conn); // Connexion à la BD
                    $id = $_POST['idSoiree'];

                    $soireeDAO->modifierSoiree($id, $_POST['date'], $_POST['nvLibelle'], $_POST['nvNbPlaces']);


            echo "<script>document.getElementById('errorMessage').className = 'navbar-brand'</script>";
            echo "<script>document.getElementById('errorMessage').style.color = '#00FF00'</script>";
            echo "<script>document.getElementById('errorMessage').innerText = 'La soirée a bien été modifiée !'</script>";
        }
        break;
}

