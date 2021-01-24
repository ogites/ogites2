<!-- 
    Page de présentation du contexte du projet
-->
<?php  
  // Ajout du header
  require_once 'head.php';
  // Initialisation de la session
  session_start(); 
  // Navbar de la page A propos
  header_page(3);
?>

<!-- Contenu de la page -->
<main role="main" class="flex-shrink-0">
    <div class="container">
        <center>
            <img src="images/new-logo.png" alt="logo_ogites" width="25%" height="25%">
        </center>
        <br>
        <center>
            <h4>Cette production entre dans le cadre d'un projet réalisé avec <strong>la méthodologie SCRUM.</strong></h4>
            <h4>Il s'agit d'un site de réservation de gîtes en Guadeloupe.</h4>
        </center>
        <br>
        <h4>L'équipe est composée en deux parties.</h4>
        <h4><strong>Les titulaires :</strong></h4>
        <ul>
            <li><h4>COLAT Oren (SCRUM Master)</h4></li>
            <li><h4>GOUPTAR-TICKET Yanissa (PRODUCT Owner)</h4></li>
            <li><h4>JOLO Jonaël</h4></li>
            <li><h4>COUVIN Quetsiah</h4></li>
            <li><h4>BIANAY Elrich</h4></li>
            <li><h4>KANCEL Jonathan</h4></li>
        </ul>
        <h4><strong>La sous-traitance :</strong></h4>
        <ul>
            <li><h4>JEAN-POMBO Jennyfer</h4></li>
            <li><h4>NAQUIN Kristie</h4></li>
            <li><h4>DUHAMEL Jorane</h4></li>
        </ul>
    </div>
</main>

<?php
	// Ajout de script Javascript
	require_once 'javascripts.php';
	// Ajout du footer
	require_once 'footer.php';
?>