<?php
/*
    Script d'ajout d'une image à un gîte
*/
require 'head.php';
// Récupération de l'id du gîte
if (isset($_REQUEST["id_gites"]))
{
    $id_gites = $_REQUEST["id_gites"];
}
// Récupération des informations du formulaire
if (isset($_POST["link_image"]))
{
    $link_url = $_POST["link_image"];
}
// Exécution de la requête
$SQLParam = "INSERT INTO images_gites (id_gites, link_url)"
. " VALUES ('$id_gites', '$link_url')";
$Myresult = $pdo->exec($SQLParam);
// Redirection vers la page d'origine
header("Location:gerer_gite.php?id_gites=$id_gites&action=view");
?>