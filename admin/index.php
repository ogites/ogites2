<!--
    Page d'accueil de l'espace administrateur.

    Cette espace permettra de faciliter l'ajout de gîte
    ainsi que la gestion des utilisateurs et des réservations
-->
<?php  
	// Ajout du header
    require_once 'head.php';
    require_once 'config_admin.php';
	// Initialisation de la session
    session_start(); 
    header_admin(1);
?>

<!-- Contenu de la page -->
<main role="main" class="flex-shrink-0">
	<div class="container-fluid" id="index">
		<center>
			<!-- Headline -->
			<h2>Bienvenue dans l'espace administrateur <br>
                <strong><?php echo $_SESSION["nom"] . " " . $_SESSION["prenom"]; ?></strong>
            </h2>
		</center>
		<div class="container">
            <br>
            <div class="card-deck center">
                <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Nb. Gîtes</h5>
                        <?php
                        $SQLParam1 = "SELECT * FROM gites";
                        $Myresult1 = $pdo->query($SQLParam1);
                        $Myresult1->setFetchMode(PDO::FETCH_ASSOC);
                        $info_gites = $Myresult1->fetch();
                        $nb_gites = $Myresult1->rowCount();
                        ?>
                        <h3 class="card-text"><?php echo $nb_gites ?></h3>
                    </div>
                </div>
                <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title white">Nb. Réservations</h5>
                        <?php
                        $SQLParam2 = "SELECT * FROM reservation";
                        $Myresult2 = $pdo->query($SQLParam2);
                        $Myresult2->setFetchMode(PDO::FETCH_ASSOC);
                        $info_reservation = $Myresult2->fetch();
                        $nb_reservation = $Myresult2->rowCount();
                        ?>
                        <h3 class="card-text white"><?php echo $nb_reservation ?></h3>
                    </div>
                </div>
                <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Nb. Utilisateurs</h5>
                        <?php
                        $SQLParam3 = "SELECT * FROM users";
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
				<!-- Barre de recherche -->
				<form action="../view_gites.php?query=search" method="POST">
					<div class="input-group mb-2 border rounded-pill p-1 w-50">
						<input type="search" placeholder="Chercher un lieu" aria-describedby="button-addon3"
							name="searchbar" class="form-control bg-none border-0">
						<div class="input-group-append border-0">
							<button id="button-addon3" type="submit" class="btn btn-link text-success">
                                <i class="fa fa-search"></i>
							</button>
						</div>
					</div>
                    <button class="btn btn-success" type="submit">Recherche</button>
                    <a href="../view_gites.php?query=all" class="btn btn-warning"><span style="color:white;">Voir tout</span></a>
                </form>
                
				<br><br>
            </center>
            <!-- Boutons d'actions -->
            <div class="card-deck">
                <!-- Ajouter un gîte -->
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-body white">
                        <a href="ajout_gite.php" class="stretched-link"><h5 class="card-title white"><i class="fa fa-plus white"></i> Ajouter un gîte</h5></a>
                        <p class="card-text white">Ajouter un nouveau gîte dans la base de données.</p>
                        <p class="card-text white"><i class="fa fa-exclamation-triangle white"></i> Associer au moins une image par gîte.</p>
                    </div>
                </div>
                <!-- Liste des gîtes -->
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-body white">
                        <a href="liste_gite.php" class="stretched-link"><h5 class="card-title white"><i class="fa fa-th-list white"></i> Liste des gîtes</h5></a>
                        <p class="card-text white">Voir la liste des gîtes enregistrées.</p>
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
                        <a href="gerer_perm.php" class="stretched-link"><h5 class="card-title white"><i class="fa fa-users white"></i> Gérer les utilisateurs</h5></a>
                        <p class="card-text white">Voir et modifier les permissions des utilisateurs.</p>
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