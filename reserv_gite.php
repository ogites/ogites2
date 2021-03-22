<?php  
    session_start(); 
    require 'head.php';

    if(isset($_SESSION["id_users"])){
        $id_users = $_SESSION["id_users"];
    }

    if(isset($_REQUEST["id_gites"])){
        $id_gites = $_REQUEST["id_gites"];
    }

    if(isset($_POST["date_debut"])){
      $date_debut = $_POST["date_debut"];
    }

    if(isset($_POST["date_fin"])){
        $date_fin = $_POST["date_fin"];
    }

    if(isset($_POST["selectPersonne"])){
        $selectPersonne = $_POST["selectPersonne"];
    }

    //récupérer le nom du gite pour le libelle lors de la réservation 
    $nom_gite = "select * from gites where id_gites = $id_gites";
    $result = $pdo->query($nom_gite);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $nom = $result->fetch();
    
    $libelle = $nom["libelle"];

    //requete pour réservation du gite 
    $sql = "insert into reservation(libelle, date_debut, date_fin, nb_personnes, date_reserv, id_gites, id_users, etat_reservation)"
    ." values ('$libelle', '$date_debut', '$date_fin', $selectPersonne, NOW(), $id_gites, $id_users, 0)";
    //echo $sql;
    $result2 = $pdo->exec($sql);

    header("Location:all_reservation.php");
?>