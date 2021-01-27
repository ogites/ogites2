<?php
/*
    Script de modification des informations d'un gîte
*/
require 'head.php';
// Récupération de l'id du gîte
if (isset($_REQUEST["id_gites"]))
{
    $id_gites = $_REQUEST["id_gites"];
}
// Récupération des informations du formulaire
if (isset($_POST["libelle"]))
{
    $libelle = $_POST["libelle"];
}
if (isset($_POST["description"]))
{
    $description = $_POST["description"];
}
if (isset($_POST["localisation"]))
{
    $localisation = $_POST["localisation"];
}
if (isset($_POST["nb_personnes_max"]))
{
    $nb_personnes_max = $_POST["nb_personnes_max"];
}
// Exécution de la requête
$SQLParam = "UPDATE gites set libelle = '$libelle', description = '$description',"
. " localisation = '$localisation', nb_personnes_max = '$nb_personnes_max'"
. " WHERE id_gites = '$id_gites'";
$Myresult = $pdo->exec($SQLParam);
// Redirection vers la page d'origine
header("Location:gerer_gite.php?id_gites=$id_gites");
?>