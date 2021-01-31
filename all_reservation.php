<!-- 
    Page listant les réservations d'un utilisateur
-->
<?php  
    // Titre de la page
    $title = "Mes réservations - Ô'GÎTES";
    // Ajout du header
    require_once 'head.php';
    // Initialisation de la session
    session_start(); 
    // Navbar de la page listant les réservations
    header_page(0);
    // Récupération de l'id de l'utilisateur
    if(isset($_SESSION["id_users"])){
        $id_users = $_SESSION["id_users"];
    }
?>

<main role="main" class="flex-shrink-0">
    <div class="container-fluid">
        <!--Bouton retour-->
        <a href="view_gites.php?query=all" class="btn btn-info btn-lg" style="float: right;"><strong style="color:#fff">RETOUR</strong></a>
        <!-- Headline -->
		<h1><strong>LISTE DES RESERVATIONS</strong></h1>
        <!-- Nettoyage du flottement -->
        <div style="clear: both;"></div>
        <br><br>
        <div class="container">
            <center>
            <?php 
                $sql = "select * from reservation where id_users = $id_users";
                //echo $sql;
                $result = $pdo->query($sql);
                $result->setFetchMode(PDO::FETCH_ASSOC);
                $nb_reserv = $result->rowCount();

                if($nb_reserv > 0)
                {
                    $xc = 0;
                    while($info = $result->fetch())
                    {
            ?>
                        <div class="card mb-3" style="width: 600px; box-shadow: 1px 1px 10px #555;">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <?php
                                        $id_gites = $info["id_gites"];
                                        $sql_image_gite = "select * from images_gites where id_gites = $id_gites";
                                        $Myresult2 = $pdo->query($sql_image_gite);
                                        $Myresult2->setFetchMode(PDO::FETCH_ASSOC);
                                        $image_gites = $Myresult2->fetch();

                                        $image_link = $image_gites["link_url"];
                                    ?>
                                    <!-- Image du gite -->
                                    <img src="<?php echo $image_link; ?>" alt="image-gite" style="height:200px;">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong><?php echo strtoupper($info["libelle"]); ?></strong></h5>
                                        <p class="card-text">
                                            Du <?php echo datefr($info["date_debut"]); ?> 
                                            au <?php echo datefr($info["date_fin"]); ?>
                                        </p>
                                        <p class="card-text" style="float:right;">
                                            <small class="text-muted">Réservé le <?php echo datefr($info["date_reserv"]); ?></small>
                                        </p>
                                        <br><br>

                                        <!-- Bouton pour supprimer une réservation (modal) -->
                                        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#suppReserv<?php echo $xc; ?>">
                                            Supprimer
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="suppReserv<?php echo $xc; ?>" tabindex="-1" role="dialog" aria-labelledby="suppReservLabel<?php echo $xc; ?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="suppReservLabel<?php echo $xc; ?>">SUPPRIMER LA RESERVATION</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="delete_reserv.php" method="post">
                                                        <div class="modal-body">
                                                            <h5>Vous êtes sur le point d'annuler votre réservation.</h5>
                                                            <input type="hidden" name="id_gites" value="<?php echo $info["id_gites"]; ?>">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
                                                                <button type="submit" class="btn btn-success">Oui</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Bouton pour changer de dates de réservation (modal) -->
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#decalDate<?php echo $xc; ?>">
                                            Modifier les dates
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="decalDate<?php echo $xc; ?>" tabindex="-1" role="dialog" aria-labelledby="decalDateLabel<?php echo $xc; ?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="decalDateLabel<?php echo $xc; ?>"><strong>DECALER LES DATES DE RESERVATION</strong></h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="modifier_date_reserv.php" method="post">
                                                        <div class="modal-body">
                                                            <h5><strong>DATES D'ORIGINE : </strong></h5>
                                                            <h5>Du <?php echo datefr($info["date_debut"]); ?> 
                                                                au <?php echo datefr($info["date_fin"]); ?></h5>
                                                            <br>
                                                            <h5><strong>NOUVELLES DATES : </strong></h5>
                                                            <div class="form-group row">
                                                                <label class="col-4 col-form-label">Date d'arrivée :</label>
                                                                <div class="col-5">
                                                                    <input type="date" class="form-control" name="date_debut_reserv" required>
                                                                </div>
                                                                <br><br>
                                                                <label class="col-4 col-form-label">Date de départ :</label>
                                                                <div class="col-5">
                                                                    <input type="date" class="form-control" name="date_fin_reserv" required>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="id_gites" value="<?php echo $info["id_gites"]; ?>">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                                <button type="submit" class="btn btn-primary">Valider</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php 
                $xc++;
                    }
        
                } 
                else 
                {
                    echo "<h3>Aucune réservation à votre actif.</h3>";
                } 
            ?>
            </center>
        </div>
    </div>
</main>

<?php
	// Ajout de script Javascript
	require_once 'javascripts.php';
	// Ajout du footer
	require_once 'footer.php';
?>