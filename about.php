<!-- 
    Page de présentation du contexte du projet
-->

<?php  
  // Ajout du header
  require_once 'head.php';
  // Lien vers les méthodes
  require_once 'inc/manager-db.php';
  // Initialisation de la session
  session_start(); 
?>
<!-- Navbar de la page A propos -->
<header>
  <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
    <strong><a class="navbar-brand" href="index.php">Ô'GÎTES</a></strong>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
      aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link">Présentation</a>
        </li>
        <?php 
        if (isset($_SESSION['id_users']) AND isset($_SESSION['pseudo']))
        {
        ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false" name="Dropdown">Mon compte</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="#">Mes réservations</a>
            <a class="dropdown-item" href="#">Paramètres</a>
            <a class="dropdown-item" href="login-system/deconnexion.php">Déconnexion</a>
          </div>
        </li>
        <?php
        }
        else
        {
        ?>
        <li class="nav-item">
          <a class="nav-link" href="login-system/connexion.php">Connexion</a>
        </li>
        <?php
        }
        ?>
        <li class="nav-item active">
          <a class="nav-link" href="about.php">À propos</a>
        </li>
      </ul>
    </div>
  </nav>
</header>

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