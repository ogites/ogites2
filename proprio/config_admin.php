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
                                  <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                            </li>
                            <?php
                            if (!isset($_SESSION['id_users']))
                            {
                            ?>
                            <li class="nav-item">
                                  <a class="nav-link" href="/ogites2/presentation.php">Présentation</a>
                            </li>
                            <li class="nav-item">
                                  <a class="nav-link" href="/ogites2/about.php">À propos</a>
                            </li>
                            <?php
                            }
                        break;

                        // Accueil
                        case 1:
                            ?>
                            <li class="nav-item active">
                                  <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                            </li>
                            <?php
                            if (!isset($_SESSION['id_users']))
                            {
                            ?>
                            <li class="nav-item">
                                  <a class="nav-link" href="/ogites2/presentation.php">Présentation</a>
                            </li>
                            <li class="nav-item">
                                  <a class="nav-link" href="/ogites2/about.php">À propos</a>
                            </li>
                            <?php
                            }
                        break;
                        
                        // Présentation
                        case 2:
                            ?>
                            <li class="nav-item">
                                  <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                            </li>
                            <?php
                            if (!isset($_SESSION['id_users']))
                            {
                            ?>
                            <li class="nav-item active">
                                  <a class="nav-link" href="/ogites2/presentation.php">Présentation</a>
                            </li>
                            <li class="nav-item">
                                  <a class="nav-link" href="/ogites2/about.php">À propos</a>
                            </li>
                            <?php
                            }
                        break;
                        
                        // À propos
                        case 3:
                            ?>
                            <li class="nav-item">
                                  <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                            </li>
                            <?php
                            if (!isset($_SESSION['id_users']))
                            {
                            ?>
                            <li class="nav-item">
                                  <a class="nav-link" href="/ogites2/presentation.php">Présentation</a>
                            </li>
                            <li class="nav-item active">
                                  <a class="nav-link" href="/ogites2/about.php">À propos</a>
                            </li>
                            <?php
                            }
                        break;
                    }
                    // Si l'utilisateur est connecté
                    if (isset($_SESSION['id_users']) AND isset($_SESSION['pseudo']))
                    {
                    ?>
                    
                    <?php
                    //echo $_SESSION["id_categorie"];
                    switch ($_SESSION['id_categorie'])
                    {
                        // Si l'utilisateur est un admin
                        case 1:
                    ?>
                        <li class="nav-item" >
                            <a class="nav-link" href="/ogites2/admin/index.php">Espace Admin</a>
                        </li>
                    <?php
                        break;

                        // Si l'utilisateur est un proprio
                        case 3:
                    ?>
                        <li class="nav-item" >
                            <a class="nav-link" href="/ogites2/proprio/index.php">Espace Proprio</a>
                        </li>
                    <?php
                        break;
                    }
                    ?>
                    <li class="nav-item">
                        <a href="/ogites2/all_reservation.php" class="nav-link">Mes réservations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/ogites2/login-system/param.php">Mon compte</a>
                    </li>
                    <?php
                        require_once '../login-system/config.php';
                        // Récupérer le nombre de réservation à ce jour
                        $SQLParam = "SELECT * FROM reservation as R INNER JOIN gites as G ON R.id_gites = G.id_gites "
                        . "WHERE DATE(date_reserv) = DATE(NOW()) AND G.createur = 0";
                        $nbReserv = toCount($SQLParam);

                        // Si il y a des réservations à ce jour
                        if ($nbReserv > 0)
                        {
                    ?>
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="notifier-btn"><i class="bi bi-bell-fill"></i></a>
                        </li>
                        <span class='badge' style='width: 20px;height: 20px;border-radius: 10px;background:#F02F0C;color:#fff;' id='notifier-btn'>
                            <?php echo $nbReserv  ?>
                        </span>
                        <script>
                            document.getElementById("notifier-btn").onclick = notifier;

                            /* Quand le document sera chargé */
                            document.addEventListener('DOMContentLoaded', function () {
                            
                                /* Vérifie si le navigateur est compatible avec les notifications */
                                if (!Notification) {
                                    alert('Le navigateur ne supporte pas les notifications.');
                                }
                                /* Si le navigateur prend en charge les notifications,
                                on demande la permission si les notifications ne sont pas permises */
                                    else if (Notification.permission !== 'granted')
                                        Notification.requestPermission();
                            });
                        
                        
                            function notifier() {
                                /* On demande la permission si les notifications ne sont pas permises */
                                if (Notification.permission !== 'granted')
                                    Notification.requestPermission();
                                else {
                                    
                                    // Affichage du message avec le logo de l'application
                                    var notification = new Notification('OGÎTES TEAM', {
                                        icon: '/ogites2/images/new-logo.png',
                                        body: 'Il y a de nouvelle(s) réservation(s)',
                                        //image: "",
                                    });
                                    
                                    // Redirection vers la page de gestion des réservations
                                    notification.onclick = function () {
                                        window.open("gerer_reserv.php");
                                    
                                    };
                                
                                    // Disparition de la notification au bout de 5 sec
                                    notification.onshow = function () {
                                        setTimeout(notification.close.bind(notification), 5000);
                                    }
                                
                                }
                            }
                        </script>
                    <?php
                    } else {
                    ?>
                    <li class="nav-item">
                            <a href="#" class="nav-link"><i class="bi bi-bell"></i></a>
                    </li>
                    <?php
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/ogites2/login-system/deconnexion.php"><i class="fa fa-sign-out"></i></a>
                    </li>
                    <?php
                    }
                    else
                    {
                    ?>
                    <li class="nav-item">
                          <a class="nav-link btn btn-success" href="/ogites2/login-system/connexion.php"><i class="fa fa-sign-in" style="color:white;"></i> <span style="color:white;">Connexion</span></a>
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