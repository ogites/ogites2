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
		<center>
			<!-- Headline -->
			<h2>Trouvez votre lieu favoris parmi une selection des meilleurs gîtes de Guadeloupe</h2>
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
				<!-- Défilement automatique d'images de gîtes -->
				<div class="slideshow">
					<?php include 'assets/slideshow.php'; ?>
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