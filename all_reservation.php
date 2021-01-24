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
?>

<main role="main" class="flex-shrink-0">
    <div class="container-fluid">
        <!-- Headline -->
		<h2>Liste des réservations</h2>
    </div>
</main>

<?php
	// Ajout de script Javascript
	require_once 'javascripts.php';
	// Ajout du footer
	require_once 'footer.php';
?>