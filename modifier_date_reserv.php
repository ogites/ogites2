<?php  
    // Ajout du header
    require_once 'head.php';
    // Initialisation de la session
    session_start(); 

    if(isset($_SESSION["id_users"])){
        $id_users = $_SESSION["id_users"];
    }

    if(isset($_POST["date_debut_reserv"])){
        $date_debut = $_POST["date_debut_reserv"];
    }

    if(isset($_POST["date_fin_reserv"])){
        $date_fin = $_POST["date_fin_reserv"];
    }

    if (isset($_REQUEST["id_gites"]))
    {
        $id_gites = $_REQUEST["id_gites"];
    }
    
    $sql_date_reserv = "update reservation"
    ." set date_debut = '$date_debut', date_fin = '$date_fin', date_reserv = NOW()"
    ." where id_users = $id_users and id_gites = '$id_gites'";
    //echo $sql_date_reserv;
    $response = $pdo->exec($sql_date_reserv);

    header("Location:all_reservation.php");
?>