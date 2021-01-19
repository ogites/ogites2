<!--
  Page d'accueil du site
-->

<?php  
  // Ajout du header
  require_once 'header.php';
  // Lien vers les méthodes
  require_once 'inc/manager-db.php';
  // Initialisation de la session
  session_start(); 
?>
<!-- Navbar de la page d'accueil -->
<header>
  <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
    <strong><a class="navbar-brand" href="index.php">Ô'GÎTES</a></strong>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
      aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
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
        <li class="nav-item">
          <a class="nav-link" href="">À propos</a>
        </li>
      </ul>
    </div>
  </nav>
</header>

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
        <form action="view_gites.php" method="POST">
          <div class="input-group mb-2 border rounded-pill p-1 w-50">
            <input type="search" placeholder="Chercher un lieu" aria-describedby="button-addon3"
              name="searchbar" class="form-control bg-none border-0">
            <div class="input-group-append border-0">
              <button id="button-addon3" type="submit" class="btn btn-link text-success"><i
                  class="fa fa-search"></i></button>
            </div>
          </div>
          <button class="btn btn-success" type="submit">Recherche</button>
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