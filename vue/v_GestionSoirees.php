<div id="contenu" class="auth__body">

    <fieldset>
        <br>
        <br>
        <br>
        <br>
        <br>

        <div class="auth__form_actions">
            <a class="btn btn-primary btn-lg btn-block auth__form"
                href="./index.php?controleur=c_gestionSoirees&action=afficherAjouterUneSoiree">
                Ajouter une soirée
            </a>

            <a class="btn btn-primary btn-lg btn-block auth__form"
                href="./index.php?controleur=c_gestionSoirees&action=afficherModifierUneSoiree">
                Modifier une soirée
            </a>

            <a class="btn btn-primary btn-lg btn-block auth__form"
                href="./index.php?controleur=c_gestionSoirees&action=afficherSupprimerUneSoiree">
                Supprimer une soirée
            </a>
        </div>

        <br>
        <br>

        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Nombre de place(s) disponible(s)</th>
                    <th>Détails de la soirée</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($lesSoiree as $laSoiree) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $laSoiree['date'] . "</a>"; ?>
                        </td>

                        <td>
                            <?php echo $laSoiree['NbPlaceRestante'] . "<br/>" ?>
                        </td>

                        <td>
                            <?php echo $laSoiree['libelle'] . "<br/>" ?>
                        </td>

                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>	
    </fieldset> 
</div>
