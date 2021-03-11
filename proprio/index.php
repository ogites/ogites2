<!--
    Page d'accueil de l'espace propriétaire.

    Cette espace permettra de faciliter la gestion
    des gîtes et la communication avec les clients.
-->
<?php  
    // Titre de la page
    $title = "Espace propriétaire - Ô'GÎTES";
	// Ajout du header
    require_once 'head.php';
    require_once 'config_admin.php';
	// Initialisation de la session
    session_start(); 
    header_admin(1);
    // Définition des variables
    $nom = $_SESSION["nom"];
    $prenom = $_SESSION["prenom"];
    $id_users = $_SESSION["id_users"];
    //echo $id_users;
?>
<script>
    console.log("Démarrage Espace Proprio - O'GITES");
</script>
<!-- Contenu de la page -->
<main role="main" class="flex-shrink-0">
	<div class="container-fluid" id="index">
		<center>
			<!-- Headline -->
			<h2>Bienvenue dans l'espace propriétaire <br>
                <strong><?php echo $nom . " " . $prenom; ?></strong>
            </h2>
		</center>
		<div class="container">
            <br>
            <!-- Éléments d'informations -->
            <div class="card-deck center">
                <div class="card bg-light mb-3" style="max-width: 19rem;">
                    <div class="card-body">
                        <h5 class="card-title">Nb. Gîtes</h5>
                        <?php
                        $SQLParam1 = "SELECT * FROM gites WHERE createur = $id_users";
                        //echo $SQLParam1;
                        $Myresult1 = $pdo->query($SQLParam1);
                        $Myresult1->setFetchMode(PDO::FETCH_ASSOC);
                        $info_gites = $Myresult1->fetch();
                        $nb_gites = $Myresult1->rowCount();
                        ?>
                        <h3 class="card-text"><?php echo $nb_gites ?></h3>
                    </div>
                </div>
                <div class="card text-white bg-dark mb-3" style="max-width: 19rem;">
                    <div class="card-body">
                        <h5 class="card-title white">Nb. Réservations Actives</h5>
                        <?php
                        $SQLParam2 = "SELECT * FROM reservation as P1 "
                        . "LEFT JOIN gites as P2 ON P1.id_gites = P2.id_gites "
                        . "WHERE P2.createur = $id_users AND P1.etat_reservation = 1";
                        $Myresult2 = $pdo->query($SQLParam2);
                        $Myresult2->setFetchMode(PDO::FETCH_ASSOC);
                        $info_reservation = $Myresult2->fetch();
                        $nb_reservation = $Myresult2->rowCount();
                        ?>
                        <h3 class="card-text white"><?php echo $nb_reservation ?></h3>
                    </div>
                </div>
                <div class="card bg-light mb-3" style="max-width: 19rem;">
                    <div class="card-body">
                        <h5 class="card-title">Nb. Réservations Total</h5>
                        <?php
                        $SQLParam3 = "SELECT * FROM reservation as P1 "
                        . "LEFT JOIN gites as P2 ON P1.id_gites = P2.id_gites "
                        . "WHERE P2.createur = $id_users";
                        $Myresult3 = $pdo->query($SQLParam3);
                        $Myresult3->setFetchMode(PDO::FETCH_ASSOC);
                        $info_users = $Myresult3->fetch();
                        $nb_users = $Myresult3->rowCount();
                        ?>
                        <h3 class="card-text"><?php echo $nb_users ?></h3>
                    </div>
                </div>
            </div>
            <br>
            <center>
                <a href="../view_gites.php?query=all" class="btn btn-lg btn-light"><span style="color:#000; font-weight:bold;">Voir tous les gîtes</span></a>
				<br><br><br>
            </center>
            <!-- Boutons d'actions -->
            <div class="card-deck">
                <!-- Ajouter un gîte -->
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-body white">
                        <a href="ajout_gite.php?origin=index" class="stretched-link"><h5 class="card-title white"><i class="fa fa-plus white"></i> Ajouter un gîte</h5></a>
                        <p class="card-text white">Ajouter un nouveau gîte dans la base de données.</p>
                        <p class="card-text white"><i class="fa fa-exclamation-triangle white"></i> Associer au moins une image par gîte.</p>
                    </div>
                </div>
                <!-- Liste des gîtes -->
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-body white">
                        <a href="liste_gite.php" class="stretched-link"><h5 class="card-title white"><i class="fa fa-th-list white"></i> Liste des gîtes</h5></a>
                        <p class="card-text white">Voir la liste des gîtes enregistrées afin de les gérer.</p>
                    </div>
                </div>
                <!-- Gérer les réservations -->
                <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                    <div class="card-body white">
                        <a href="gerer_reserv.php" class="stretched-link"><h5 class="card-title white"><i class="fa fa-calendar white"></i> Gérer les réservations</h5></a>
                        <p class="card-text white">Voir les réservations effectuées par les utilisateurs.</p>
                    </div>
                </div>
                <!-- Gérer les permissions -->
                <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                    <div class="card-body white">
                        <a href="messagerie.php" class="stretched-link"><h5 class="card-title white"><i class="fa fa-envelope-open white"></i> Messagerie</h5></a>
                        <p class="card-text white">Discuter avec vos clients.</p>
                    </div>
                </div>
            </div>
		</div>
	</div>
</main>

<?php
	// Ajout de script Javascript
	require_once '../javascripts.php';
	// Ajout du footer
	require_once '../footer.php';
?>