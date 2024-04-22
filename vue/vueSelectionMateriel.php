<form action="" method="POST">
    <?php
    for($i = 0; $i < $nombreMateriel; $i++){
       echo "<select name='materiel".$i."' id='materiel".$i."'>";
       foreach($materiels as $materiel){
           echo "<option value='". $materiel["materiel_num_serie"] ."'>". $materiel["materiel_num_serie"] ."</option>";
       }
       echo "</select>";
    }
    ?>
    <input type="hidden" name="nombreMateriel" value="<?= $nombreMateriel ?>">
    <input type="submit" name="SMValider" value="Valider">
</form>
    
    
