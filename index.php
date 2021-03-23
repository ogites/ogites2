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
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="5000">
                    <div class="carousel-inner">
                        <?php
                        $response = toFetch("SELECT link_url FROM images_gites");
                        $firstImage = requete("SELECT link_url FROM images_gites LIMIT 1");
                        ?>
                        <div class="carousel-item active">
                            <img src="<?php echo $firstImage["link_url"]  ?>" alt="" style="width:800px; height:500px;">
                        </div>
                        <?php
                        while ($image = $response->fetch())
                        {
                        ?>
                            <div class="carousel-item">
                                <img src="<?php echo $image["link_url"]  ?>" alt="First slide" style="width:800px; height:500px;">
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