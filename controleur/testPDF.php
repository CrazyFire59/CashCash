<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
$racine = "..";
require_once($racine . "/modele/Bdd.php");
require_once($racine . "/modele/GenererPDF.php");


$id = 1;
$test = $ModelePDF->GenererPDF($id);
print_r($test);
echo "<br/><br/><br/>";
$test2 = $ModelePDF->Intervention($id);
$test2 = array($test2);
print_r($test2);

?>