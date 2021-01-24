<!--
	Page de présentation des lieux cultes de la Guadeloupe
-->
<?php  
  	// Ajout du header
	require_once 'head.php';
  	// Initialisation de la session
    session_start(); 
    // Navbar de la page de présentation
    header_page(2);
?>

<main role="main" class="flex-shrink-0">
    <div class="container-fluid">
        <!-- Headline -->
		<h2>Page de présentation</h2>
    </div>
</main>

<?php
	// Ajout de script Javascript
	require_once 'javascripts.php';
	// Ajout du footer
	require_once 'footer.php';
?>