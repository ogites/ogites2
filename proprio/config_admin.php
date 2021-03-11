<?php
function header_admin($onglet) 
{
    global $root;

    /*
    Fonction permettant d'ajouter le header en fonction du paramètre
    Liste des différents cas :
        0 : La page n'est pas dans le header
        1 : Page d'accueil (première page dans le header)
        2 : Page de présentation (deuixième page dans le header)
        3 : Page A propos (troisième page dans le header)
    */
?>
    <header>
          <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
            <strong><a class="navbar-brand" href="/ogites2/index.php">Ô'GÎTES</a></strong>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                  aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                  <ul class="navbar-nav ml-auto">
                    <?php
                    switch ($onglet)
                    {
                        // Page non dans le header
                        case 0:
                            ?>
                            <li class="nav-item">
                                  <a class="nav-link" href="/ogites2/admin/index.php">Accueil <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                  <a class="nav-link" href="/ogites2/presentation.php">Présentation</a>
                            </li>
                            <li class="nav-item">
                                  <a class="nav-link" href="/ogites2/about.php">À propos</a>
                            </li>
                            <?php
                        break;

                        // Accueil
                        case 1:
                            ?>
                            <li class="nav-item active">
                                  <a class="nav-link" href="/ogites2/admin/index.php">Accueil <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                  <a class="nav-link" href="/ogites2/presentation.php">Présentation</a>
                            </li>
                            <li class="nav-item">
                                  <a class="nav-link" href="/ogites2/about.php">À propos</a>
                            </li>
                            <?php
                        break;
                        
                        // Présentation
                        case 2:
                            ?>
                            <li class="nav-item">
                                  <a class="nav-link" href="/ogites2/admin/index.php">Accueil <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item active">
                                  <a class="nav-link" href="/ogites2/presentation.php">Présentation</a>
                            </li>
                            <li class="nav-item">
                                  <a class="nav-link" href="/ogites2/about.php">À propos</a>
                            </li>
                            <?php
                        break;
                        
                        // À propos
                        case 3:
                            ?>
                            <li class="nav-item">
                                  <a class="nav-link" href="/ogites2/admin/index.php">Accueil <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                  <a class="nav-link" href="/ogites2/presentation.php">Présentation</a>
                            </li>
                            <li class="nav-item active">
                                  <a class="nav-link" href="/ogites2/about.php">À propos</a>
                            </li>
                            <?php
                        break;
                    }
                    // Si l'utilisateur est connecté
                    if (isset($_SESSION['id_users']) AND isset($_SESSION['pseudo']))
                    {
                    ?>
                    <li class="nav-item">
                        <a href="/ogites2/all_reservation.php" class="nav-link">Mes réservations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/ogites2/login-system/param.php">Mon Compte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/ogites2/login-system/deconnexion.php"><i class="fa fa-sign-out"></i></a>
                    </li>
                    <?php
                    }
                    else
                    {
                    ?>
                    <li class="nav-item">
                          <a class="nav-link btn btn-success" href="/ogites2/login-system/connexion.php"><span style="color:white;">Connexion</span></a>
                    </li>
                    <?php
                    }
                    ?>
                  </ul>
            </div>
        </nav>
</header>
<?php
}
?>