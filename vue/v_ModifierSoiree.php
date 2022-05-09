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
                <form class="auth__form" autocomplete="off" method="post" action="./index.php?controleur=c_gestionSoirees&action=modifierSoiree"> <!-- action -->
                    <div class="auth__form_body">
                        <h3 class="auth__form_title">Modifier une soirée</h3>
                        <div>
                            <div class="form-group">

                                <script>

                                    function setSelectedValue(selectObj, valueToSet) {
                                        for (var i = 0; i < selectObj.options.length; i++) {
                                            if (selectObj.options[i].text== valueToSet) {
                                                selectObj.options[i].selected = true;
                                                return;
                                            }
                                        }
                                    }

                                    function updateChamps(libelle, date, places) {
                                        document.getElementById("nvLibelle").value = libelle;
                                        document.getElementById("date").value = date;
                                        document.getElementById("nvNbPlaces").value = places;
                                    }

                                    function changeCalendar(libelleValue) {

                                        let selectElement = document.getElementById("libelles");
                                        var valueSelected = selectElement.options[selectElement.selectedIndex].value;

                                        updateChamps(libelleValue, valueSelected.split(":::")[0], valueSelected.split(":::")[1])

                                        if (true) {
                                            $('#date').flatpickr({
                                                defaultDate: valueSelected.split(":::")[0],
                                                dateFormat: 'Y-m-d'
                                            });
                                        }
                                    }
                                </script>

                                <?php


                                $conn = ConnexionBdPdo::getConnexion();
                                $soireeDAO = new SoireeDAO($conn);
                                $dates = $soireeDAO->getAllDates();
                                $libelles = $soireeDAO->getLibelles();
                                $places = $soireeDAO->getAllPlaces();
                                $ids = $soireeDAO->getAllIds();



                                echo "</br>";
                                echo "<label class='text-uppercase small'>Sélectionner la soirée</label>";
                                echo "<select name='libelles' id='libelles' class='form-control' onchange='changeCalendar(this.options[this.selectedIndex].text)'>";

                                for ($i = 0; $i <= count($libelles) - 1; $i++) {
                                    echo "<option value='" . $dates[$i]["date"] . ":::" . $places[$i]["nbPlaceRestante"] . ":::" . $ids[$i]["idSoiree"] . "'>" . $libelles[$i]["libelle"] . "</option>";
                                }

                                echo "</select>";

                                ?>

                                <br>
                                <br>

                                <label class="text-uppercase small">Date</label>
                                <input type="text" class="form-control" placeholder="" name="date" id="date">

                                <!-- Script affichage date -->
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                                <script src="./flatpickr.js"></script>
                                <?php
                                echo "<script>
                                    $('#date').flatpickr({
                                        dateFormat: 'Y-m-d'
                                    });
                                   
                                </script>";
                                ?>     
                                                          
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase small">Libellé</label>
                                <input type="text" class="form-control" placeholder="" name="nvLibelle" id="nvLibelle">
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase small">Nombre de places restantes</label>
                                <input type="text" class="form-control" placeholder="" name="nvNbPlaces" id="nvNbPlaces">
                            </div>
                        </div>
                    </div>
                    <div class="auth__form_actions">
                        <button class="btn btn-primary btn-lg btn-block" name="modifySoiree">
                            Modifier
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- partial -->
    <script>
        let selectElement = document.getElementById('libelles');
        var valueSelected = selectElement.options[selectElement.selectedIndex].text;
        changeCalendar(valueSelected);
    </script>
    </body>
</html>
