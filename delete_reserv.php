<?php  
    // Ajout du header
    require_once 'head.php';
    // Initialisation de la session
    session_start(); 
    
    if(isset($_SESSION["id_users"])){
        $id_users = $_SESSION["id_users"];
    }

    if (isset($_REQUEST["id_gites"]))
    {
        $id_gites = $_REQUEST["id_gites"];
    }

    //id du gite ou de la réservation

    //TODO 
    $sql_delete_gite = "delete from reservation where id_reservation = $id_gites";
    //echo $sql_delete_gite;
    $response = $pdo->exec($sql_delete_gite);

    header("Location:all_reservation.php");
?>