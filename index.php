<!--
	Page d'accueil du site
-->
<?php  
	// Ajout du header
	require_once 'head.php';
	// Initialisation de la session
    session_start(); 
    // Navbar de la page d'accueil
    header_page(1);
?>

<!-- Contenu de la page -->
<main role="main" class="flex-shrink-0">
	<div class="container-fluid" id="index">
        <?php
        if(isset($_SESSION["id_users"]))
        {
        ?>
        <h6 style="float:left;">Bienvenue sur Ô'GÎTES @<?php echo $_SESSION["pseudo"]; ?>.</h6>
        <div style="clear: both;"></div>
        <br>
        <?php
        }
        ?>
		<center>
			<!-- Headline -->
            
            <?php
            if(isset($_SESSION["id_users"]))
            {
            ?>
            <h2>Trouvez votre lieu favoris parmi une selection des meilleurs gîtes de Guadeloupe.</h2>
            <?php
            }
            else
            {
            ?>
            <h2>Trouvez votre lieu favoris parmi une selection des meilleurs gîtes de Guadeloupe.</h2> <br>
            <h3><strong>Inscrivez-vous pour réserver !</strong></h3>
            <?php
            }
            ?>
		</center>
		<div class="container">
			<br>
			<center>
				<!-- Barre de recherche -->
				<form action="view_gites.php?query=search" method="POST">
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
                    <a href="view_gites.php?query=all" class="btn btn-warning"><span style="color:white;">Voir tout</span></a>
                </form>
                
				<br><br>
				<!-- Défilement automatique d'images de gîtes
				<div class="slideshow">
					<?php include 'assets/slideshow.php'; ?>
				</div>-->
                <div id="carouselImgGites" class="carousel slide" data-ride="carousel" data-interval="5000">
                    <style>
                        .carousel-item img {
                            width: 800px;
                            height: 500px;
                            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
                            border-radius: 3px;
                        }
                        .carousel-caption {
                            background-color: rgba(255, 255, 255, .15);  
                            backdrop-filter: blur(5px);
                            width: 500px;
                            height: 100px;
                            border-radius: 3px;
                            margin: 0 auto;
                        }
                    </style>
                    <div class="carousel-inner" style="height:530px;">
                        <?php
                        $nbImg = toCount("SELECT * FROM images_gites");
                        $response = toFetch("SELECT * FROM images_gites LIMIT $nbImg OFFSET 1");
                        $firstImage = requete("SELECT * FROM images_gites LIMIT 1");
                        $idFirstGite = $firstImage["id_gites"];
                        $infoFirstImage = requete("SELECT * FROM gites WHERE id_gites = $idFirstGite");
                        ?>
                        <div class="carousel-item active">
                            <img src="<?php echo $firstImage["link_url"]  ?>" alt="">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><strong style="color:#fff"><?php echo $infoFirstImage["libelle"]  ?></strong></h5>
                                <p><strong style="color:#fff"><i class="fa fa-map-marker" style="color:#fff"></i> <?php echo $infoFirstImage["localisation"]  ?></strong></p>
                            </div>
                        </div>
                        <?php
                        while ($image = $response->fetch())
                        {
                        ?>
                            <div class="carousel-item">
                                <img src="<?php echo $image["link_url"]  ?>" alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <?php
                                    $idGites = $image["id_gites"];
                                    $infoImage = requete("SELECT * FROM gites WHERE id_gites = $idGites");
                                    ?>
                                    <h5><strong style="color:#fff"><?php echo $infoImage["libelle"]  ?></strong></h5>
                                    <p><strong style="color:#fff"><i class="fa fa-map-marker" style="color:#fff"></i> <?php echo $infoImage["localisation"]  ?></strong></p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
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