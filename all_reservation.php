<!-- 
    Page listant les réservations d'un utilisateur
-->
<?php  
    // Ajout du header
    require_once 'head.php';
    // Initialisation de la session
    session_start(); 
    // Navbar de la page listant les réservations
    header_page(0);

    if(isset($_SESSION["id_users"])){
        $id_users = $_SESSION["id_users"];
    }
?>

<main role="main" class="flex-shrink-0">
    <div class="container-fluid">
        <!-- Headline -->
		<h2>LISTE DES RESERVATIONS</h2>
    </div>
    <div class="container">
    <center>
    <?php 
        $sql = "select * from reservation where id_users = $id_users";
        //echo $sql;
        $result = $pdo->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $nb_reserv = $result->rowCount();

        if($nb_reserv > 0){
            while($info = $result->fetch()){
    ?>
    
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
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
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $info["libelle"]; ?></h5>
                    <p class="card-text">
                    Du <?php echo $info["date_debut"];?> au <?php echo $info["date_fin"];?></p>
                    <p class="card-text"><small class="text-muted">Réservé le <?php echo $info["date_reserv"] ?></small></p>
                </div>
                </div>
            </div>
        </div>
        <?php 
            }
        } else {
            echo "<h3>Aucune réservation à votre actif.</h3>";
        } ?>
    </center>
    </div>
</main>

<?php
	// Ajout de script Javascript
	require_once 'javascripts.php';
	// Ajout du footer
	require_once 'footer.php';
?>