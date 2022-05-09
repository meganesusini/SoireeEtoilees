<div id="contenu">

    <fieldset>
        </br>

        <h1>Les soirées</h1>
        </br>


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