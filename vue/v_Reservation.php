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
                <form class="auth__form" autocomplete="off" method="post" action="./index.php?controleur=c_gestionReservations&action=effectuerReservation"> <!-- action -->
                    <div class="auth__form_body">
                        <h3 class="auth__form_title">Réserver</h3>
                        <div>
                            <div class="form-group">
                                <label class="text-uppercase small">Date</label>
                                <input type="text" class="form-control" placeholder="" name="date" id="date" onchange="changeSelect(this.value)">

                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                                <script src="./flatpickr.js"></script>

                                <script>


                                    function changeSelect(text) {
                                        var objSelect = document.getElementById("libelles");

                                        // setSelectedValue(objSelect, text);
                                        document.getElementById("libelles").value = text
                                    }

                                    function setSelectedValue(selectObj, valueToSet) {
                                        for (var i = 0; i < selectObj.options.length; i++) {
                                            if (selectObj.options[i].text== valueToSet) {
                                                selectObj.options[i].selected = true;
                                                return;
                                            }
                                        }
                                    }

                                    function changeCalendar() {
                                        let selectElement = document.getElementById("libelles");
                                        var valueSelected = selectElement.options[selectElement.selectedIndex].value;


                                        if (true) {
                                            $('#date').flatpickr({
                                                defaultDate: valueSelected,
                                                dateFormat: 'Y-m-d',
                                                enable:  <?php
                                                            $conn = ConnexionBdPdo::getConnexion();
                                                            $soireeDAO = new SoireeDAO($conn);
                                                            $dates = $soireeDAO->getAllDates();
                                                            echo Utils::showArrayJS($dates) ?>
                                            });
                                        }
                                    }
                                </script>

                                <?php
                                $soireeDAO = new SoireeDAO($conn); // Connexion à la BD
                                $dates = $soireeDAO->getAllDates();
                                $libelles = $soireeDAO->getLibelles();

                                echo "<label class='text-uppercase small'>Description</label>";
                                echo "<select name='libelles' id='libelles' class='form-control' onchange='changeCalendar()'>";

                                for ($i = 0; $i <= count($libelles) - 1; $i++) {
                                    echo "<option value='" . $dates[$i]["date"] . "'>" . $libelles[$i]["libelle"] . "</option>";
                                }
                                echo "</select>";


                                echo "<script>
                                    $('#date').flatpickr({
                                        dateFormat: 'Y-m-d',
                                        enable: " . Utils::showArrayJS($dates) . "
                                    });
                                    
                                    changeCalendar();
                                </script>";
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase small">Nom</label>
                                <input type="text" class="form-control" placeholder="Nom" name="nom">
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase small">Prénom</label>
                                <input type="text" class="form-control" placeholder="Prénom" name="prenom">
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase small">Téléphone</label>
                                <input type="text" class="form-control" placeholder="Numéro de téléphone" name="tel">
                            </div>
                        </div>
                    </div>
                    <div class="auth__form_actions">
                        <button class="btn btn-primary btn-lg btn-block" name="submitReservation">
                            Réserver
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
